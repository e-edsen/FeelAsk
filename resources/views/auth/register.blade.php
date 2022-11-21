<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="/images/feelask-logo.png" alt="logo" class="h-20">
            </a>

        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="mb-12">
            <h1 class="text-4xl font-extrabold text-blue-600">Create New Account.</h1>
            <h1 class="text-lg font-medium text-blue-600">Start for free with FeelAsk!</h1>
        </div>
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

            <div class="flex flex-col items-center justify-end mt-4">
                <button class="btn bg-orange-400 hover:bg-orange-500 border-none text-white w-full mb-5">
                    {{ __('Register') }}
                </button>
                <a class="underline text-sm text-gray-600 hover:text-gray-900 justify-start items-start mb-4" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
