@extends('frontend.main_master')
@section('content')
<x-guest-layout>
    <x-auth-card :mode="'connect'">
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        @if ($errors->has('reCAPTCHA'))
            <div class="alert alert-danger">
                {{ $errors->first('reCAPTCHA') }}
            </div>
       
        @endif
       
        <form method="POST" action="{{ route('register') }}" > 

            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('auth.name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('auth.email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Pays Selection -->
            <div class="mt-4">
                <x-input-label for="mypays_id" :value="__('auth.pays')" />
                <x-select-input id="mypays_id" name="mypays_id" required>
                    @foreach($pays as $pay)
                        <option value="{{ $pay->pays_id }}">{{ $pay->pays }}</option>
                    @endforeach
                </x-select-input>
                <x-input-error :messages="$errors->get('mypays_id')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('auth.password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('auth.confirm')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <input type="hidden" name="recaptcha_v3_token" id="recaptcha_v3_token">

            <div class="flex items-center justify-center mt-4">
               

                <x-primary-button class="ml-4">
                    {{ __('auth.register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
    
</x-guest-layout>
@endsection

@section('fincss')
<script src="https://www.google.com/recaptcha/api.js?render=6LfGlhgoAAAAAIy5hyp6rpWRdOZteIFQ5s9fm0VU"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6LfGlhgoAAAAAIy5hyp6rpWRdOZteIFQ5s9fm0VU', { action: 'register' }).then(function(token) {
            document.getElementById('recaptcha_v3_token').value = token;
        });
    });
</script>
@endsection
