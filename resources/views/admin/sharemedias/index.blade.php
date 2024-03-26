@extends('frontend.main_master')


@section('content')
<div class="container">
    <h1>Médias Partagés</h1>
    <a href="{{ route('admin.sharemedias.create') }}" class="btn btn-primary">Ajouter un nouveau média</a>
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Type</th>
                <th>Crédits</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shareMedias as $media)
            <tr>
                <td>{{ $media->title }}</td>
                <td>{{ $media->media_type }}</td>
                <td>{{ $media->credits }}</td>
                <td>
                    <a href="{{ route('admin.sharemedias.edit', $media->id) }}" class="btn btn-sm btn-secondary">Modifier</a>
                    <form action="{{ route('admin.sharemedias.destroy', $media->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
