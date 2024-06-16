@extends('frontend.main_master')

@section('content')
<div class="container">
    <h1>Things to Do in {{ $country->pays }}</h1>
    <!-- Ajoutez des cases à cocher pour filtrer les spots -->
    <div style="display: flex; gap: 10px; align-items: center;">
        <label><input type="checkbox" id="1" name="spotType" value="1" checked> {{ __('destination.Spot') }}</label>
        <label><input type="checkbox" id="3" name="spotType" value="3"> {{ __('destination.Musee') }}</label>
        <label><input type="checkbox" id="4" name="spotType" value="4"> {{ __('destination.Hotel') }}</label>
        <label><input type="checkbox" id="5" name="spotType" value="5"> {{ __('destination.Camping') }}</label>
        <!-- Add more checkboxes as needed -->
    </div>
    <div class="row things-to-do-list">
        @foreach($paginatedSpots as $sortedSpot)
        @php
        $translation = $sortedSpot->spot->translate($locale);
        $description = Str::limit($translation->description, 200);
        @endphp
        @if($translation)
        <div class="col-xl-4 col-lg-6 col-md-12 mb-4">
            <div class="card mb-4 h-100">
                <img src="{{ $sortedSpot->spot->imgpanomedium }}" class="card-img-top" alt="{{ $sortedSpot->spot->name }}">
                <div class="card-body d-flex flex-column">
                    @if($sortedSpot->spot->region && $sortedSpot->spot->region->image_path)
                    <img src="{{ asset('frontend/assets/images/map/' . $sortedSpot->spot->region->image_path) }}" alt="{{ $sortedSpot->spot->region->name }}" class="region-image">
                    @endif
                    <h4 class="card-title">{{ $sortedSpot->spot->name }}</h4>
                    <p class="card-text description flex-grow-1">{{ $description }}</p>
                    <div class="mt-auto d-flex justify-content-center">
                        <a href="{{ route('destination', ['id' => $country->pays_id, 'spotid' => $sortedSpot->spot->id]) }}" class="btn btn-primary mx-2 btn-equal">View Spot</a>
                        <button class="btn btn-warning mx-2 btn-equal" onclick="addToFavorites({{ $sortedSpot->spot->id }})">Ajouter aux favoris</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    <!-- Ajoutez les liens de pagination -->
    <div class="pagination">
        {{ $paginatedSpots->links() }}
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
        width: 30px;
        height: 30px;
        margin-bottom: 5px;
    }
</style>
@endsection

@section('scripts')
document.querySelectorAll('input[name="spotType"]').forEach(checkbox => {
checkbox.addEventListener('change', function() {
const selectedTypes = Array.from(document.querySelectorAll('input[name="spotType"]:checked'))
.map(cb => cb.value);
fetch(`/thingstodo/{{ $country->pays_id }}?types=${selectedTypes.join(',')}`)
.then(response => response.json())
.then(data => {
updateSpotsList(data);
});
});
});

function updateSpotsList(spots) {
const list = document.querySelector('.things-to-do-list');
list.innerHTML = '';
spots.forEach(spot => {
const spotItem = document.createElement('div');
spotItem.classList.add('col-xl-4', 'col-lg-6', 'col-md-12', 'mb-4');
spotItem.innerHTML = `
<div class="card h-100">
    <img src="${spot.imgpanomedium}" class="card-img-top" alt="${spot.name}">
    <div class="card-body d-flex flex-column">
        ${spot.region && spot.region.image_path ? `<img src="frontend/assets/images/map/${spot.region.image_path}" alt="${spot.region.name}" class="region-image">` : ''}
        <h2 class="card-title">${spot.name}</h2>
        <p class="card-text description" style="flex-grow: 1; min-height: 140px; font-size: 0.875rem !important;">${spot.translation.description.substring(0, 200)}...</p>
        <div class="mt-auto d-flex justify-content-center">
            <a href="/destination/${spot.country_id}/${spot.id}" class="btn btn-primary mx-2 btn-equal">View Spot</a>
            <button class="btn btn-warning mx-2 btn-equal" onclick="addToFavorites(${spot.id})">Ajouter aux favoris</button>
        </div>
    </div>
</div>
`;
list.appendChild(spotItem);
});
}

function addToFavorites(spotId) {
@if(Auth::check())
alert('Ajouté aux favoris avec succès!');
@else
$('#loginModal').modal('show');
@endif
}
@endsection