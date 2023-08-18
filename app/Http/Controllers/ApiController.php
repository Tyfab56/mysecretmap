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
 

        $results = DB::select("SELECT email,idproduit,installation
        FROM shopifysales
        WHERE email = :email and status ='Paid'
        AND idproduit = :productId 
        and installation < 2
        limit 0,1",['email'  => $email,'productId'  => $productId]);   

        
       
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





