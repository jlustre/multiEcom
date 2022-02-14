<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('user.create') }}">
            @csrf
            @if (Session::get('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::get('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" 
                    type="text" 
                    name="name" 
                    value="{{ old('name') }}" 
                    autofocus 
                />
                 <small class="text-danger">@error('name') {{ $message }} @enderror </small>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                />
                <small class="text-danger">@error('email') {{ $message }} @enderror </small>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                autocomplete="new-password" />
                <small class="text-danger">@error('password') {{ $message }} @enderror </small>
            </div> 

            <!-- Confirm Password --> 
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" />
                <small class="text-danger">@error('password_confirmation') {{ $message }} @enderror </small>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('user.login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
