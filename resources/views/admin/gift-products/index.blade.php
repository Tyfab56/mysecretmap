@extends('frontend.main_master')
@section('content')
<div>
    <h1>Liste des produits</h1>
    <a href="{{ route('gift-products.create') }}" class="btn btn-primary">Créer un produit</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Titre (EN)</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td><img src="{{ $product->image_url }}" alt="Image" width="50"></td>
                <td>{{ $product->translate('en')->title ?? 'N/A' }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('gift-products.edit', $product) }}" class="btn btn-warning">Éditer</a>
                    <form action="{{ route('gift-products.destroy', $product) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->links() }}
</div>
@endsection