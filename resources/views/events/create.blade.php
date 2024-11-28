@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Buat Event Baru</h2>

    <form action="{{ route('events.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        <div class="mb-4">
            <label for="EventName" class="block text-gray-700">Nama Event</label>
            <input type="text" name="EventName" id="EventName" class="w-full p-2 border border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label for="Category" class="block text-gray-700">Kategori</label>
            <input type="text" name="Category" id="Category" class="w-full p-2 border border-gray-300 rounded">
        </div>

        <div class="mb-4">
            <label for="Description" class="block text-gray-700">Deskripsi</label>
            <textarea name="Description" id="Description" class="w-full p-2 border border-gray-300 rounded" required></textarea>
        </div>

        <div class="mb-4">
            <label for="Date" class="block text-gray-700">Tanggal</label>
            <input type="date" name="Date" id="Date" class="w-full p-2 border border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label for="PIC" class="block text-gray-700">PIC</label>
            <input type="text" name="PIC" id="PIC" class="w-full p-2 border border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label for="CollaboratorName" class="block text-gray-700">Nama Kolaborator</label>
            <input type="text" name="CollaboratorName" id="CollaboratorName" class="w-full p-2 border border-gray-300 rounded">
        </div>

        <div class="mb-4">
            <label for="CollaboratorContact" class="block text-gray-700">Kontak Kolaborator</label>
            <input type="text" name="CollaboratorContact" id="CollaboratorContact" class="w-full p-2 border border-gray-300 rounded">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Simpan</button>
    </form>
@endsection
