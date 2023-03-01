@extends('frontend.main_master')
@section('content')
<h1>Gestion des circuits</h1>

<div class="row">
    <select class="form-control ml15 mw350 mauto white" id="idcircuit" name="idcircuit">
        <option value="" selected >{{__('destination.SelectCircuit')}}</option>
        @foreach($circuits as $circuit)                    
            <option value="{{$circuit->id}}">{{$circuit->titrecircuit}}</option>
        @endforeach
    </select>
</div>

Ajout de circuits
Ajout d'une description
Ajout d'une image 

@endsection
@section('scripts')
function loadCircuit()
{
    
}

@endsection