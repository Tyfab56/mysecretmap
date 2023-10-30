@if ($shouldRender)
    <div>
                    <div class="video-wrapper">
                        <iframe src="https://www.youtube.com/embed/{{ $charlyPost->video_link }}" frameborder="0" allowfullscreen></iframe>
                    </div>
        <!-- Plus de détails sur le post Charly ici -->
    </div>
@endif
