@extends('frontend.main_master')
@section('content')
<div class="container">
        <h1>{{ __('blog.OtSpot1') }}</h1>
        <p>{{ __('blog.OtSpot2') }}</p>
        <h4>{{ __('blog.OtSpot3') }}</h4>
        <p>{!! __('blog.OtSpot4') !!}</p>
        <p></p>
        <p>{!! __('blog.OtSpot5') !!}</p>
        <div class="card">
    <div class="card-body">
        <p>{!! __('blog.OtSpot6') !!}</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <p>{!! __('blog.OtSpot7') !!}</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <p>{!! __('blog.OtSpot8') !!}</p>
    </div>
</div>
        <h3>{!! __('blog.OtSpot9') !!}</h3>
        <ul>
            <li>{!! __('blog.OtSpot10') !!}</li>
            <li>{!! __('blog.OtSpot11') !!}</li>
        </ul>
       
        <p>{!! __('blog.OtSpotContact') !!}</p>
        <a href="{{ route('contact') }}" class="btn btn-primary">{!! __('blog.OtSpotContact') !!}</a>

    </div>
@endsection