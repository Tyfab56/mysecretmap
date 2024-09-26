@extends('frontend.main_master')

@section('content')
<div class="container">
    <h1>Gestion des Audioguides</h1>

    @foreach ($spotsByCountry as $countryId => $spots)
    @if ($spots->isNotEmpty() && $spots->first()->pays)
    <h2>{{ $spots->first()->pays->pays }}</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom du Spot</th>
                <th>Ajouter au Guide</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($spots as $spot)
            <tr>
                <td>{{ $spot->name }}</td>
                <td>
                    @foreach (['fr', 'en', 'de', 'it'] as $lang)
                    <form action="{{ route('admin.audioguides.' . ($spot->isInAudioguide($lang) ? 'remove' : 'add')) }}" method="POST">
                        @csrf
                        <input type="hidden" name="spot_id" value="{{ $spot->id }}">
                        <input type="hidden" name="language_code" value="{{ $lang }}">
                        <button type="submit" class="btn {{ $spot->isInAudioguide($lang) ? 'btn-danger' : 'btn-primary' }}">
                            {{ strtoupper($lang) }} - {{ $spot->isInAudioguide($lang) ? 'Retirer' : 'Ajouter' }}
                        </button>
                    </form>
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Aucun spot disponible pour ce pays.</p>
    @endif
    @endforeach
</div>
@endsection