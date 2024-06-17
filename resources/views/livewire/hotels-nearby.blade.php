<div>
    @if(!empty($hotels))
    <div class="hotel-container" style="background-color: #f5f5f5; padding: 20px;">
        @foreach ($hotels as $hotel)
        <div class="hotel-box">
            <a href="{{ $hotel->website_url }}" target="_blank" class="hotel-link">
                <img src="{{ $hotel->image_url }}" alt="Image de {{ $hotel->name }}" class="hotel-image">
                <div class="hotel-content">
                    <h3>{{ $hotel->name }}</h3>
                    <p>{{ round($hotel->distance, 2) }} km</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    @endif
</div>

<style>
    .hotel-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .hotel-box {
        flex: 1 1 20%;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin: 10px;
        background-color: #ffffff;
        box-sizing: border-box;
    }

    .hotel-link {
        display: inline-block;
        width: 100%;
        color: inherit;
        text-decoration: none;
    }

    .hotel-image {
        width: 100%;
        height: auto;
    }

    .hotel-content {
        padding: 10px;
    }

    .hotel-content h3 {
        margin: 0;
        font-size: 16px;
    }

    .hotel-content p {
        margin: 0;
        font-size: 14px;
    }

    @media (max-width: 1200px) {
        .hotel-box {
            flex: 1 1 25%;
        }
    }

    @media (max-width: 992px) {
        .hotel-box {
            flex: 1 1 33.33%;
        }
    }

    @media (max-width: 768px) {
        .hotel-box {
            flex: 1 1 45%;
        }
    }

    @media (max-width: 576px) {
        .hotel-box {
            flex: 1 1 100%;
        }
    }
</style>