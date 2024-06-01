@extends('frontend.main_master')

@section('content')
<div class="container mt-3 mb-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg mt-5">

                <div class="card-body">
                    @if ($errors->has('reCAPTCHA'))
                    <div class="alert alert-danger">
                        {{ $errors->first('reCAPTCHA') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">{{ __('auth.name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label for="email">{{ __('auth.email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label for="mypays_id">{{ __('auth.pays') }}</label>
                            <select id="mypays_id" class="form-control @error('mypays_id') is-invalid @enderror" name="mypays_id" required>
                                @foreach($pays as $pay)
                                <option value="{{ $pay->pays_id }}">{{ $pay->pays }}</option>
                                @endforeach
                            </select>
                            @error('mypays_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label for="password">{{ __('auth.password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label for="password_confirmation">{{ __('auth.confirm') }}</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <input type="hidden" name="recaptcha_v3_token" id="recaptcha_v3_token">

                        <div class="form-group d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('auth.register') }}
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('login') }}">{{ __('auth.alreadyregistered') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('fincss')
<script src="https://www.google.com/recaptcha/api.js?render=6LfGlhgoAAAAAIy5hyp6rpWRdOZteIFQ5s9fm0VU"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6LfGlhgoAAAAAIy5hyp6rpWRdOZteIFQ5s9fm0VU', {
            action: 'register'
        }).then(function(token) {
            document.getElementById('recaptcha_v3_token').value = token;
        });
    });
</script>
@endsection