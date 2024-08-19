<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10">
            <div class="d-flex justify-content-center align-items-center bg-light p-3" style="min-height: 100px;">
                @if ($banner)
                <a href="{{ $banner->redirect_url }}" target="_blank">
                    <img src="{{ $banner->image_url }}" alt="Publicité" class="img-fluid w-100">
                </a>
                @else
                <img src="{{ asset('frontend/assets/images/blog/pub1.jpg')}}" alt="Publicité" class="img-fluid w-100">
                @endif
            </div>
        </div>
    </div>
</div>