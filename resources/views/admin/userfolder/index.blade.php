@extends('frontend.main_master')

@section('content')
<div class="container">
    <div class="row">
        <!-- Colonne de filtrage des utilisateurs -->
            <div class="col">
                <form action="{{ route('admin.userfolder.index') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Rechercher un utilisateur..." name="search" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Rechercher</button>
                        </div>
                    </div>
                </form>
                <div id="searchResults" class="list-group mt-3">
                <!-- Affichez les résultats ici si vous retournez la vue depuis le contrôleur -->
                @foreach($users as $user)
                    <a href="#" class="list-group-item list-group-item-action">
                        {{ $user->name }} - {{ $user->email }}
                    </a>
                @endforeach
                </div>
            </div>

        <!-- Colonne pour les dossiers associés à l'utilisateur sélectionné -->
        <div class="col" id="folderColumn">
            <!-- Les dossiers de l'utilisateur sélectionné s'afficheront ici -->
        </div>

        <!-- Colonne pour les détails ou actions supplémentaires -->
        <div class="col" id="detailColumn">
            <!-- Détails ou actions pour le dossier sélectionné s'afficheront ici -->
        </div>
    </div>
</div>

@endsection
