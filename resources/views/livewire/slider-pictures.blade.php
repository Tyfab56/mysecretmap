<div>
<div class="slider">
	<a class="prev" href="#">&#10094;</a>
    <a class="next" href="#">&#10095;</a>
    @foreach ($pictures as $picture)
        <div class="slide">
            <img src="{{ $picture->small }}" alt="">
        </div>
    @endforeach
</div>
	<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("slide");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
      
    }

    document.querySelector(".prev").addEventListener("click", function() {
        plusSlides(-1);
    });
    document.querySelector(".next").addEventListener("click", function() {
        plusSlides(1);
    });
</script>

<style>
	.prev, .next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    padding: 16px;
    color: white;
    font-size: 20px;
    transition: 0.6s ease;
}

.next {
    right: 0;
}



	
    .slider {
    display: flex;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    scroll-behavior: smooth;
}

.slide {
    width: 100%;
	margin-left: 2px;
    scroll-snap-align: start;
}

.slide img {
    width: auto;
     height: 100px
}
.slider-image {
   ; /* set desired height */
}
</style>
</div>
