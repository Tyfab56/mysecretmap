<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopifysales;
use App\Models\User;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Http;

class ShopifyWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // Récupération des données du webhook Shopify
        $data = $request->json()->all();

        // Vérification si l'email existe déjà dans la table 'users'
        $user = User::where('email', $data['email'])->first();

        //todo, il faudra mettre le code d'activation reçu comme password (temporairement)

        if (!$user) {
            // Création d'un nouvel utilisateur si l'email n'existe pas
            $user = User::create([
                'email' => $data['email'],
                'name' => $data['id'],
                'password' => $data['id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Vérification ou ajout de l'email dans la table 'newsletter'
        $newsletter = Newsletter::where('email', $data['email'])->first();

        if (!$newsletter) {
            Newsletter::create([
                'user_id' => $user->id,
                'email' => $data['email'],
                'subscribed' => true, // Par défaut, l'utilisateur est abonné
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Création de l'entrée dans la table 'shopifysales'
        Shopifysales::create([
            'id' => $data['id'],
            'email' => $data['email'],
            'price' => $data['total_price'],
            'currency' => $data['currency'],
            'status' => $data['financial_status'],
            'created_at' => $data['created_at'],
            'idproduit' => $data['line_items'][0]['sku'],
            'activation' => $data['id'],
            // Ajoutez d'autres champs si nécessaire
        ]);

        // créer le code d'activation et l'ajouter à la table
        // envoyer un email à la personne pour confirmer le code d'activation
        // voir si cela peut etre fait avec make ? -> créer un webhook sur maket pour gerer la partie email
        //et renvoyer le hook ici pour l'isncription des données dans la table

        return response()->json(['message' => 'Webhook traité avec succès'], 200);
    }
}
