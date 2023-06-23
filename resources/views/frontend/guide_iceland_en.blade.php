@extends('frontend.main_master')
@section('content')
<deckgo-demo 
                                                src="https://mysecretmap.com/audioguide_demo"
                                                instant="true"
                                                style="width: 30vw; height: 90vh;">
                                                Wait for the demo
                                     </deckgo-demo>
@endsection

@section('fullscripts')

<script type="module" src="https://unpkg.com/@deckdeckgo/demo@latest/dist/deckdeckgo-demo/deckdeckgo-demo.esm.js"></script>
<script nomodule="" src="https://unpkg.com/@deckdeckgo/demo@latest/dist/deckdeckgo-demo/deckdeckgo-demo.js"></script>


@endsection