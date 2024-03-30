@extends('frontend.main_master')

@section('content')
<div class="container mt-4">
    <h2>Acheter des Crédits</h2>
    <p>Utilisez le formulaire ci-dessous pour acheter des crédits supplémentaires.</p>

    <form action="#" method="POST">
        @csrf
        <div class="mb-3">
            <label for="creditAmount" class="form-label">Nombre de crédits à acheter</label>
            <input type="number" class="form-control" id="creditAmount" name="credit_amount" min="1" required>
        </div>
        <button type="submit" class="btn btn-primary">Procéder à l'achat</button>
    </form>
</div>
@endsection
