@extends('layouts.app')

<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('image/logo_jch.png') }}" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Jakarta Creative Hub</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default"></div>
    </div>
</nav>

<!-- Main Welcome Section -->
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded shadow-lg w-full max-w-lg">
        <h2 class="text-3xl font-semibold text-gray-800 text-center mb-6">Welcome to {{ config('app.name', 'Laravel') }}</h2>
        
        <!-- Added Image -->
        <div class="mb-6 text-center">
            <img src="{{ asset('image/jch.jpg') }}" alt="Jakarta Creative Hub" class="w-full rounded-lg shadow-md">
        </div>

        @if (Route::has('login'))
            <div class="mb-4">
                <a href="{{ route('login') }}" class="w-full text-center bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600">
                    {{ __('Login') }}
                </a>
            </div>
        @endif

        <br>

        @if (Route::has('register'))
            <div>
                <a href="{{ route('register') }}" class="w-full text-center bg-green-500 text-white px-6 py-3 rounded hover:bg-green-600">
                    {{ __('Register') }}
                </a>
            </div>
        @endif
    </div>
</div>
