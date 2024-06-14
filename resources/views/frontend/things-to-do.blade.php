@extends('frontend.main_master')

@section('content')
<div class="container">
    <h1>Things to Do in {{$country}}</h1>
    <!-- Ajoutez des cases à cocher pour filtrer les spots -->
    <p><b>{{__('destination.clickmap')}}</b></p>
    <div style="display: flex; gap: 10px; align-items: center;">
        <label><input type="checkbox" id="1" name="spotType" value="1" checked> {{__('destination.Spot')}}</label>
        <label><input type="checkbox" id="3" name="spotType" value="3"> {{__('destination.Musee')}}</label>
        <label><input type="checkbox" id="4" name="spotType" value="4"> {{__('destination.Hotel')}}</label>
        <label><input type="checkbox" id="5" name="spotType" value="5"> {{__('destination.Camping')}}</label>
        <!-- Add more checkboxes as needed -->
    </div>
    <div class="things-to-do-list">
        @foreach($paginatedSpots as $spot)
        @php
        $translation = $spot->translate($locale);
        @endphp
        @if($translation)
        <div class="spot-item">
            <div class="spot-image">
                <img src="{{ $spot->imgsquaresmall }}" alt="{{ $spot->name }}">
            </div>
            <div class="spot-info">
                <h3>{{ $spot->name }}</h3>
                <p>{{ $translation->description }}</p>
                <a href="{{ route('spot.show', $spot->id) }}" class="btn btn-primary">View Spot</a>
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
    }

    .spot-item {
        display: flex;
        flex-direction: row;
        width: 100%;
        margin-bottom: 20px;
    }

    .spot-image {
        flex: 1;
    }

    .spot-info {
        flex: 2;
        padding-left: 20px;
    }

    .spot-image img {
        max-width: 100%;
        height: auto;
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
            fetch(`/things-to-do/{{$country}}?types=${selectedTypes.join(',')}`)
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
            spotItem.classList.add('spot-item');
            spotItem.innerHTML = `
                <div class="spot-image">
                    <img src="${spot.imgsquaresmall}" alt="${spot.name}">
                </div>
                <div class="spot-info">
                    <h3>${spot.name}</h3>
                    <p>${spot.translation.description}</p>
                    <a href="/spot/${spot.id}" class="btn btn-primary">View Spot</a>
                </div>
            `;
            list.appendChild(spotItem);
        });
    }
</script>
@endsection