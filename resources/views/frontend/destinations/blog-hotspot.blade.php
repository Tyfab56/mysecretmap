@extends('frontend.main_master')
@section('content')
<div class="container">
<div class="row ml-5 mt-2">
<b><i class="fa-solid fa-blog"></i><a href="{{ route ('blog') }}" class="orange"> {{__('blog.Blog')}}</a> / {{__('blog.Titre1')}}</b>
</div>
<div class="row">
<img src="{{ asset('frontend/assets/images/team/fab1.jpg')}}" alt="Fabrice H" class="img-fluid ml-5 smallavatar">
<h6 class="mb-0 mt-2">Fabrice H</h6>
</div>

<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  timeline">
    
    <div class="row justify-content-center">
    <h1>{{__('blog.TitreLong1')}}</h1>     
    <h6 class="grey" >Le Blog aborde certains concepts utiles pour la compréhension des destinations couvertes par « My Secret Map ».</h6>
    <img class="card-img-top rounded max80" src="{{ asset('frontend/assets/images/blog/blog1header.jpg')}}" alt="{{__('blog.Titre1')}}">
            

    </div>
    <h2 class="mt-4">Qu’est ce qu’un Point Chaud ?</h2>
    <div class="row mt-3">
     
      <div class="col-6"><p>Un point chaud est une anomalie géologique. Bien que le mécanisme exact soit encore peu connu, c'est le résultat d'une remontée de magma provenant d'une fusion partielle de matière dans le manteau inférieur. Il faut imaginer un panache de roche chaude qui remontent depuis les profondeurs de la Terre et et qui vient fondre à la base de la croute terrestre.  La chaleur monte par le processus de convection. 
</p><p>Lorsque la tête du panache atteint les couches supérieures, elle s'étend en forme de champignon atteignant un diamètre d'environ 500 à 1 000 kilomètres.
Ensuite, le magma se fraye un chemin par des fractures pour créer des eruptions volcaniques.</p><p>Il a une durée de vie de plusieurs millions d'années et on peut le considérer comme fixe à l'échelle du globe.</p></div>
      <div class="col-6"><img class="card-img-top rounded" src="{{ asset('frontend/assets/images/blog/hotspot.jpeg')}}" alt=""></div>
      
    </div>

    <h2 class="mt-4">Combien de points chauds ?</h2>
    <div class="row mt-3">
            <div class="col-6 center">
            <img class="card-img-top rounded max80" src="{{ asset('frontend/assets/images/blog/counthotspots.png')}}" alt="">
            </div>
            <div class="col-6">
            <p>Les géologues estiment qu'il existe environ 40 à 50 points chauds dans le monde. Il ne sont pas forcement au niveau des jonctions de plaques. Les points rouges représentent les spot particulièrement actifs. La plupart sont situés sous les océans, mais certains sont en dessous des terres emmergés. Si le point chaud se retrouve sous une croûte continentale très épaisse, le volcanisme est alors bien moins visible, voire inexistant. Ce type de contexte se retrouve actuellement en Afrique et au Groenland (deux plaques continentales, particulièrement épaisses). Pour rappel, une croûte océanique fait en moyenne 7 km d'épaisseur alors qu'une croûte continentale très vieille peut faire 40 km (contre 30 pour une croûte continentale normale).</p>
            <p>Lorsque qu’une faille entre deux plaques tectoniques passent au dessus d’un point chaud, vous avez la création d’une grande quantité de matière. C’est ainsi que l’Islande est née.</p>
            
            </div>
    </div>
    <h2 class="mt-4">Influence des points chaud sur la planète</h2>
    <p>Un tel phénomène a un important impact sur la planète, il apporte le volcanisme au coeur des continents (comme à Yeloow Stone par exempe). Sur plusieurs millions d'années, il peut modeler les paysages en créant des chaines de volcans.</p>
    <p>Un volcan situé au-dessus d'un point chaud n'est pas éternellement en éruption. Lorsque la plaque tectonique se déplace sur le point chaud (stationnaire), le volcan est déporté et de nouvelles éruptions se forment à sa place. Il en résulte des chaînes de volcans, comme les îles hawaïennes, Iles Marquises ou autres.</p>
    <p>La théorie est encore discuté par les scientifiques et le concept est assez récent. En fonction des écrits que vous pourrez consulter certaines variantes sur la profondeur d’origine  du phénomène.
La théorie dominante, élaborée par le géophysicien canadien J. Tuzo Wilson en 1963, stipule que les volcans de point chaud sont créés par des zones exceptionnellement chaudes fixées en profondeur sous le manteau terrestre. D’autres scientifiques pensent que leur origine est beaucoup plus profondes.</p>
</div>



@endsection