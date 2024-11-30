<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopifysales;
use App\Models\User;
use App\Models\Newsletter;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

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

        $status = str_starts_with($code, 'ACT-') ? 'ABONNE' : (str_starts_with($code, 'DEM-') ? 'DEMO' : 'UNKNOWN');
        return response()->json([
            'success' => true,
            'code' => $code,
            'status' => $status,
            'message' => 'Code activé avec succès.',
            'remaining_installations' => 3 - $shopifysale->installation,
            'user_id' => $user->id,
            'newsletter' => $newsletter->subscribed
        ], 200);
    }



    public function generateDemoCode(Request $request)
    {
        // Valider les paramètres reçus
        $request->validate([
            'email' => 'required|email',
            'lang' => 'required|string|in:fr,en,de', // Langue limitée à fr, en, de
            'idproduit' => 'required|string',
        ]);

        $email = $request->email;
        $lang = $request->lang;
        $idproduit = $request->idproduit;

        // Vérifier si un code existe déjà pour ce produit et cet email
        $existingCode = Shopifysales::where('email', $email)
            ->where('idproduit', $idproduit)
            ->first();

        if ($existingCode) {
            // Envoyer le code existant par email
            $this->sendDemoCodeEmail($email, $lang, $existingCode->activation);

            return response()->json([
                'success' => true,
                'message' => 'Un code existant a été trouvé et envoyé par email.',
            ], 200);
        }

        // Générer un code unique DEM-XXXXXX
        do {
            $activationCode = 'DEM-' . strtoupper(Str::random(6)); // Lettres + chiffres aléatoires
            $exists = Shopifysales::where('activation', $activationCode)->exists();
        } while ($exists); // S'assurer que le code est unique

        // Créer une nouvelle ligne dans shopifysales
        Shopifysales::create([
            'email' => $email,
            'idproduit' => $idproduit,
            'activation' => $activationCode,
            'installation' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Rédiger le contenu du mail en fonction de la langue
        $messages = [
            'fr' => "Bonjour,\n\nVoici votre code de démo : $activationCode\n\nProfitez-en !",
            'en' => "Hello,\n\nHere is your demo code : $activationCode\n\nEnjoy exploring amazing places!",
            'de' => "Hallo,\n\nHier ist Ihr Demo-Code : $activationCode\n\nViel Spaß beim Erkunden fantastischer Orte!",
        ];

        $subject = [
            'fr' => 'Votre code de démo My Secret Map',
            'en' => 'Your My Secret Map Demo Code',
            'de' => 'Ihr My Secret Map Demo-Code',
        ];

        // Envoyer un email avec le code d'activation
        Mail::raw($messages[$lang], function ($message) use ($email, $subject, $lang) {
            $message->to($email)
                ->subject($subject[$lang]);
        });

        return response()->json([
            'success' => true,
            'message' => 'Code de démo généré et envoyé avec succès.',

        ]);
    }
}
