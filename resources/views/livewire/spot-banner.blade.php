<div>
    <div class="bg-light p-3" style="min-height: 100px; width: 100%;">
        @if ($banner)
        <a href="{{ $banner->redirect_url }}" target="_blank">
            <img src="{{ $banner->image_url }}" alt="Publicité" class="img-fluid w-100">
        </a>
        @else
        <a href="http://www.villa-laurina.com" target="_blank">
            <img src="{{ asset('frontend/assets/images/blog/pub1.jpg')}}" alt="Publicité" class="img-fluid w-100">
        </a>
        @endif
    </div>
</div>