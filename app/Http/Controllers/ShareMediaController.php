<?php

namespace App\Http\Controllers;

use App\Models\ShareMedia;
use App\Models\Folder;
use App\Models\UserCredit;
use App\Models\UserMediaPurchase;
use Illuminate\Http\Request;
use App\Jobs\ProcessPhoto;
use App\Jobs\ProcessVideoForPreview;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;


class ShareMediaController extends Controller
{
    // Liste tous les médias
    public function index(Request $request)
    {
        $folder_id = $request->input('folder_id');

        $query = ShareMedia::orderBy('created_at', 'desc');

        if ($folder_id) {
            $query->where('folder_id', $folder_id);
        }

        $shareMedias = $query->paginate(10);

        $folders = Folder::select('id', 'name')->distinct()->get();

        return view('admin.sharemedias.index', compact('shareMedias', 'folders'));
    }

    // Affiche le formulaire de création d'un nouveau média
    public function create()
    {
        $folders = Folder::all(); // Récupère tous les dossiers pour les sélectionner dans le formulaire
        $lastMedia = ShareMedia::latest()->first(); // Récupère le dernier média ajouté

        // Détermine les valeurs par défaut basées sur le dernier média
        $defaultTitle = $lastMedia ? $lastMedia->title : '';
        $defaultFolderId = $lastMedia ? $lastMedia->folder_id : null;
        $defaultMediaType = $lastMedia ? $lastMedia->media_type : '';

        // Passer les variables à la vue
        return view('admin.sharemedias.create', compact('folders', 'defaultTitle', 'defaultFolderId', 'defaultMediaType'));
    }

    // Enregistre un nouveau média dans la base de données

    public function store(Request $request)
    {
        $request->validate([
            'folder_id' => 'required|exists:folders,id',
            'title' => 'required|string|max:255',
            // Notez que nous validons 'media' comme un seul fichier maintenant, car chaque requête concerne un seul fichier
            'media' => 'required|file',
            'media_type' => 'required|in:photo,video,film',
            'credits' => 'required|numeric', // Assurez-vous que cette validation correspond à vos attentes
        ]);


        // Stockage temporaire du fichier média localement
        $mediaFile = $request->file('media');
        $temporaryPath = $mediaFile->store('temp', 'local');
        $mediaType = $request->input('media_type');

        // Préparation des données communes à passer aux jobs
        $commonData = [
            'folder_id' => $request->input('folder_id'),
            'title' => $request->input('title'),
            'media_type' => $mediaType,
            'credits' => $request->input('credits'),
        ];

        if ($mediaType === 'photo') {
            // Pour les photos, on peut vouloir un traitement spécifique
            // Comme redimensionner ou appliquer des filtres avant de sauvegarder sur S3
            ProcessPhoto::dispatch($temporaryPath, $commonData);
        } elseif ($mediaType === 'video' || $mediaType === 'film') {
            // Pour les vidéos et les films, on lance un job pour générer une vignette et une version de prévisualisation
            ProcessVideoForPreview::dispatch($temporaryPath, $commonData);
        }

        return response()->json([
            'success' => 'Média téléchargé et en cours de traitement.',

        ]);
    }


    // Affiche le formulaire d'édition pour un média existant
    public function edit($id)
    {
        $shareMedia = ShareMedia::findOrFail($id);
        $folders = Folder::all();
        return view('admin.sharemedias.edit', compact('shareMedia', 'folders'));
    }

    // Met à jour le média dans la base de données
    public function update(Request $request, $id)
    {
        $request->validate([
            'folder_id' => 'required',
            'title' => 'required|string|max:255',
            'media_type' => 'required',
            'credits' => 'required|numeric',
            'thumbnail' => 'nullable|image', // S'assurer que le champ thumbnail est bien une image
        ]);

        $shareMedia = ShareMedia::findOrFail($id);
        $disk = Storage::disk('wasabi');

        // Mise à jour des informations générales
        $shareMedia->folder_id = $request->folder_id;
        $shareMedia->title = $request->title;
        $shareMedia->media_type = $request->media_type;
        $shareMedia->credits = $request->credits;

        // Traitement spécifique pour les médias de type 'photo'
        if ($request->media_type === 'photo' && $request->hasFile('thumbnail')) {
            // Suppression de l'ancienne vignette si elle existe
            if ($shareMedia->thumbnail_link) {
                $oldThumbnailPath = parse_url($shareMedia->thumbnail_link, PHP_URL_PATH);
                $disk->delete(ltrim($oldThumbnailPath, '/'));
            }

            // Préparation des données pour ProcessPhoto
            $temporaryPath = $request->file('thumbnail')->store('temp', 'local');

            // Dispatch du job ProcessPhoto
            ProcessPhoto::dispatch($temporaryPath, [
                'shareMediaId' => $shareMedia->id,
                'folder_id' => $request->folder_id,
                'title' => $request->title,
                'media_type' => $request->media_type,
                'credits' => $request->credits,
                // Ajoutez d'autres paramètres nécessaires pour le job
            ]);
        }

        $shareMedia->save();

        return redirect()->route('admin.sharemedias.index')->with('success', 'Média mis à jour avec succès.');
    }


    // Supprime un média de la base de données
    public function destroy($id)
    {
        $shareMedia = ShareMedia::findOrFail($id);

        // Préparation pour supprimer les fichiers sur S3
        $disk = Storage::disk('wasabi'); // Assurez-vous que 'wasabi' est correctement configuré dans config/filesystems.php

        // Extrait les chemins relatifs des URLs complètes stockées dans la base de données
        $mediaPath = parse_url($shareMedia->media_link, PHP_URL_PATH);
        $thumbnailPath = $shareMedia->thumbnail_link ? parse_url($shareMedia->thumbnail_link, PHP_URL_PATH) : null;
        $previewPath = isset($shareMedia->preview_link) ? parse_url($shareMedia->preview_link, PHP_URL_PATH) : null;

        // Supprimer les fichiers sur S3
        if ($mediaPath) {
            $disk->delete(ltrim($mediaPath, '/')); // Supprime le média principal
        }
        if ($thumbnailPath) {
            $disk->delete(ltrim($thumbnailPath, '/')); // Supprime la vignette si elle existe
        }
        if ($previewPath) {
            $disk->delete(ltrim($previewPath, '/')); // Supprime la vidéo de prévisualisation si elle existe
        }

        // Suppression de l'enregistrement dans la base de données
        $shareMedia->delete();

        return redirect()->route('admin.sharemedias.index')
            ->with('success', 'Média supprimé avec succès.');
    }



    public function showByFolder($folderId)
    {
        $folder = Folder::with('shareMedias')->findOrFail($folderId);

        // Vérifier si l'utilisateur est admin ou a accès au dossier
        $user = Auth::user();

        // Check if the folder is private before applying the access restrictions
        if ($folder->status == 'private' && !$user->isAdmin() && !$folder->users->contains('id', $user->id)) {
            abort(403, "Vous n'avez pas l'autorisation d'accéder à ce dossier.");
        }

        // Récupérer les crédits de l'utilisateur en cours
        $userCredits = UserCredit::where('user_id', $user->id)->get();

        // Récupérer les IDs des médias déjà achetés par l'utilisateur
        $purchasedMediaIds = $user->mediaPurchases()->pluck('media_id')->toArray();

        return view('frontend.showbyfolder', compact('folder', 'userCredits', 'purchasedMediaIds'));
    }

    public function orderMedia($mediaId)
    {
        $user = Auth::user();
        $media = ShareMedia::findOrFail($mediaId);
        $credit = UserCredit::where('user_id', $user->id)->where('media_type', $media->media_type)->first();

        // Vérifiez si l'utilisateur a déjà acheté ce média
        $isPurchased = UserMediaPurchase::where('user_id', $user->id)
            ->where('media_id', $mediaId)
            ->exists();

        if (!$isPurchased) {
            if ($credit && $credit->credits > 0) {
                // Déduire un crédit
                $credit->decrement('credits');

                UserMediaPurchase::create([
                    'user_id' => $user->id,
                    'media_id' => $mediaId,
                    'purchased_at' => now(),
                ]);

                return back()->with('success', 'Média ajouté à votre liste.');
            } else {
                return back()->with('error', 'Crédits insuffisants.');
            }
        } else {
            // L'utilisateur a déjà acheté ce média
            return back()->with('error', 'Vous avez déjà acheté ce média.');
        }
    }

    public function download(Request $request, $mediaId)
    {
        $user = Auth::user();
        $media = ShareMedia::findOrFail($mediaId);

        // Vérifiez que vous avez une colonne ou une méthode getExtension() pour récupérer l'extension de fichier
        // Si 'media_link' est une URL complète, vous devrez extraire le chemin du fichier de cette URL
        $path = parse_url($media->media_link, PHP_URL_PATH);
        $extension = pathinfo($path, PATHINFO_EXTENSION);

        // Création d'une instance du client S3 pour Wasabi
        $client = new S3Client([
            'version' => 'latest',
            'region'  => config('filesystems.disks.wasabi.region'),
            'endpoint' => config('filesystems.disks.wasabi.endpoint'),
            'credentials' => [
                'key'    => config('filesystems.disks.wasabi.key'),
                'secret' => config('filesystems.disks.wasabi.secret'),
            ],
            'use_path_style_endpoint' => true,
        ]);

        $customFileName = "MySecretMap_{$media->id}_{$media->title}.{$extension}";

        try {
            $cmd = $client->getCommand('GetObject', [
                'Bucket' => config('filesystems.disks.wasabi.bucket'),
                'Key'    => ltrim($path, '/'), // Assurez-vous de supprimer le slash de début si présent
                'ResponseContentDisposition' => "attachment; filename=\"{$customFileName}\"",
            ]);

            $request = $client->createPresignedRequest($cmd, '+10 minutes');
            $presignedUrl = (string) $request->getUri();

            return redirect($presignedUrl);
        } catch (AwsException $e) {
            // Gérer l'exception
            return back()->withError('Error generating download link');
        }
    }
}
