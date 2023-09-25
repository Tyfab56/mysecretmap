@extends('frontend.main_master')
@section('content')
<<section id="news" class="news">
    <div class="container">
        <div class="row text-center">
            
            <!-- Loop over the posts -->
            @foreach($posts as $post)
            <div class="col-md-6 post"> <!-- Assuming two posts per row, adjust as needed -->
                
                <!-- Div for the video -->
                <div class="video mb-3">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ $post->video_link }}" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-6 post">
                <!-- Div for the title and the description -->
                <div class="content">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->description }}</p>
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
@endsection