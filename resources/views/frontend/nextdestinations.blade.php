@extends('frontend.main_master')
@section('content')
<div class="row">
            <div class="col-lg-5 mx-auto">

                <!-- CHECKBOX LIST -->
                <div class="card rounded border-0 shadow-sm position-relative">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-center mb-4 pb-4 border-bottom"><i class="far fa-calendar-alt fa-3x"></i>
                            <div class="ms-3">
                                <h4 class="text-uppercase fw-weight-bold mb-0">Nos prochaines Destinations</h4>
                                <p class="text-gray fst-italic mb-0">Suivez notre actualité sur Instagram</p>
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="flexCheck1" type="checkbox" checked>
                            <label class="form-check-label" for="flexCheck1"><span class="fst-italic pl-1">Islande</span></label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="flexChec2" type="checkbox">
                            <label class="form-check-label" for="flexChec2"><span class="fst-italic pl-1">La Réunion - Mars 2023</span></label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="flexCheck3" type="checkbox">
                            <label class="form-check-label" for="flexCheck3"><span class="fst-italic pl-1">Begin QA for the product</span></label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="flexCheck4" type="checkbox">
                            <label class="form-check-label" for="flexCheck4"><span class="fst-italic pl-1">Go for a long walk</span></label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="flexCheck5" type="checkbox">
                            <label class="form-check-label" for="flexCheck5"><span class="fst-italic pl-1">Pay for the new shoppings</span></label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="flexCheck6" type="checkbox">
                            <label class="form-check-label" for="flexCheck6"><span class="fst-italic pl-1">Buy a new sweatshirt</span></label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="flexCheck7" type="checkbox">
                            <label class="form-check-label" for="flexCheck7"><span class="fst-italic pl-1">Go for a long walk</span></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection