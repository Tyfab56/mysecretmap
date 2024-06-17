<div class="container my-4">
    @if(!empty($hotels))
    <div class="row gx-3 gy-3" style="background-color: #f5f5f5; padding: 20px;">
        @foreach ($hotels as $hotel)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <div class="card h-100" style="box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <a href="{{ $hotel->website_url }}" target="_blank" style="display: inline-block; width: 100%; color: inherit; text-decoration: none;">
                    <img src="{{ $hotel->image_url }}" alt="Image de {{ $hotel->name }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 16px;">{{ $hotel->name }}</h5>
                        <p class="card-text" style="font-size: 14px;">{{ round($hotel->distance, 2) }} km</p>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>