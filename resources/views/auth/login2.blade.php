@extends('frontend.main_master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header bg-primary text-white">
                    <h3 class="text-center font-weight-light my-4">{{ __('Login') }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="small mb-1">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control py-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="small mb-1">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control py-4 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                            @if (Route::has('password.request'))
                            <a class="small" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                            @endif
                            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    @if (Route::has('register'))
                    <div class="small">
                        <a href="{{ route('register') }}">{{ __("Don't have an account? Register") }}</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection