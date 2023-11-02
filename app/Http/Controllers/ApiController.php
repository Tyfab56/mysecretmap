<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CharlyPost;

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

        // TODO : Mise à jour du nombre d'installation pour éviter le piratage d'un email valide
       
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
    public function AfficheVideo($idspot)
    {
        $locale = app()->getLocale();
  
        $charlyPost = CharlyPost:: whereHas('translations', function ($query) use ($locale) {
            $query->where('locale', $locale);
        })->where('spot_id', $idspot)->first();

        dd($charlypost);
        return true;
    }
}





