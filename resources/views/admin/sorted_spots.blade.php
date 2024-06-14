@extends('frontend.main_master')

@section('content')
<div class="container">
    <h1>Generate Sorted Spots</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <form action="{{ route('admin.sorted-spots.generate') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="country_id">Select Country:</label>
            <select name="country_id" id="country_id" class="form-control">
                @foreach ($countries as $pays)
                <option value="{{ $pays->pays_id }}">{{ $pays->pays }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Generate Sorted Spots</button>
    </form>
</div>
@endsection