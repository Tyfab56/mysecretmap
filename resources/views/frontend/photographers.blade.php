@extends('frontend.main_master')
@section('content')
<section>
  <div class="container py-5 my-5">
    <div class="row align-items-center py-5">
      <div class="col-12 col-lg-12 text-left">
        <h1>{{ __('photo.title') }}</h1>
        <p class="lead">{{ __('photo.intro') }}</p>
      </div>

      <div class="col-12 col-lg-6 text-left">
        <h2>{{ __('photo.visibility_title') }}</h2>
        <ul>
          <li>{{ __('photo.visibility_1') }}</li>
          <li>{{ __('photo.visibility_2') }}</li>
          <li>{{ __('photo.visibility_3') }}</li>
        </ul>
      </div>

      <div class="col-12 col-lg-6 text-left">
        <h2>{{ __('photo.revenue_title') }}</h2>
        <ul>
          <li>{{ __('photo.revenue_1') }}</li>
          <li>{{ __('photo.revenue_2') }}</li>
          <li>{{ __('photo.revenue_3') }}</li>
        </ul>
      </div>

      <div class="col-12 col-lg-6 text-left">
        <h2>{{ __('photo.opportunity_title') }}</h2>
        <ul>
          <li>{{ __('photo.opportunity_1') }}</li>
          <li>{{ __('photo.opportunity_2') }}</li>
        </ul>
      </div>

      <div class="col-12 col-lg-6 text-left">
        <h2>{{ __('photo.contribution_title') }}</h2>
        <ul>
          <li>{{ __('photo.contribution_1') }}</li>
          <li>{{ __('photo.contribution_2') }}</li>
          <li>{{ __('photo.contribution_3') }}</li>
          <li>{{ __('photo.contribution_4') }}</li>
          <li>{{ __('photo.contribution_5') }}</li>
        </ul>
      </div>

      <div class="col-12 col-lg-6 text-left">
        <h2>{{ __('photo.translator_title') }}</h2>
        <p>{{ __('photo.translator_desc') }}</p>
      </div>
    </div>
  </div>
</section>


@endsection