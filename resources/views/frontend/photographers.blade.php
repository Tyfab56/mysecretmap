@extends('frontend.main_master')
@section('content')



<style>
  .card-centered {
    max-width: 800px;
    margin: 0 auto;
  }
</style>


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
    <div class="card card-centered shadow-sm p-4 mb-4">
      <div class="row">
        <div class="col-12 col-lg-12 text-left">
          <h2><i class="fas fa-eye"></i> {{ __('photo.visibility_title') }}</h2>
          <ul>
            <li>{{ __('photo.visibility_1') }}</li>
            <li>{{ __('photo.visibility_2') }}</li>
            <li>{{ __('photo.visibility_3') }}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section Revenus -->
<section style="background-color: #f7f7f7;">
  <div class="container py-4">
    <div class="card card-centered shadow-sm p-4 mb-4">
      <div class="row">
        <div class="col-12 col-lg-12 text-left">
          <h2><i class="fas fa-dollar-sign"></i> {{ __('photo.revenue_title') }}</h2>
          <ul>
            <li>{{ __('photo.revenue_1') }}</li>
            <li>{{ __('photo.revenue_2') }}</li>
            <li>{{ __('photo.revenue_3') }}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section Opportunité -->
<section style="background-color: #f0f0f0;">
  <div class="container py-4">
    <div class="card card-centered shadow-sm p-4 mb-4">
      <div class="row">
        <div class="col-12 col-lg-12 text-left">
          <h2><i class="fas fa-briefcase"></i> {{ __('photo.opportunity_title') }}</h2>
          <ul>
            <li>{{ __('photo.opportunity_1') }}</li>
            <li>{{ __('photo.opportunity_2') }}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section Agence -->
<section style="background-color: #f7f7f7;">
  <div class="container py-4">
    <div class="card card-centered shadow-sm p-4 mb-4">
      <div class="row">
        <div class="col-12 col-lg-12 text-left">
          <h2><i class="fas fa-building"></i> {{ __('photo.agence_title') }}</h2>
          <ul>
            <li>{{ __('photo.agence_1') }}</li>
            <li>{{ __('photo.agence_2') }}</li>
            <li>{{ __('photo.agence_3') }}</li>
            <li>{{ __('photo.agence_4') }}</li>
            <li>{{ __('photo.agence_5') }}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section Contribution -->
<section style="background-color: #f0f0f0;">
  <div class="container py-4">
    <div class="card card-centered shadow-sm p-4 mb-4">
      <div class="row">
        <div class="col-12 col-lg-12 text-left">
          <h2><i class="fas fa-camera"></i> {{ __('photo.contribution_title') }}</h2>
          <ul>
            <li>{{ __('photo.contribution_1') }}</li>
            <li>{{ __('photo.contribution_2') }}</li>
            <li>{{ __('photo.contribution_3') }}</li>
            <li>{{ __('photo.contribution_4') }}</li>
            <li>{{ __('photo.contribution_5') }}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section Traducteur -->
<section style="background-color: #f7f7f7;">
  <div class="container py-4">
    <div class="card card-centered shadow-sm p-4 mb-4">
      <div class="row">
        <div class="col-12 col-lg-12 text-left">
          <h2><i class="fas fa-language"></i> {{ __('photo.translator_title') }}</h2>
          <p>{{ __('photo.translator_desc') }}</p>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection