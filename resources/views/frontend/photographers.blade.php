@extends('frontend.main_master')
@section('content')

<head>
  <!-- Lien vers Font Awesome pour les icônes -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<!-- Section Titre principal -->
<section style="background-color: #f7f7f7;">
  <div class="container py-4 my-4">
    <div class="row align-items-center py-3">
      <div class="col-12 col-lg-12 text-left">
        <h1>{{ __('photo.title') }}</h1>
        <p class="lead">{{ __('photo.intro') }}</p>
      </div>
    </div>
  </div>
</section>

<!-- Section Visibilité -->
<section style="background-color: #f0f0f0;">
  <div class="container py-4">
    <div class="card shadow-sm p-4 mb-4">
      <div class="row">
        <div class="col-12 col-lg-6 text-left">
          <h2><i class="fas fa-eye"></i> {{ __('photo.visibility_title') }}</h2>
          <ul>
            <li><i class="fas fa-bullhorn"></i> {{ __('photo.visibility_1') }}</li>
            <li><i class="fas fa-link"></i> {{ __('photo.visibility_2') }}</li>
            <li><i class="fas fa-globe"></i> {{ __('photo.visibility_3') }}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section Revenus -->
<section style="background-color: #f7f7f7;">
  <div class="container py-4">
    <div class="card shadow-sm p-4 mb-4">
      <div class="row">
        <div class="col-12 col-lg-6 text-left">
          <h2><i class="fas fa-dollar-sign"></i> {{ __('photo.revenue_title') }}</h2>
          <ul>
            <li><i class="fas fa-chart-line"></i> {{ __('photo.revenue_1') }}</li>
            <li><i class="fas fa-file-invoice-dollar"></i> {{ __('photo.revenue_2') }}</li>
            <li><i class="fas fa-hand-holding-usd"></i> {{ __('photo.revenue_3') }}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section Opportunité -->
<section style="background-color: #f0f0f0;">
  <div class="container py-4">
    <div class="card shadow-sm p-4 mb-4">
      <div class="row">
        <div class="col-12 col-lg-6 text-left">
          <h2><i class="fas fa-briefcase"></i> {{ __('photo.opportunity_title') }}</h2>
          <ul>
            <li><i class="fas fa-expand"></i> {{ __('photo.opportunity_1') }}</li>
            <li><i class="fas fa-handshake"></i> {{ __('photo.opportunity_2') }}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section Agence -->
<section style="background-color: #f7f7f7;">
  <div class="container py-4">
    <div class="card shadow-sm p-4 mb-4">
      <div class="row">
        <div class="col-12 col-lg-12 text-left">
          <h2><i class="fas fa-building"></i> {{ __('photo.agence_title') }}</h2>
          <ul>
            <li><i class="fas fa-cogs"></i> {{ __('photo.agence_1') }}</li>
            <li><i class="fas fa-globe"></i> {{ __('photo.agence_2') }}</li>
            <li><i class="fas fa-bullhorn"></i> {{ __('photo.agence_3') }}</li>
            <li><i class="fas fa-plane"></i> {{ __('photo.agence_4') }}</li>
            <li><i class="fas fa-award"></i> {{ __('photo.agence_5') }}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section Contribution -->
<section style="background-color: #f0f0f0;">
  <div class="container py-4">
    <div class="card shadow-sm p-4 mb-4">
      <div class="row">
        <div class="col-12 col-lg-6 text-left">
          <h2><i class="fas fa-camera"></i> {{ __('photo.contribution_title') }}</h2>
          <ul>
            <li><i class="fas fa-photo-video"></i> {{ __('photo.contribution_1') }}</li>
            <li><i class="fas fa-video"></i> {{ __('photo.contribution_2') }}</li>
            <li><i class="fas fa-vr-cardboard"></i> {{ __('photo.contribution_3') }}</li>
            <li><i class="fas fa-file-alt"></i> {{ __('photo.contribution_4') }}</li>
            <li><i class="fas fa-map-marker-alt"></i> {{ __('photo.contribution_5') }}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section Traducteur -->
<section style="background-color: #f7f7f7;">
  <div class="container py-4">
    <div class="card shadow-sm p-4 mb-4">
      <div class="row">
        <div class="col-12 col-lg-6 text-left">
          <h2><i class="fas fa-language"></i> {{ __('photo.translator_title') }}</h2>
          <p>{{ __('photo.translator_desc') }}</p>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection