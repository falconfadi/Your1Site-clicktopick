<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>

    <div class="text-center">
        <img class="mb-4" src="{{ asset('custom/logo-icon.png') }}" alt="" width="30%" loading="lazy">
        
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form class="form-signin border border-3 rounded" method="POST" action="{{ route('login') }}">

            
            <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>
            <x-label for="email" :value="__('Email')" class="sr-only"/>

            <x-input id="email" class="form-control my-2" type="email" name="email" 
            :value="old('email')" placeholder="Email address" required autofocus/>

            <x-label for="password" class="sr-only" :value="__('Password')"/>

            <x-input id="password" class="form-control my-2" 
                    type="password" name="password"  
                    autocomplete="current-password"
                    placeholder="Password" required/>
            <div class="checkbox mb-3">
                {{-- <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label> --}}
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
            <x-button class="btn btn-lg btn-dark btn-block btn-sm" type="submit">Sign in</x-button>
        </form>
    </div>
</x-guest-layout>
