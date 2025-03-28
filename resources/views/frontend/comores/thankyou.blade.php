<!-- resources/views/thankyou.blade.php -->
@extends('frontend.main_master')
@section('content')
    <div class="max-w-4xl mx-auto px-4 py-12">
        <!-- Affichage des erreurs -->
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded mb-6">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @else
            <!-- Message de remerciement -->
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-6 mb-8 rounded">
                <h1 class="text-2xl font-bold mb-2">🎉 Merci pour votre participation !</h1>
                <p class="text-lg">Nous avons bien enregistré votre réponse. Restez à l’écoute pour découvrir si vous faites
                    partie des gagnants !</p>
            </div>
        @endif

        <!-- Réinclusion du formulaire -->
        @include('components.contest-form')

        <!-- Bandeau pour découvrir le guide sur l'Islande -->
        <div class="mt-12 bg-blue-50 p-6 rounded shadow text-center">
            <h2 class="text-xl font-bold mb-2">🇮🇸 Découvrez le guide audio de l'Islande</h2>
            <p class="mb-4">Partez à la découverte des terres de glace et de feu avec notre collection Charly !</p>
            <a href="/guides/islande"
                class="inline-block bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700">
                Explorer le guide
            </a>
        </div>
    </div>
@endsection
