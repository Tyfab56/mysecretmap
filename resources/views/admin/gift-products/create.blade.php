@extends('frontend.main_master')
@section('content')
<div>
<h1 class="text-center my-4">Créer un produit</h1>
<form
    action="{{ route('gift-products.store') }}"
    method="POST"
    enctype="multipart/form-data"
    class="container mt-4"
>
    @csrf
    <!-- Section d'upload d'image -->
    <div class="mb-4">
        <label for="image_url" class="form-label">Image du produit</label>
        <input
            type="file"
            id="image_url"
            name="image_url"
            class="form-control"
            accept="image/*"
            required
        >
    </div>

    <!-- Section des informations générales -->
    <div class="mb-4">
        <label for="price" class="form-label">Prix</label>
        <input
            type="number"
            id="price"
            name="price"
            class="form-control"
            placeholder="Entrez le prix du produit"
            required
        >
    </div>

    <div class="mb-4">
        <label for="discount_price" class="form-label">Prix remisé</label>
        <input
            type="number"
            id="discount_price"
            name="discount_price"
            class="form-control"
            placeholder="Entrez le prix remisé si applicable"
        >
    </div>

    <div class="mb-4">
        <label for="coupon" class="form-label">Code de réduction</label>
        <input
            type="text"
            id="coupon"
            name="coupon"
            class="form-control"
            placeholder="Entrez le code coupon si applicable"
        >
    </div>

    <div class="mb-4">
        <label for="shop_link" class="form-label">Lien boutique</label>
        <input
            type="url"
            id="shop_link"
            name="shop_link"
            class="form-control"
            placeholder="Lien vers la boutique"
        >
    </div>

    <div class="form-check form-switch mb-4">
        <input
            class="form-check-input"
            type="checkbox"
            id="is_active"
            name="is_active"
            value="1"
        >
        <label class="form-check-label" for="is_active">Produit actif</label>
    </div>

    <!-- Section des traductions -->
    <div class="mb-4">
        <h3 class="mb-3">Traductions</h3>
        <div id="translations-container">
            @foreach($langs as $index => $lang)
            <div class="translation-section mb-4">
                <h4 class="mb-3">Langue: {{ $lang->libelle }}</h4>
                <input
                    type="hidden"
                    name="translations[{{ $index }}][lang]"
                    value="{{ $lang->idlang }}"
                >

                <div class="mb-3">
                    <label for="translations[{{ $index }}][title]" class="form-label">Titre</label>
                    <input
                        type="text"
                        id="translations[{{ $index }}][title]"
                        name="translations[{{ $index }}][title]"
                        class="form-control"
                        placeholder="Titre du produit"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="translations[{{ $index }}][description]" class="form-label">Description</label>
                    <textarea
                        id="translations[{{ $index }}][description]"
                        name="translations[{{ $index }}][description]"
                        class="form-control"
                        placeholder="Description du produit"
                        rows="4"
                        required
                    ></textarea>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <button type="submit" class="btn btn-primary w-100">Créer le produit</button>
</form>
</div>
@endsection
