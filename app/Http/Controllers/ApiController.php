<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function checkProduct(Request $request)
    {
        $email = $request->input('email');
        $productId = $request->input('product_id');
 

        $results = DB::select("SELECT o.order_status_id, os.name AS order_status
        FROM oc_order o
        JOIN oc_order_product op ON o.order_id = op.order_id
        JOIN oc_product p ON op.product_id = p.product_id
        JOIN oc_order_status os ON o.order_status_id = os.order_status_id
        JOIN oc_customer c ON o.customer_id = c.customer_id
        WHERE c.email = '?'
          AND p.model = '?'",[$email,$productId]);

        
      dd(results);

        // Vérifier la base de données
       
        if ($product) {
            // Le produit existe pour cet utilisateur
            return response()->json(['status' => 'ok']);
        } else {
            // Le produit n'existe pas pour cet utilisateur
            return response()->json(['status' => 'no']);
        }
    }
}





