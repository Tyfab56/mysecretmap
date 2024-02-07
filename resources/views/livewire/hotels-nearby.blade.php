<div wire:ignore x-data="{ swiper: null }"
     x-init="swiper = new Swiper('.hotels-swiper', {
                slidesPerView: 3,
                spaceBetween: 30,
                pagination: {
                  el: '.swiper-pagination',
                  clickable: true,
                },
                navigation: {
                  nextEl: '.swiper-button-next',
                  prevEl: '.swiper-button-prev',
                },
              })">
    <div class="swiper hotels-swiper">
        <div class="swiper-wrapper">
            @foreach ($hotels as $hotel)
                <div class="swiper-slide">
                    <img src="{{ $hotel->image_url }}" alt="Image de {{ $hotel->name }}" style="width: 100%;">
                    <div>{{ $hotel->name }}</div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
