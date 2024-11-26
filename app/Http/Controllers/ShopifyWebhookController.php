<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopifysales;
use App\Models\User;
use App\Models\Newsletter;

class ShopifyWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // Récupération des données du webhook Shopify
        $data = $request->json()->all();

        // Vérification si l'email existe déjà dans la table 'users'
        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            // Création d'un nouvel utilisateur si l'email n'existe pas
            $user = User::create([
                'email' => $data['email'],
                'password' => null, // Laissez null si l'utilisateur ne définit pas de mot de passe
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
                'name' => $data['id'],
                'password' => $data['id'],
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
            // Ajoutez d'autres champs si nécessaire
        ]);

        return response()->json(['message' => 'Webhook traité avec succès'], 200);
    }
}
