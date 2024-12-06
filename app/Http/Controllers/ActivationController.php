<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopifysales;
use App\Models\User;
use App\Models\Newsletter;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
        $code = strtoupper($request->query('code'));
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
            }
            $shopifysale->user_id = $user->id;
            $shopifysale->save();
            // Ajouter ce user dans ShopifySales


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


        $status = substr($code, 0, 3) === 'ACT'
            ? 'ABONNE'
            : (substr($code, 0, 3) === 'DEM' ? 'DEMO' : 'UNKNOWN');
        return response()->json([
            'success' => true,
            'code' => $code,
            'status' => $status,
            'email' => $email,
            'message' => 'Code activé avec succès.',
            'remaining_installations' => 3 - $shopifysale->installation,
            'user_id' => $shopifysale->user_id,
            'newsletter' => $newsletter->subscribed,

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
        $activationCodePresent = Shopifysales::where('email', $email)
            ->where('idproduit', $idproduit)
            ->first();

        if ($activationCodePresent) {
            // Envoyer le code existant par email
            $activationCode =  $activationCodePresent->activation;
        } else {
            // Générer un code unique DEM-XXXXXX
            do {
                $activationCode = 'DEM' . strtoupper(Str::random(6)); // Lettres + chiffres aléatoires
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
        }




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
    public function importData(Request $request)
    {
        $userId = $request->input('userId');
        $data = $request->input('data');

        // Vérifiez les données reçues
        if (!$userId || !$data) {
            return response()->json(['error' => 'Invalid data'], 400);
        }

        // Stockez les données sur le serveur (par exemple dans un fichier JSON ou une base de données)
        $filePath = "user_data/{$userId}.json";
        Storage::disk('local')->put($filePath, json_encode($data));

        return response()->json(['message' => 'Data imported successfully']);
    }

    public function exportData(Request $request)
    {
        $userId = $request->query('userId');

        if (!$userId) {
            return response()->json(['error' => 'Invalid user ID'], 400);
        }

        // Chargez les données depuis le serveur
        $filePath = "user_data/{$userId}.json";
        if (!Storage::disk('local')->exists($filePath)) {
            return response()->json(['error' => 'No data found'], 404);
        }

        $data = json_decode(Storage::disk('local')->get($filePath), true);

        return response()->json(['data' => $data]);
    }
}
