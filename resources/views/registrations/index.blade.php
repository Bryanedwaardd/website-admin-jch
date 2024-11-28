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
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
            <a href="{{ url('home') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
        </li>
        <li>
            <a href="{{ route('events.index') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Events</a>
        </li>
        <li>
            <a href="{{ route('contents.index') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contents</a>
        </li>
        <li>
            <a href="{{ route('registrations.index') }}" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500">Registrations</a>
        </li>
        <li>
            <a href="{{route('logout')}}" 
            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
        </ul>
    </div>
    </div>
</nav>

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 rounded-lg">
            <p class="font-bold">Total Registrations</p>
            <p>{{ $registrations->count() }} Registrations</p>
        </div>
    </div>

    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Daftar Registrasi</h2>
    <a href="{{ route('registrations.create') }}" class="btn bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Buat Registrasi</a>

    @if(session('message'))
        <div class="alert alert-success bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Name</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Business Name</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Business Location</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Phone Number</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Event Info Source</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registrations as $registration)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $registration->name }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $registration->business_name }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $registration->business_location }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $registration->phone_number }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">
                            @php
                                // Access the label from the EventInfoSourceEnum
                                $eventInfoSourceLabel = App\Enums\EventInfoSourceEnum::labels()[$registration->event_info_source] ?? 'Unknown';
                            @endphp
                            {{ $eventInfoSourceLabel }}
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-800">
                            <!-- Edit Button -->
                            <a href="{{ route('registrations.edit', $registration->id) }}" class="text-yellow-500 hover:text-yellow-700">Edit</a>

                            <!-- Delete Form -->
                            <form action="{{ route('registrations.destroy', $registration->id) }}" method="POST" class="inline-block ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Anda yakin ingin menghapus registrasi ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
