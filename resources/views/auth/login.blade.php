@extends('frontend.main_master')
@section('content')
<x-guest-layout>
    <x-auth-card :mode="'login'">
       
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success">
                    Le lien de vérification a été renvoyé à votre adresse e-mail.
                </div>
        @endif
        @if ($errors->has('error'))
            <div class="alert alert-danger">
                {{ $errors->first('error') }}
            </div>

            
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('auth.email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('auth.password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('auth.remember') }}</span>
                </label>
            </div>
          


            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('auth.forgot') }}
                    </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('auth.login') }}
                </x-primary-button>
            </div>
        </form>
       
    </x-auth-card>
   
</x-guest-layout>

@endsection
