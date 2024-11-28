@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-semibold text-gray-800 text-center mb-6">{{ __('Register') }}</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name Field -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700">{{ __('Name') }}</label>
                <input id="name" type="text" class="form-input mt-1 block w-full border border-gray-300 rounded-md @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Address Field -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-input mt-1 block w-full border border-gray-300 rounded-md @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-input mt-1 block w-full border border-gray-300 rounded-md @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password Field -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" type="password" class="form-input mt-1 block w-full border border-gray-300 rounded-md" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    {{ __('Register') }}
                </button>

                <div>
                    <a class="text-sm text-gray-600 hover:text-gray-800" href="{{ route('login') }}">
                        {{ __('Already have an account? Login') }}
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
