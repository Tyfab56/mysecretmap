@extends('frontend.main_master')

@section('content')

<h1>Menu Administrateur</h1>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('admin.listspots') }}" class="btn btn-primary btn-block">Gestion des spots</a>
                <a href="{{ route('admin.createzoom') }}" class="btn btn-primary btn-block">Image Zoom</a>
               
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
            <a href="{{ route('admin.hotels') }}" class="btn btn-primary btn-block">Gestion Hotels</a>
                <a href="{{ route('admin.charly-posts.listposts') }}" class="btn btn-primary btn-block">Gestion Charly Posts</a>
                <a href="{{ route('admin.circuits') }}" class="btn btn-primary btn-block">Gestion Circuits</a>
                <a href="{{ route('admin.folderroot') }}" class="btn btn-primary btn-block">Partage de médias</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('admin.folderroot') }}" class="btn btn-primary btn-block">Partage de médias</a>
                <a href="{{ route('admin.shopifysaleslist') }}" class="btn btn-primary btn-block">Gestion Shopify Sales</a>
               
                <a href="{{ route('admin.timeline') }}" class="btn btn-primary btn-block">Timeline</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('admin.randos.listrandos') }}" class="btn btn-primary btn-block">Gestion des randonnées</a>
                <a href="{{ route('admin.messages.index') }}" class="btn btn-primary btn-block">Gestion des messages</a>
       
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('banners.index') }}" class="btn btn-primary btn-block">Gestion des Bannières</a>
                <a href="{{ route('banners.create') }}" class="btn btn-primary btn-block">Ajouter une Bannière</a>
                <a href="#" class="btn btn-primary btn-block">Associer une Bannière</a>
            </div>
        </div>
    </div>
   
</div>

@endsection
