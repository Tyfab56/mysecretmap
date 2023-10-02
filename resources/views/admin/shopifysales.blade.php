@extends('frontend.main_master')
@section('content') 
<form action="{{ route('admin.shopifysales.store') }}" method="post">
    @csrf
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="price" placeholder="Price" required>
    <input type="text" name="currency" placeholder="Currency" required>
    <input type="text" name="status" placeholder="Status" required>
    <input type="text" name="idproduit" placeholder="Product ID" required>
    <!-- Ajoutez d'autres champs si nécessaire -->
    <button type="submit">Submit</button>
</form>

@endsection