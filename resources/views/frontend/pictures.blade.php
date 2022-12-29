@extends('frontend.main_master')
@section('content')
<div >
      
<a class="btn btn-primary m5" href="javascript:window.history.back()">RETOUR PAGE PRECEDENTE</a>
       @livewire('show-images', ['idspot' => $spot->id])
</div>



@endsection
@section('scripts')

@endsection