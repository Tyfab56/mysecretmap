@extends('frontend.main_master')
@section('scripts')
$(document).ready(function() {
    $('.ellipsis').on('click', function() {
        $(this).prev('.hidden-content').toggle();
        $(this).text($(this).text() == '...' ? '<br>Hide</b>' : '...');
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
                $displayContent = strlen($content) > 600 ? substr($content, 0, 600) : $content;
                $hiddenContent = strlen($content) > 600 ? substr($content, 600) : '';
            @endphp

            <div class="col-md-4 "> <!-- Assuming two posts per row, adjust as needed -->
                
                <!-- Div for the video -->
                <h3>{{ $post->titre  }}</h3>
                <div class="video mb-3">
                    <div class="video-wrapper">
                        <iframe src="https://www.youtube.com/embed/{{ $post->video_link }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                   
                </div>
            </div>
            <div class="col-md-8 ">
                <!-- Div for the title and the description -->
                <div class="content">
                <div class="post-content">
                        {{ $displayContent }}
                        <span class="hidden-content">{{ $hiddenContent }}</span>
                        @if(strlen($content) > 600)
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
</style>

@endsection