@extends('frontend.main_master')
@section('content')


<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-3" ></div>
            <div class="col-md-6" >
              <h3 class="column-title">IDENTIFICATION</h3>
              <!-- contact form works with formspree.io  -->
              <!-- contact form activation doc: https://docs.themefisher.com/constra/contact-form/ -->
              <form method="POST" action="{{ route('login') }}>
                @csrf
                <div class="error-container"></div>
                   
                    <div class="col-md-12">
                        <div class="form-group">
                        <label>Email</label>
                        <input class="form-control form-control-email" name="email" id="email" placeholder="" type="email"
                            required>
                        </div>
                    </div>
             
                    <div class="col-md-12">
                        <div class="form-group">
                        <label>Mot de passe</label>
                        <input class="form-control form-control-subject" name="password" id="password" placeholder="" required>
                        </div>
                    </div>
                
               
                <div class="text-center"><br>
                  <button class="btn btn-primary solid blank" type="submit">CONNEXION</button>
                </div>

              </form>
            </div>
      
          </div><!-- Content row -->
        </div><!-- Conatiner end -->
      </section><!-- Main container end -->        
@endsection