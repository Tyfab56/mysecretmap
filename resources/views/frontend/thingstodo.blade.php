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
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="{{ $sortedSpot->spot->imgpanomedium }}" class="card-img-top" alt="{{ $sortedSpot->spot->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $sortedSpot->spot->name }}</h5>
                    <p class="card-text description">{{ $description }}</p>
                    <a href="{{ route('destination', ['id' => $country->pays_id, 'spotid' => $sortedSpot->spot->id]) }}" class="btn btn-primary">View Spot</a>
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
@endsection

@section('styles')
<style>
    .things-to-do-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .card {
        width: 100%;
    }

    .card .card-text.description {
        min-height: 140px;
        /* Ajustez cette hauteur selon vos besoins */
    }

    .pagination {
        margin-top: 20px;
    }
</style>
@endsection

@section('scripts')
<script>
    document.querySelectorAll('input[name="spotType"]').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const selectedTypes = Array.from(document.querySelectorAll('input[name="spotType"]:checked'))
                .map(cb => cb.value);
            fetch(`/thingstodo/{{ $country->pays_id }}?types=${selectedTypes.join(',')}`)
                .then(response => response.json())
                .then(data => {
                    // Logique pour mettre à jour la liste des spots
                    updateSpotsList(data);
                });
        });
    });

    function updateSpotsList(spots) {
        const list = document.querySelector('.things-to-do-list');
        list.innerHTML = '';
        spots.forEach(spot => {
            const spotItem = document.createElement('div');
            spotItem.classList.add('col-md-6');
            spotItem.innerHTML = `
        <div class="card mb-4">
            <img src="${spot.imgpanomedium}" class="card-img-top" alt="${spot.name}">
            <div class="card-body">
                <h5 class="card-title">${spot.name}</h5>
                <p class="card-text">${spot.translation.description.substring(0, 200)}...</p>
                <a href="/destination/${spot.country_id}/${spot.id}" class="btn btn-primary">View Spot</a>
            </div>
        </div>
        `;
            list.appendChild(spotItem);
        });
    }
</script>
@endsection