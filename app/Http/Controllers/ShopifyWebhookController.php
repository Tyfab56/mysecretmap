<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopifysales; 

class ShopifyWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // Traitez les données reçues du webhook Shopify
        $data = $request->json()->all();
      
        // Mettez à jour votre base de données avec les informations de vente
        Shopifysales::create([
            'id' => $data['id'],
            'email' => $data['email'],
            'price' => $data['total_price'],
            'currency' => $data['currency'],
            'status' => $data['financial_status'],
            'created_at' => $data['created_at'],
            'idproduit' => $data['line_items'][0]['sku'],
            
            // ... autres champs
        ]);

        return response()->json(['message' => 'Webhook traité avec succès'], 200);
    }
}
