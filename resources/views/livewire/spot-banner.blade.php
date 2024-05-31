<div>
    <div class="col-lg-10 d-flex justify-content-center align-items-center" style="min-height: 100px;">
        @if ($banner)
        <a href="{{ $banner->redirect_url }}" target="_blank">
            <img src="{{ $banner->image_url }}" alt="Publicité" class="img-fluid">
        </a>
        @else
        <img src="{{ asset('frontend/assets/images/blog/pub1.jpg')}}" alt="Publicité" class="img-fluid">
        @endif
    </div>
</div>