<div>
    <div class="row" data-masonry='{"percentPosition": true }'>
        @if (!empty($pictures)) 
        @foreach($pictures as $picture) 
        <div class="col-sm-6 col-lg-4 mb-4">
          <img  src="{{$picture->medium }}" >
        </div>
        @endforeach
        @endif
      </div>
</div>
