@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Pendaftaran Event</h2>

    <form action="{{ route('registrations.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nama</label>
            <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label for="business_name" class="block text-gray-700">Nama Bisnis</label>
            <input type="text" name="business_name" id="business_name" class="w-full p-2 border border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label for="business_location" class="block text-gray-700">Lokasi Bisnis</label>
            <input type="text" name="business_location" id="business_location" class="w-full p-2 border border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label for="phone_number" class="block text-gray-700">Nomor Telepon</label>
            <input type="text" name="phone_number" id="phone_number" class="w-full p-2 border border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label for="event_info_source" class="block text-gray-700">Sumber Informasi Event</label>
            <select name="event_info_source" id="event_info_source" class="w-full p-2 border border-gray-300 rounded" required>
                @foreach ($eventInfoSources as $value => $label)
                    <option value="{{ $value }}">{{ $label }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Daftar</button>
    </form>
@endsection
