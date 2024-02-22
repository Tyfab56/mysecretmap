@extends('frontend.main_master')
@section('content')
<h1>Gestion des randonnées</h1>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($randos as $rando)
                <tr>
                    <td>{{ $rando->id }}</td>
                    <td>{{ $rando->name }}</td>
                    <td>
                        {{-- Boutons d'action (edit, delete...) --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection