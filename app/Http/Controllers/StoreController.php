<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function tostore(Request $request)
    {
       // Ajout des infos à la table tostore
       $uri = request->getRequestUri();
       $mot_a_retirer = "/tostore";
       $uri = str_replace($mot_a_retirer, "", $uri);
       dd($uri);
       // redirection vers le store
       return redirect('https://mysecretmap.com/store/index.php');

    }
}
