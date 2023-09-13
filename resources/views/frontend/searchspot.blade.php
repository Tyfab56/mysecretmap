@extends('frontend.main_master')
@section('content') 

<section id="ts-features" class="ts-features">
    <div class="container">
    <div class="row">
            <div class="col-12">
                <h2>Résultats pour : "{{ $query }}"</h2>
            </div>
        </div>
        <div class="row">
            <!-- Contenu principal -->
            <div class="col-lg-8">
                @foreach ($spots as $spot)
                    <div class="d-flex align-items-center mb-3">
                        <!-- Image à gauche -->
                        <img src="{{ $spot->imgsquaresmall }}" alt="{{ $spot->name }}" class="mr-3" width="100" height="100">

                        <!-- Titre et description à droite de l'image -->
                        <div class="flex-grow-1">
                            <h4>{{ $spot->name }}</h4>
                            <p>{{ $spot->translate(app()->getLocale())->description }}</p>
                        </div>

                        <!-- Bouton encore plus à droite -->
                        <div>
                            <a href="destination/{{$spot->pays_id}}/{{$spot->id}}" class="btn btn-primary">
                                Voir plus
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Sidebar à droite -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <!-- Contenu de votre sidebar ici -->
                    <!-- Par exemple, une liste de liens, un widget, etc. -->
                </div>
            </div>
        </div>
    </div>
</section>



@endsection