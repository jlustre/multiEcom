<x-guest-layout>
    <x-auth-card>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4 text-center">
            {{ __('Seller Registration') }}
        </h2>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('seller.create') }}">
            @csrf
            @if (Session::get('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::get('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Display Name')" />

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

            <!-- Phone -->
            <div class="mt-4">
                <x-label for="phone" :value="__('Phone')" />
                <x-input id="phone" class="block mt-1 w-full" 
                    type="text" 
                    name="phone" 
                    value="{{ old('email') }}" 
                />
                <small class="text-danger">@error('phone') {{ $message }} @enderror </small>
            </div>

            <!-- Role ID -->
            <div class="mt-4">
                <x-label for="role_id" :value="__('Role')" />
                <x-input id="role_id" class="block mt-1 w-full" 
                    type="text" 
                    name="role_id" 
                    value="{{ old('role_id') }}" 
                />
                <small class="text-danger">@error('role_id') {{ $message }} @enderror </small>
            </div>

            <!-- Role ID -->
            <div class="mt-4">
                <x-label for="company_id" :value="__('Company')" />
                <x-input id="company_id" class="block mt-1 w-full" 
                    type="text" 
                    name="company_id" 
                    value="{{ old('company_id') }}" 
                />
                <small class="text-danger">@error('company_id') {{ $message }} @enderror </small>
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
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('seller.login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register As A Seller') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
