@extends('frontend.main_master')
@section('scripts')
$(document).ready(function() {
    $('.ellipsis').on('click', function() {
        $(this).prev('.hidden-content').toggle();
        $(this).text($(this).text() == '...' ? 'Hide' : '...');
    });
});
@endsection
@section('content')
<<section id="news" class="news">
    <div class="container">
        <div class="row text-center">
            
            <!-- Loop over the posts -->
            @foreach($posts as $post)

            @php
                $content = $post->description;
                $displayContent = strlen($content) > 900 ? substr($content, 0, 900) : $content;
                $hiddenContent = strlen($content) > 900 ? substr($content, 900) : '';
            @endphp

            <div class="col-md-4 "> <!-- Assuming two posts per row, adjust as needed -->
                
                <!-- Div for the video -->
                <div class="post-container">
                    <div class="circle">{{ $post->rang }}</div>
                    <h4>{{ $post->titre }}</h4>
                </div>
                <div class="video mb-3">
                    <div class="video-wrapper">
                        <iframe src="https://www.youtube.com/embed/{{ $post->video_link }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                   
                </div>
            </div>
            <div class="col-md-8 ">
                <!-- Div for the title and the description -->
                <div class="content">
                <div class="post-content mt-5">
                        {{ $displayContent }}
                        <span class="hidden-content">{{ $hiddenContent }}</span>
                        @if(strlen($content) > 900)
                            <span class="ellipsis">...</span>
                        @endif
                    </div>
                   
                </div>
            </div>
            @endforeach
            
        </div>
        
        <!-- Pagination links (if needed) -->
        <div class="row">
            <div class="col-12">
                {{ $posts->links() }}
            </div>
        </div>
        
    </div>
</section>

<!-- Liens de pagination -->
{{ $posts->links() }}
<style>

   .video-wrapper {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 aspect ratio */
    height: 0;
    overflow: hidden;
}

.video-wrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
.hidden-content {
    display: none;
}
.ellipsis {
    cursor: pointer;
}

.post-container {
    display: flex;
    align-items: center; /* Aligner les éléments verticalement au centre */
}

.circle {
    width: 30px; /* Ajustez la taille du cercle selon vos besoins */
    height: 30px; /* Ajustez la taille du cercle selon vos besoins */
    background-color: #007bff; /* Couleur de fond du cercle */
    color: #fff; /* Couleur du texte à l'intérieur du cercle */
    border-radius: 50%; /* Pour créer un cercle */
    text-align: center;
    line-height: 30px; /* Pour centrer verticalement le texte à l'intérieur du cercle */
    margin-right: 10px; /* Espace entre le cercle et le titre */
}






</style>

@endsection