@extends('frontend.main_master')
@section('content')
<div>
    <h1>Créer un produit</h1>
    <form action="{{ route('admin.gift-products.store') }}" method="POST">
        @csrf
        <div>
            <label>Image URL</label>
            <input type="url" name="image_url" required>
        </div>
        <div>
            <label>Prix</label>
            <input type="number" name="price" required>
        </div>
        <div>
            <label>Prix remisé</label>
            <input type="number" name="discount_price">
        </div>
        <div>
            <label>Coupon</label>
            <input type="text" name="coupon">
        </div>
        <div>
            <label>Lien boutique</label>
            <input type="url" name="shop_link">
        </div>
        <div>
            <label>Actif</label>
            <input type="checkbox" name="is_active" value="1">
        </div>
        <div>
            <h3>Traductions</h3>
            <div>
                <label>Langue</label>
                <input type="text" name="translations[0][lang]" required>
                <label>Titre</label>
                <input type="text" name="translations[0][title]" required>
                <label>Description</label>
                <textarea name="translations[0][description]" required></textarea>
            </div>
        </div>
        <button type="submit">Créer</button>
    </form>
</div>
@endsection
