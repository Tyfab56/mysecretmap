@extends('frontend.main_master')
@section('content')
<section id="ts-features" class="ts-features">
    <div class="container">
      <div class="row mt-5">
          <div class="col-lg-6">
            <div class="ts-intro">
                <h3 class="into-sub-title">{{ __('photo.Become') }}</h3>
                <p>{{ __('photo.Intro') }}</p>
            </div><!-- Intro box end -->
  
            <div class="gap-20"></div>
  
            <div class="row">
                <div class="col-md-6 mt-2">
                  <div class="ts-service-box">
                      <span class="ts-service-icon">
                        <i class="fas fa-trophy"></i>
                      </span>
                      <div class="ts-service-box-content">
                        <h3 class="service-box-title">{{ __('photo.Arg1') }}</h3>
                      </div>
                  </div><!-- Service 1 end -->
                </div><!-- col end -->
  
                <div class="col-md-6 mt-2">
                  <div class="ts-service-box">
                      <span class="ts-service-icon">
                        <i class="fas fa-sliders-h"></i>
                      </span>
                      <div class="ts-service-box-content">
                        <h3 class="service-box-title">{{ __('photo.Arg2') }}</h3>
                      </div>
                  </div><!-- Service 2 end -->
                </div><!-- col end -->
            </div><!-- Content row 1 end -->
  
            <div class="row">
                <div class="col-md-6 mt-2">
                  <div class="ts-service-box">
                      <span class="ts-service-icon">
                        <i class="fas fa-thumbs-up"></i>
                      </span>
                      <div class="ts-service-box-content">
                        <h3 class="service-box-title">{{ __('photo.Arg3') }}</h3>
                      </div>
                  </div><!-- Service 1 end -->
                </div><!-- col end -->
  
                <div class="col-md-6 mt-2">
                  <div class="ts-service-box">
                      <span class="ts-service-icon">
                        <i class="fas fa-users"></i>
                      </span>
                      <div class="ts-service-box-content">
                        <h3 class="service-box-title">{{ __('photo.Arg4') }}</h3>
                      </div>
                  </div><!-- Service 2 end -->
                </div><!-- col end -->
                <div class="col-md-12 mt-2">
                <div class="card-wrapper photo-greybox mt-2">
                    <div class="card-box align-left">
                    </b><h3 class="into-sub-title">{{ __('photo.CommentTitre') }}</h3>
                        <p>
                        <b> {{ __('photo.CommentDesc') }}</b></p>
                       
                    </div>
          </div>
                </div>
            </div><!-- Content row 1 end -->
          </div><!-- Col end -->
  
          <div class="col-lg-6 mt-4 mt-lg-0">
            <h3 class="into-sub-title">{{ __('photo.Titre2') }}</h3>
            <p>{{ __('photo.SousTitre2') }}</p>
  
            <div class="accordion accordion-group" id="our-values-accordion">
                <div class="card">
                  <div class="card-header p-0 bg-transparent" id="headingOne">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        {{ __('photo.AscTitre1') }}
                        </button>
                      </h2>
                  </div>
                
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#our-values-accordion">
                      <div class="card-body">
                      {{ __('photo.AscDesc1') }}
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header p-0 bg-transparent" id="headingTwo">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        {{ __('photo.AscTitre2') }}
                        </button>
                      </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#our-values-accordion">
                      <div class="card-body">
                      {{ __('photo.AscDesc2') }}</div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header p-0 bg-transparent" id="headingThree">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        {{ __('photo.AscTitre3') }}
                        </button>
                      </h2>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#our-values-accordion">
                      <div class="card-body">
                      {{ __('photo.AscDesc3') }} </div>
                  </div>
                </div>
            </div>
          </div>
      </div>
      <div class="row justify-content-center mt-5">
     
            
            <div class="col-md-4">
                <div class="photo-item mbr-flex">
                    <div class="photo-icon-box">
                    <i class="fa-solid fa-1 photo-iconfont"></i>
                    </div>
                    <div class="text-box">
                        <h4>
                            <strong>{{ __('photo.Step1Title') }}</strong>
                        </h4>
                        <p>{{ __('photo.Step1Desc') }}</p>
                    </div>
                </div>
      </div>
      <div class="col-md-4">
      <div class="photo-item mbr-flex">
                    <div class="photo-icon-box">
                    <i class="fa-solid fa-2 photo-iconfont"></i>
                    </div>
                    <div class="text-box">
                        <h4>
                            <strong>{{ __('photo.Step2Title') }}</strong>
                        </h4>
                        <p>{{ __('photo.Step2Desc') }}</p>
                    </div>
                </div>
                
      </div>
      <div class="col-md-4">
      <div class="photo-item mbr-flex">
                    <div class="photo-icon-box">
                    <i class="fa-solid fa-3 photo-iconfont"></i>
                    </div>
                    <div class="text-box">  
                        <h4>
                            <strong>{{ __('photo.Step3Title') }}</strong>
                        </h4>
                        <p>{{ __('photo.Step3Desc') }}</p>
                    </div>
                </div>
            
      
            </div>
      </div>

      <div>
        <div class="btn-center">
           <a class="btn btn-primary display-4" href="/login">Inscription / Connection</a>
           </div>
      </div>
    </div>

</section> 

@endsection