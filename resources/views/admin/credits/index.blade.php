@extends('frontend.main_master')


@section('content')
<div class="container mt-4">
    <h1>Gestion des Crédits Utilisateurs</h1>
    <div class="row">
        @foreach($users as $user)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        {{ $user->name }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.credits.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                @foreach(['photo' => 'Photos', 'video' => 'Vidéos', 'film' => 'Films'] as $mediaType => $label)
                                    <label for="credits-{{ $mediaType }}-{{ $user->id }}" class="form-label">{{ $label }}</label>
                                    <input type="number" class="form-control" id="credits-{{ $mediaType }}-{{ $user->id }}"
                                           name="credits[{{ $mediaType }}]"
                                           value="{{ $user->credits->where('media_type', $mediaType)->first()->credits ?? 0 }}">
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
