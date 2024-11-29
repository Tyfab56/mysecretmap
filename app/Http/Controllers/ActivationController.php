<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopifysales;
use App\Models\User;
use App\Models\Newsletter;

class ActivationController extends Controller
{
    public function activateCode(Request $request)
    {
        // Valider la requête entrante pour vérifier qu'un code est bien fourni
        $request->validate([
            'code' => 'required|string',
            'email' => 'required|email',
            'country' => 'required|string',
        ]);


        // Récupérer le code d'activation depuis les paramètres de la requête GET
        $code = $request->query('code');
        $email = $request->query('email');
        $country = strtoupper($request->query('country'));

        // Recherche du code d'activation dans la table `shopifysales`
        $shopifysale = Shopifysales::where('activation', $code)
            ->where('idproduit', 'LIKE', "%{$country}%")
            ->first();

        if (!$shopifysale) {
            return response()->json([
                'success' => false,
                'errorCode' => 'INVALID_CODE',
            ], 200);
        }


        // Vérifier si le code a atteint le nombre maximum d'activations
        if ($shopifysale->installation >= 3) {
            return response()->json([
                'success' => false,
                'errorCode' => 'NO_CREDIT',
            ], 200);
        }

        // Vérifier si un email est déjà associé au code
        if ($shopifysale->email && $shopifysale->email !== $email) {
            return response()->json([
                'success' => false,
                'errorCode' => 'EMAIL_MISMATCH'
            ], 200);
        }

        // Associer l'email au code d'activation si ce n'est pas encore fait
        if (!$shopifysale->email) {
            $shopifysale->email = $email;
            $shopifysale->save();
        }


        $shopifysale->installation += 1;
        $shopifysale->save();



        // Si Il y a pas de iduser, en mettre un
        if (!$shopifysale->user_id) {
            // Vérifier si l'utilisateur existe déjà
            $user = User::where('email', $email)->first();

            if (!$user) {
                // Créer un utilisateur s'il n'existe pas
                $user = User::create([
                    'email' => $email,
                    'password' => $code, // Générer un mot de passe aléatoire
                    'email_valid' => true,
                    'lang_default' => app()->getLocale(), // Définir la langue par défaut
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                $shopifysale->user_id = $user->id;
                $shopifysale->save();
                // Ajouter ce user dans ShopifySales

            }
        }

        $newsletter = Newsletter::firstOrCreate(
            [
                'email' => $email
            ],
            [
                'user_id' => $shopifysale->user_id, // Lier l'utilisateur
                'subscribed' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        // Si le record existe déjà mais n'a pas de user_id, on le met à jour
        if (!$newsletter->user_id) {
            $newsletter->user_id = $shopifysale->user_id;
            $newsletter->save();
        }


        return response()->json([
            'success' => true,
            'message' => 'Code activé avec succès.',
            'remaining_installations' => 3 - $shopifysale->installation,
            'user_id' => $user->id,
            'newsletter' => $newsletter->subscribed
        ], 200);
    }
}
