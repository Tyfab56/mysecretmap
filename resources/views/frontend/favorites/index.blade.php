@extends('frontend.main_master')

@section('content')
<div class="container">
    <h1>My Favorites</h1>
    <div>
        <a href="{{ route('thingstodo.index') }}">Add Spots to Favorites</a>
    </div>
    <div class="row mt-4">
        @foreach($favorites as $favorite)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $favorite->spot->name }}</h5>
                    <p class="card-text">{{ $favorite->spot->description }}</p>
                    @if($favorite->spot->region)
                    <p class="card-text">Region: {{ $favorite->spot->region->name }}</p>
                    <img src="{{ asset($favorite->spot->region->image_path) }}" alt="{{ $favorite->spot->region->name }}" class="img-fluid">
                    @endif
                    <a href="{{ route('circuit.add', ['country' => $favorite->spot->region->id]) }}" class="btn btn-primary">Add to Circuit</a>
                    <form action="{{ route('favorites.destroy', $favorite->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Remove from Favorites</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection