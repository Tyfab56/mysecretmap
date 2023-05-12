@extends('frontend.main_master')
@section('content')
<section class="content">
    <div class="container">
      <div class="row">
          <div class="col-lg-6">
            <h3 class="column-title">{{ __('about.equipe') }}</h3>
  
            <div id="testimonial-slide" class="testimonial-slide">
                <div class="item">
                  <div class="quote-item">
                      <span class="quote-text">
                      {{ __('about.fabriceh') }}</span>
                      <div class="quote-item-footer">
                        <img loading="lazy" class="testimonial-thumb" src="/frontend/assets/images/team/fab1.jpg" alt="Fabrice H">
                        <div class="quote-item-info">
                            <h3 class="quote-author">Fabrice H</h3>
                            <span class="quote-subtext">Fondateur MSM</span>
                        </div>
                      </div>
                  </div><!-- Quote item end -->
                </div>
                <!--/ Item 1 end -->
  
                <div class="item">
                  <div class="quote-item">
                      <span class="quote-text">
                        Nous avons imaginé My Secret map comme un outil au service des photographes, pour decouvrir des spots photos remarquables et partager de la connaissance. Nous avons encore de nombreux developpements qui viendront enrichir cette plateforme. N'hesitez pas à rejoindre notre équipe de photographes partenaires pour faire vivre cet outil.
                      </span>
  
                      <div class="quote-item-footer">
                        <img loading="lazy" class="testimonial-thumb" src="/frontend/assets/images/team/helen1.jpg" alt="Helen">
                        <div class="quote-item-info">
                            <h3 class="quote-author">Helen Stourk</h3>
                            <span class="quote-subtext">Webmaster</span>
                        </div>
                      </div>
                  </div><!-- Quote item end -->
                </div>
                <!--/ Item 2 end -->
  
                <div class="item">
                  <div class="quote-item">
                      <span class="quote-text">
                       
                      </span>
  
                      <div class="quote-item-footer">
                        <img loading="lazy" class="testimonial-thumb" src="images/clients/testimonial3.png" alt="testimonial">
                        <div class="quote-item-info">
                            <h3 class="quote-author">Minter Puchan</h3>
                            <span class="quote-subtext">Director, AKT</span>
                        </div>
                      </div>
                  </div><!-- Quote item end -->
                </div>
                <!--/ Item 3 end -->
  
            </div>
            <!--/ Testimonial carousel end-->
          </div><!-- Col end -->
  
          <div class="col-lg-6 mt-5 mt-lg-0">
  
            <h3 class="column-title">NOS PROJETS</h3>
  
            <div class="row all-clients">
                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <p class="info-box-subtitle">Carte des spots photos</p>
                    <span class="quote-subtext green">En ligne</span>
                    
                  </figure>
                </div><!-- Client 1 end -->
                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <p class="info-box-subtitle">AudioGuide</p>
                    <span class="quote-subtext green">En ligne</span>
                    
                  </figure>
                </div><!-- Client 1 end -->
  
                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <p class="info-box-subtitle">Genérateur de circuits</p>
                    <span class="quote-subtext orange">En développement</span>
                  </figure>
                </div><!-- Client 2 end -->
  
                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <p class="info-box-subtitle">Réglementation Drone</p>
                    <span class="quote-subtext orange">En développement</span>
                  </figure>
                </div><!-- Client 3 end -->
  
                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <p class="info-box-subtitle">Carte Infos Tourisme</p>
                    <span class="quote-subtext red">En projet</span>
                  </figure>
                </div><!-- Client 4 end -->
  
                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <p class="info-box-subtitle">Vente de médias</p>
                    <span class="quote-subtext red">En projet</span>
                  </figure>
                </div><!-- Client 5 end -->
  
                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <p class="info-box-subtitle">Boutique Produits dérivés</p>
                    <span class="quote-subtext red">En projet</span>
                  </figure>
                </div><!-- Client 6 end -->
                <div class="col-sm-4 col-6">
                    <figure class="clients-logo">
                      <p class="info-box-subtitle">Réseau social photographes</p>
                      <span class="quote-subtext red">En projet</span>
                    </figure>
                  </div><!-- Client 6 end -->
  
            </div><!-- Clients row end -->
  
          </div><!-- Col end -->
  
      </div>
      <!--/ Content row end -->
    </div>
    <!--/ Container end -->
  </section><!-- Content end -->

@endsection