<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function tostore(Request $request)
    {
        $product_id = $request->input('product_id');
        $tracking = $request->input('tracking');
     
        
         $store = new Tostore();
         $store->product_id = $product_id;
         $store->tracking = $tracking;
         $store->created_at = Carbon::now();;
         $store->save();
     
         
        $uri = $request->getRequestUri();
        $mot_a_retirer = "/tostore";
        $uri = str_replace($mot_a_retirer, "", $uri);
        // redirection vers le store
        return redirect('https://mysecretmap.com/store/index.php'.$uri);

    }
}
