@props(['mode'])
<div class="flex flex-col items-center pt-5 sm:pt-0 bg-gray-100 pb-5">
    

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>

    @if ($mode == 'login')
    <div class="btn-center">
           <a href="/register">
                <x-primary-button class="ml-4">
                    {{ __('auth.register') }}
                </x-primary-button>
          </a>
      </div>
    @endif
    @if ($mode == 'connect')
    <div class="mt-5 text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" }">
                    {{ __('auth.alreadyregistered') }}
    </div>
     <div class="btn-center">
            <a href="{{ route('login') }}">
                    <x-primary-button class="ml-3">
                        {{ __('auth.login') }}
                    </x-primary-button>
            </a>
               

      </div>
    @endif
</div>
