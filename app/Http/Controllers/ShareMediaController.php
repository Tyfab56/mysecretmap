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


class ShareMediaController extends Controller
{
    // Liste tous les médias
    public function index()
    {
        $shareMedias = ShareMedia::with('folder')->orderBy('created_at', 'desc')->paginate(10);

   
        return view('admin.sharemedias.index', compact('shareMedias'));
    }

    // Affiche le formulaire de création d'un nouveau média
    public function create()
    {
        $folders = Folder::all(); // Récupère tous les dossiers pour les sélectionner dans le formulaire
        return view('admin.sharemedias.create', compact('folders'));
    }

    // Enregistre un nouveau média dans la base de données
  
    public function store(Request $request)
    {
        $request->validate([
            'folder_id' => 'required|exists:folders,id',
            'title' => 'required|string|max:255',
            'media' => 'required|file',
            'media_type' => 'required|in:photo,video,film',
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
        ];
    
        if ($mediaType === 'photo') {
            // Pour les photos, on peut vouloir un traitement spécifique
            // Comme redimensionner ou appliquer des filtres avant de sauvegarder sur S3
            ProcessPhoto::dispatch($temporaryPath, $commonData);
        } elseif ($mediaType === 'video' || $mediaType === 'film') {
            // Pour les vidéos et les films, on lance un job pour générer une vignette et une version de prévisualisation
            ProcessVideoForPreview::dispatch($temporaryPath, $commonData);
        }
    
        return redirect()->route('admin.sharemedias.index')->with('success', 'Média en cours de traitement.');
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
        $previewPath = isset($shareMedia->preview_link) ? parse_url($shareMedia->preview_path, PHP_URL_PATH) : null;
    
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
        if (!$user->isAdmin() && !$folder->users->contains('id', $user->id)) {
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

            if ($credit && $credit->credits > 0) {
                // Déduire un crédit
                $credit->decrement('credits');

                UserMediaPurchase::create([
                    'user_id' => $user->id,
                    'media_id' => $mediaId,
                    'purchased_at' => now(),
                ]);

                return back()->with('success', 'Média envoyé par email.');
            }

            return back()->with('error', 'Crédits insuffisants.');
        }

        public function download(Request $request, ShareMedia $media)
        {
            $user = Auth::user();
        
            // Supposons que $media->file_path contient le chemin complet du fichier, y compris l'extension
            $filePath = $media->file_path;
            $fileName = basename($filePath); // Extrait le nom du fichier avec l'extension
        
            // Extraire l'extension du fichier
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        
            // Générer le nom de fichier personnalisé avec l'extension d'origine
            $safeTitle = Str::slug($media->title); // Nettoyer le titre pour le rendre sûr comme nom de fichier
            $customFileName = "UserID{$user->id}_{$safeTitle}.{$fileExtension}";
        
            // Générer l'URL présignée pour le téléchargement depuis Wasabi
            $disk = Storage::disk('wasabi');
            $command = $disk->getDriver()->getAdapter()->getClient()->getCommand('GetObject', [
                'Bucket' => config('filesystems.disks.wasabi.bucket'),
                'Key'    => $filePath,
                'ResponseContentDisposition' => "attachment; filename=\"{$customFileName}\""
            ]);
        
            $request = $disk->getDriver()->getAdapter()->getClient()->createPresignedRequest($command, '+10 minutes');
            
            return redirect((string) $request->getUri());
        }
        
        
            
    
    private function generatePresignedUrl($filePath, $user, $mediaTitle) {
            // Récupération du client S3 à partir du système de fichiers Laravel
            $s3Client = Storage::disk('s3')->getDriver()->getAdapter()->getClient();
        
            // Nettoyage du titre du média pour le nom de fichier
            $safeTitle = str_slug($mediaTitle);
        
            // Formatage du nom de fichier personnalisé
            $customFileName = "UserID{$user->id}_{$safeTitle}.ext"; // Remplacez '.ext' par l'extension de fichier réelle
        
            // Préparation de la commande pour obtenir un objet S3
            $command = $s3Client->getCommand('GetObject', [
                'Bucket' => config('filesystems.disks.s3.bucket'),
                'Key'    => $filePath,
                'ResponseContentDisposition' => "attachment; filename=\"{$customFileName}\""
            ]);
        
            // Génération de l'URL présignée
            $request = $s3Client->createPresignedRequest($command, '+10 minutes'); // Lien valide pour 10 minutes
        
            return (string) $request->getUri();
        } 
}

