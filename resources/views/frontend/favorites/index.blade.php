@extends('frontend.main_master')

@section('content')
<div class="container">
    <h1>Mes Favoris</h1>
    <!-- Formulaire pour sélectionner la région -->
    <form method="GET" action="{{ url()->current() }}">
        <div class="form-group">
            <label for="region">Sélectionnez une région :</label>
            <select name="region" id="region" class="form-control">
                <option value="">Toutes les régions</option>
                @foreach($regions as $region)
                <option value="{{ $region->id }}" {{ request('region') == $region->id ? 'selected' : '' }}>
                    {{ $region->name }}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Filtrer</button>
    </form>
    <div class="row things-to-do-list">
        @foreach($favorites as $favorite)
        @php
        $spot = $favorite->spot;
        $region = $spot->region;
        $description = Str::limit($spot->description, 200);
        @endphp
        <div class="col-xl-4 col-lg-6 col-md-12 mb-4">
            <div class="card mb-4 h-100">
                <img src="{{ $spot->imgpanomedium }}" class="card-img-top" alt="{{ $spot->name }}">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex align-items-center mb-2">
                        @if($region && $region->image_path)
                        <img src="{{ asset('frontend/assets/images/map/' . $region->image_path) }}" alt="{{ $region->name }}" class="region-image">
                        @endif
                        <h4 class="card-title">{{ $spot->name }}</h4>
                    </div>
                    <p class="card-text description flex-grow-1">{{ $description }}</p>
                    <div class="mt-auto d-flex justify-content-center">
                        <a href="{{ route('destination', ['id' => $spot->country_id, 'spotid' => $spot->id]) }}" class="btn btn-primary mx-2 btn-equal">Voir le Spot</a>
                        <button class="btn btn-danger mx-2 btn-equal" onclick="removeFromFavorites({{ $spot->id }})">Supprimer favoris</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="pagination">
        {{ $favorites->links() }}
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Connexion requise</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Vous devez être connecté pour ajouter des favoris. Veuillez vous connecter ou créer un compte.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <a href="{{ route('login') }}" class="btn btn-primary">Connexion</a>
            </div>
        </div>
    </div>
</div>

<style>
    .things-to-do-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .card {
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    .card-body {
        display: flex;
        flex-direction: column;
    }

    .card-text.description {
        flex-grow: 1;
        font-size: 0.95rem !important;
        line-height: 22px;
    }

    .pagination {
        margin-top: 20px;
    }

    .btn-equal {
        width: 100%;
    }

    .btn-warning {
        background-color: #f0ad4e;
        border-color: #eea236;
        color: white;
    }

    .btn-warning:hover {
        background-color: #ec971f;
        border-color: #d58512;
    }

    .region-image {
        width: 60px;
        height: 60px;
        margin-bottom: 5px;
    }
</style>
@endsection

@section('scripts')
<script>
    function removeFromFavorites(spotId) {
        @if(Auth::check())
        fetch('{{ route("favorites.destroy", ["id" => ":id"]) }}'.replace(':id', spotId), {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            }).then(response => response.json())
            .then(data => {
                if (data.success) {
                    toastr.success(data.message);
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    alert('An error occurred.');
                }
            }).catch(error => {
                console.error('Error:', error);
            });
        @else
        $('#loginModal').modal('show');
        @endif
    }
</script>
@endsection