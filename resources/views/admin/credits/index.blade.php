@extends('frontend.main_master')
@section('content')
<h1>Gestion des Crédits Utilisateurs</h1>
@foreach($users as $user)
    <form action="{{ route('admin.credits.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <h2>{{ $user->name }}</h2>
        @foreach(['photo', 'video', 'film'] as $mediaType)
            <div>
                <label>{{ ucfirst($mediaType) }} Credits:</label>
                <input type="number" name="credits[{{ $mediaType }}]" value="{{ $user->credits->where('media_type', $mediaType)->first()->credits ?? 0 }}">
            </div>
        @endforeach
        <button type="submit">Update Credits</button>
    </form>
@endforeach
@endsection