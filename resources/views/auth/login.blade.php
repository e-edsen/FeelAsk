<x-guest-layout>
    <x-auth-card>
        <div class="flex flex-row">
            <div>
                {{-- <img src="/images/feelask-logo.png" alt="logo" class="h-20"> --}}
                {{-- <img src="/images/logo.png" alt="logo" class="w-20 h-20"> --}}
            </div>

            <div>

                <x-slot name="logo">
                    {{-- <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a> --}}
                    <img src="/images/feelask-logo.png" alt="logo" class="h-20">
                </x-slot>
                <div class="mb-12">
                    {{-- <img src="/images/feelask-logo.png" alt="logo" class="h-20"> --}}
                    <h1 class="text-4xl font-extrabold text-blue-500">Welcome Back!👋</h1>
                    <h1 class="text-lg font-medium text-blue-500">Please enter your email and password to login.</h1>

                    {{-- <img src="/images/logo.png" alt="logo" class="w-32"> --}}
                </div>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me?') }}</span>
                        </label>
                    </div>

                    <div class="flex flex-col">
                        <button class="btn btn-primary border-none bg-orange-400 hover:bg-orange-500 my-2">
                            {{ __('Log in') }}
                        </button>
                        <div class="flex items-center justify-center mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>

                    </div>
                </form>
                <div class="mt-5">
                    <h1>Don't have an account?
                    <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700">Sign Up</a>
                    </h1>
                </div>
                    </div>
                </div>
    </x-auth-card>
</x-guest-layout>
