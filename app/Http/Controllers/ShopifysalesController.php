<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopifysales;

class ShopifysalesController extends Controller
{


    public function form()
    {
        return view('admin.shopifysales');
    }

    public function index()
    {
        $shopifysales = Shopifysales::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.shopifysaleslist', ['shopifysales' => $shopifysales]);
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

        return redirect()->route('admin.shopifysaleslist');
    }

    public function resetInstallations($id)
    {
        $sale = ShopifySales::findOrFail($id);
        $sale->installation = 1; // Reset the installation count to 0
        $sale->save();

        return redirect()->back()->with('success', 'Installations reset successfully.');
    }
}
