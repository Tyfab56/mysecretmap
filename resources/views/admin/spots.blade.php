@extends('admin.main_master')
@section('content')
<div class="Container">
<h1>gestion des spots</h1>
</div>
<section class="lg-4">
    <div class="lg:col-span-4">
      <div class="row">
@livewire('spots-table-view')
      </div>
    </div>
</section>
@endsection