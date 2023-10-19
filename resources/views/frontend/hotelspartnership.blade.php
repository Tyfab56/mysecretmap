@extends('frontend.main_master')
@section('content')

<div class="container mt-5">
            <h1 class="text-center mb-4">{{ __('audioguide.HotelTitre') }}</h1>

            <!-- Image en dessous -->
            <div class="text-center">
                <img src="{{ asset('frontend/assets/images/charly_80.png') }}" alt="Description de l'image" class="img-fluid mb-4">
            </div>
            <h2 class="text-center mb-4">{{ __('audioguide.HotelSousTitre') }}</h2>

            <div class="container">
    <div>
        <h2>Découvrez L'Islande Avec Charly</h2>
        <p>Partez à l'aventure avec Charly, votre assistant de voyage audio, qui vous guide à travers 200 sites emblématiques d'Islande. Avec 5 heures d'audio à votre disposition, explorez non seulement les sites renommés, mais aussi des trésors cachés et moins visités. Grâce à Charly, chaque recoin de l'Islande s'anime pour une expérience de voyage authentique et inoubliable.</p>
    </div>
    <div>
        <h2>Pourquoi s'associer à nous ?</h2>
        <p>En devenant notre partenaire, vous offrez à vos clients une valeur ajoutée à leur séjour en Islande. Non seulement ils bénéficient d'un guide expert, mais ils peuvent aussi explorer des sites moins fréquentés, offrant ainsi une expérience unique à chaque voyageur. De plus, avec un QR code personnalisé pour votre établissement, vous pouvez suivre les ventes et bénéficier d'une commission pour chaque audioguide vendu.</p>
    </div>
</div>
</div>            
@endsection