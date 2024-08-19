<div>
    @if(!empty($hotels))
    <div style="display: flex; overflow-x: auto; background-color: #f5f5f5; padding: 20px;">
        @foreach ($hotels as $hotel)
        <div class="hotel-card" style="flex: none; width: 20%; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin: 10px; background-color: #ffffff;">
            <a href="{{ $hotel->website_url }}" target="_blank" style="display: inline-block; width: 100%; color: inherit; text-decoration: none;">
                <img src="{{ $hotel->image_url }}" alt="Image de {{ $hotel->name }}" style="width: 100%; height: auto;">
                <div style="padding: 10px;">
                    <h3 style="margin: 0; font-size: 16px;">{{ $hotel->name }}</h3>
                    <p style="margin: 0; font-size: 14px;">{{ round($hotel->distance, 2) }} km</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    @endif
</div>