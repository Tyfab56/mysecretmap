<div>
<div class="gridOverflow go-masonry">

    @foreach ($pictures as $picture)
    <a href="/destination/{{$picture->spot->pays_id}}/{{$picture->spot->id}}"class="go_gridItem">

         <img src="{{ $picture->medium}}" /> 
         <span class="go_caption go_caption-full">
                {{ $picture->spot->name}}
                <img src="{{ $picture->user->avatar}}" class="avatar" alt="{{$picture->user->pseudo}}"/> 
         </span>
         
            
    </a>
    @endforeach
  <div class="go_gridItem go_gridItem-centered" href="someURL"><p> centered content - typically some text </p> </div>
 
</div>
{{ $pictures->links() }}
</div>
