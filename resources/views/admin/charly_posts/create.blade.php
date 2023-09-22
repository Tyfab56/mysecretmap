@extends('frontend.main_master')
@section('content')
<h2>Create a CharlyPost</h2>

<form action="{{ route('charly-posts.store') }}" method="post">
    @csrf

    <div class="form-group">
        <label for="spot_id">Spot ID</label>
        <input type="text" name="spot_id" id="spot_id" class="form-control">
    </div>

    <div class="form-group">
        <label for="pays_id">Pays ID</label>
        <input type="text" name="pays_id" id="pays_id" class="form-control">
    </div>

    <div class="form-group">
        <label for="rang">Rang</label>
        <input type="text" name="rang" id="rang" class="form-control">
    </div>

    <div class="form-group">
        <label for="language">Select Language</label>
        <select name="language" id="language" class="form-control">
            @foreach($languages as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" class="form-control">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="5" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="video_link">Video Link</label>
        <input type="text" name="video_link" id="video_link" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Create CharlyPost</button>
</form>

@endsection



@endsection