<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GiftProduct;



class GiftProductController extends Controller
{


    public function index()
    {
        $products = GiftProduct::with('translations')->paginate(10);
        return view('admin.gift-products.index', compact('products'));
    }

    public function create()

    {
        $giftProducts = GiftProduct::with('translations')->get();

        // Retourne la vue avec les données des produits.
        return view('admin.gift-products.index', compact('giftProducts'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image_url' => 'required|url',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'coupon' => 'nullable|string',
            'shop_link' => 'nullable|url',
            'is_active' => 'boolean',
            'translations.*.lang' => 'required|string|size:2',
            'translations.*.title' => 'required|string|max:191',
            'translations.*.description' => 'required|string',
        ]);

        $product = GiftProduct::create($data);

        foreach ($data['translations'] as $translation) {
            $product->translateOrNew($translation['lang'])->fill($translation);
        }

        $product->save();

        return redirect()->route('admin.gift-products.index')
            ->with('success', 'Produit créé avec succès.');
    }

    public function edit(GiftProduct $giftProduct)
    {
        return view('admin.gift-products.edit', compact('giftProduct'));
    }

    public function update(Request $request, GiftProduct $giftProduct)
    {
        $data = $request->validate([
            'image_url' => 'required|url',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'coupon' => 'nullable|string',
            'shop_link' => 'nullable|url',
            'is_active' => 'boolean',
            'translations.*.lang' => 'required|string|size:2',
            'translations.*.title' => 'required|string|max:191',
            'translations.*.description' => 'required|string',
        ]);

        $giftProduct->update($data);

        foreach ($data['translations'] as $translation) {
            $giftProduct->translateOrNew($translation['lang'])->fill($translation);
        }

        $giftProduct->save();

        return redirect()->route('admin.gift-products.index')
            ->with('success', 'Produit mis à jour avec succès.');
    }

    public function destroy(GiftProduct $giftProduct)
    {
        $giftProduct->delete();

        return redirect()->route('admin.gift-products.index')
            ->with('success', 'Produit supprimé avec succès.');
    }
}
