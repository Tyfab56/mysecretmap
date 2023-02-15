<div>

     @if (!empty($circuit)) 
        @foreach($circuit as $point) 
        <div class="list-spot">
            <div class="list-picture">
                  
                    <img class="list-photo" onClick="popimage('{{$point->spot()->first()->name}}',{{$point->spot()->first()->id}},{{$point->spot()->first()->lat}},{{$point->spot()->first()->lng}})"  src="{{$point->spot()->first()->imgsquaresmall}}" />
                    <div class="status" id="status"></div>
                    <div class="top-right"><img class="addit" title="remove from tour" src="{{asset('frontend/assets/images/delete.png')}}" onClick="removetour({{$point->spot()->first()->id}})"></div>
            </div>
	    <div>
        <div class="list-body">
            <div class="list-info">
                 <div class="list-titre">
                 
                    Etape {{$point->rang}} :  <span class="orange">{{$point->spot()->first()->name}} </span>-  Trajet : {{ \Carbon\Carbon::parse($point->temps)->format('H:i') }} ( Jour : {{ \Carbon\Carbon::parse($point->tempscumul)->format('H:i') }})
                    <p>Distance :  {!! round(Helper::convertDistance($point->metres,'meter','kilometer'),1) !!}km ( Jour :  {!! round(Helper::convertDistance($point->metrescumul,'meter','kilometer'),1) !!} km)</p>
                </div>
                <div class="list-desc cornblue">{{$point->spot()->first()->description}}</div>
            </div>
        </div>
        
	</div>
</div>
       
        @endforeach
        @endif
</div>
