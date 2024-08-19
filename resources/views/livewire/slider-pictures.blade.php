<div>
  @if($pictures->isNotEmpty())
  <h1>Pictures about ({{$pictures->count()}})</h1>
  <div class="gridOverflow go-masonry">

    @foreach ($pictures as $picture)
    <a href="/destination/{{$picture->spot->pays_id}}/{{$picture->spot->id}}" class="go_gridItem">

      <img src="{{ $picture->medium}}" />
      <span class="go_caption go_caption-full">
        {{ $picture->spot->name}}
        <img src="{{ $picture->user->avatar}}" class="avatar-r45" alt="{{$picture->user->pseudo}}" />
      </span>

    </a>
    @endforeach
    <div class="go_gridItem go_gridItem-centered" href="someURL">
      <p> </p>
    </div>
    <a href="{{ route('gallery', ['idspot' => $pictures->first()->spot_id]) }}" class="btn btn-primary">
      {{__('destination.CompleteGallery')}}
    </a>
    @if(auth()->user() && auth()->user()->isPhotographer())
    <a href="" class="btn btn-secondary">
      Proposer des photos
    </a>
    @endif
  </div>
  @endif
</div>