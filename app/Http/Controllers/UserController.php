<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserTranslation;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Update the user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'name' => 'required|string|max:191',
            'prenom' => 'nullable|string|max:191',
            'pseudo' => 'nullable|string|max:191',
            'mypays_id' => 'required'
        ]);

        // Update the user's profile
        $user->update($data);

        // Redirect back with a success message
        return redirect()->back()->with('successUser', 'Profile updated successfully!');
    }

    public function updateSocial(Request $request, User $user)
    {

        // Validate the incoming request data
        $validationRules = [
            'internet' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'five_hundred_px' => 'nullable|url',
            'tiktok' => 'nullable|url',
            'mastodon' => 'nullable|url',
        ];

        $validator = Validator::make($request->all(), $validationRules);

        // Vérifiez si la validation a échoué
        if ($validator->fails()) {
            // Vous pouvez personnaliser le message d'erreur ici
            $url = url()->previous() . '#collapseTwo';
            return redirect($url)->withErrors($validator)->withInput();
        }

        // Si la validation réussit, mettez à jour les profils sociaux
        $data = $validator->validated();

        // Update the user's social profiles
        $user->update($data);

        // Redirect back with a success message
        $url = url()->previous() . '#collapseTwo';
        return redirect($url)->with('successSocial', 'Social profiles updated successfully!');
    }


    public function updateWhoIAm(Request $request)
    {

        $user = Auth::user();

        // Valider la demande
        $request->validate([
            'whoiam_id' => 'required|exists:whoiams,id',
        ]);

        // Mettre à jour le champ "whoiam" de l'utilisateur
        $user->whoiam_id = $request->input('whoiam_id');
        $user->save();

        return redirect()->route('myaccount')->with('success', 'Votre profil a été mis à jour avec succès.');
    }


    public function show($id)
    {
        // Récupération de l'utilisateur à partir de son ID
        $user = User::findOrFail($id);

        // Récupération des photos associées à cet utilisateur avec pagination
        $pictures = $user->pictures()->paginate(20);

        // Retour de la vue avec l'utilisateur et ses photos comme données
        return view('frontend.userprofil', compact('user', 'pictures'));
    }




    public function updatePhotographerInfo(Request $request)
    {
        // Valdation de la banniere




        $validatedData = $request->validate([
            'language' => 'required|in:en,fr',
            'photographer_title' => 'required|string|max:255',
            'photographer_description' => 'required|string',
        ]);

        $user = auth()->user();


        $userTranslation = UserTranslation::firstOrNew([
            'user_id' => $user->id,
            'locale' => $validatedData['language'],
        ]);

        $userTranslation->user_id = $user->id;
        $userTranslation->locale = $validatedData['language'];
        $userTranslation->titre = $validatedData['photographer_title'];
        $userTranslation->description = $validatedData['photographer_description'];


        $userTranslation->save();

        if ($request->ajax()) {
            return response()->json(['message' => 'Mise à jour réussie']);
        }

        return back()->with('success', 'Vos informations de photographe ont été mises à jour avec succès.');
    }

    public function updatePhotoProfil(Request $request)
    {
        try {
            $validatedData = $request->validate(
                [
                    'file' => 'image|mimes:jpeg,jpg|max:2048',
                ]
            );

            $user = Auth::user();

            $file = $request->file('file');

            if ($file == null) {
                // pas de nouvelle image
                $imagestatus = 0;
            } else {
                $disk = Storage::disk('wasabi');
                $bucket = 'mysecretmap';

                // Supression des anciennes images
                if ($user->large_banner) {
                    $filelarge = parse_url($user->large_banner);
                    $disk->delete($filelarge);
                }
                if ($user->small_banner) {
                    $filesmall = parse_url($user->small_banner);
                    $disk->delete($filesmall);
                }


                $extension = $file->getClientOriginalExtension();
                $imgname = $user->id . "_banner.jpg";


                // STOCKAGE IMAGE ORIGINALE


                $width = 1920;
                $height = 640;
                $canvas = Image::canvas($width, $height);
                $imagefinale  = Image::make($file);

                $canvas->insert($imagefinale, 'center');
                $canvas->encode($extension);

                $disk->put('/large/' . $imgname, (string) $canvas, 'public');
                $largename = $disk->url('large/' . $imgname);


                $width = 130;
                $height = 43;


                $canvas = Image::canvas($width, $height);
                $imagesmallfinale  = Image::make($file)->resize(
                    $width,
                    $height,
                    function ($constraint) {
                        $constraint->aspectRatio();
                    }
                );
                $canvas->insert($imagesmallfinale, 'center');
                $canvas->encode($extension);
                $disk->put('/small/' . $imgname, (string) $canvas, 'public');
                $smallname = $disk->url('small/' . $imgname);

                // MEMORISATION BD


                $user->large_banner = $largename;
                $user->small_banner = $smallname;
                $user->save();
            }
            return response()->json([
                'status' => 'success',
                'large_banner' => $largename,
                'small_banner' => $smallname,
                'message' => 'Image de profil mise à jour avec succès!'
            ]);
        } catch (\Exception $e) {
            // En cas d'erreur :
            return response()->json([
                'status' => 'error',
                'message' => 'Une erreur est survenue lors du téléchargement de l\'image: ' . $e->getMessage()
            ], 500);
        }
    }


    public function getPhotographerInfo(Request $request)
    {
        // Récupérez la langue sélectionnée depuis la requête
        $selectedLanguage = $request->input('language');

        // Récupérez les informations du photographe en fonction de la langue
        $user = Auth::user();
        $photographerInfo = $user->translations()->where('locale', $selectedLanguage)->first();

        // Retournez les informations au format JSON
        return response()->json([
            'photographer_title' => $photographerInfo->titre,
            'photographer_description' => $photographerInfo->description,
        ]);
    }


    public function search(Request $request)
    {
        $search = $request->get('search');

        $users = User::where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('prenom', 'like', '%' . $search . '%')
            ->orWhere('pseudo', 'like', '%' . $search . '%')
            ->limit(10)
            ->get(['id', 'name', 'prenom', 'email', 'pseudo']);

        dd($users);

        // Transformer les données pour Select2
        $formattedUsers = $users->map(function ($user) {
            // Vérifie si le pseudo est vide. Si oui, utilise le prénom et le nom ; sinon, utilise le pseudo.
            $displayName = $user->pseudo ?: $user->prenom . ' ' . $user->name;

            return [
                'id' => $user->id,
                // Utilise le nom d'affichage choisi ci-dessus et combine-le avec l'email
                'text' => $displayName . ' (' . $user->email . ')'
            ];
        });

        return response()->json($formattedUsers);
    }

    public function getAssociatedBanners(Request $request)
    {
        $userId = $request->input('user_id');

        // Récupérer les bannières associées à l'utilisateur
        $associatedBanners = Banner::whereHas('user', function ($query) use ($userId) {
            $query->where('id', $userId);
        })->select('id', 'title')->get();

        return response()->json($associatedBanners);
    }
}
