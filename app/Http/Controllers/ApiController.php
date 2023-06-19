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
        WHERE c.email = :email and os.name ='Shipped'
        AND p.model = :productId limit 0,1",['email'  => $email,'productId'  => $productId]);   
       
        if ($results) {

            return response()->json(['status' => 'ok'], 200)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET');
           
           
        } else {
           
            return response()->json(['status' => 'no'], 200)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET');
        }

        
    }
}





