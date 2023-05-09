<div>
<div class="slider">
    @foreach ($pictures as $picture)
        <div class="slide">
            <img src="{{ $picture->small }}" alt="">
        </div>
    @endforeach
</div>
<style>
    .slider {
    display: flex;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    scroll-behavior: smooth;
}

.slide {
    width: 100%;
    scroll-snap-align: start;
}

img {
    width: 100%;
    height: auto;
}

</style>
</div>
