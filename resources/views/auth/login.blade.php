<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            @php
                $info = DB::table('business_settings')->first();
            @endphp
            <img class="shadow rounded" src="{{asset(optional($info)->logo)}}" alt="" width="260px">
        </x-slot>

        <x-jet-validation-errors class="mb-6" />

        @if (session('status'))
            <div class="mb-12 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        {{--
<h1 style="color:white;background-color:red;padding:100px 15px;font-size:25px;text-align:center">টেকনিক্যাল সমস্যার কারণে এই সফটওয়্যারটি বন্ধ আছে <br>
অনুগ্রহঃ করে কল করুন : <br>01703-235615</h1>
--}}
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
