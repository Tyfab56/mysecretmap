<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopifysalesController extends Controller
{

    public function index()
    {
        $shopifysales = Shopifysales::all();
        return view('shopifysaleslist', ['shopifysales' => $shopifysales]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'price' => 'required|numeric',
            'currency' => 'required|string|max:3',
            'status' => 'required|string|max:20',
            'idproduit' => 'required|string|max:20',
            // ajoutez d'autres validations selon vos besoins
        ]);
    
        Shopifysales::create($data);
    
        return redirect()->route('shopifysaleslist'); 
}
}