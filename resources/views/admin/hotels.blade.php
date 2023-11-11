@extends('frontend.main_master')
@section('content')
<div class="container">
    <h1>Liste des Hôtels</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.hotels.create') }}" class="btn btn-primary">Ajouter un nouvel hôtel</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hotels as $hotel)
            <tr>
                <td>{{ $hotel->name }}</td>
                <td>
                    {{-- Bouton ou lien pour supprimer un hôtel --}}
                    <form action="{{ route('admin.hotels.destroy', $hotel->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection