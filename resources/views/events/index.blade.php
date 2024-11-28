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
            <a href="{{ route('events.index') }}" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Events</a>
        </li>
        <li>
            <a href="{{ route('contents.index') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contents</a>
        </li>
        <li>
            <a href="{{ route('registrations.index') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Registrations</a>
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
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Daftar Event</h2>
    <a href="{{ route('events.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-6 inline-block shadow-md hover:bg-blue-600">Buat Event Baru</a>
    
    @if(session('message'))
        <div class="bg-green-100 text-green-800 p-4 rounded-md mb-6 shadow-sm">
            {{ session('message') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($events as $event)
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $event->EventName }}</h3>
                <p class="text-gray-600 mb-2"><span class="font-semibold">Category:</span> {{ $event->Category }}</p>
                <p class="text-gray-600 mb-2"><span class="font-semibold">Description:</span> {{ $event->Description }}</p>
                <p class="text-gray-600 mb-2"><span class="font-semibold">Date:</span> {{ $event->Date }}</p>
                <p class="text-gray-600 mb-2"><span class="font-semibold">PIC:</span> {{ $event->PIC }}</p>
                <p class="text-gray-600 mb-2"><span class="font-semibold">Collaborator Name:</span> {{ $event->CollaboratorName }}</p>
                <p class="text-gray-600 mb-4"><span class="font-semibold">Collaborator Contact:</span> {{ $event->CollaboratorContact }}</p>
                <div class="flex space-x-4">
                    <a href="{{ route('events.edit', $event->id) }}" class="text-yellow-500 hover:text-yellow-700 font-semibold">Edit</a>
                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 font-semibold" onclick="return confirm('Yakin ingin menghapus event ini?')">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    {{-- @foreach($events as $event)
    <div class="bg-white p-4 rounded-lg shadow-md">
        <h4 class="font-semibold text-lg text-gray-800">{{ $event->EventName }}</h4>
        <p class="text-gray-600">{{ $event->Description }}</p>
        
      <a href="{{ route('admin.events.registrations', $event->id) }}" class="text-blue-500 hover:underline mt-2">View Registrations</a>
    </div>
@endforeach --}}
@endsection