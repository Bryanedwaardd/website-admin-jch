@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Edit Event</h2>

    <form action="{{ route('events.update', $event->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="EventName" class="block text-gray-700">Event Name</label>
            <input type="text" name="EventName" id="EventName" class="w-full p-2 border border-gray-300 rounded" value="{{ $event->EventName }}" required>
        </div>

        <div class="mb-4">
            <label for="Category" class="block text-gray-700">Category</label>
            <input type="text" name="Category" id="Category" class="w-full p-2 border border-gray-300 rounded" value="{{ $event->Category }}" required>
        </div>

        <div class="mb-4">
            <label for="Description" class="block text-gray-700">Description</label>
            <textarea name="Description" id="Description" class="w-full p-2 border border-gray-300 rounded" rows="3" required>{{ $event->Description }}</textarea>
        </div>

        <div class="mb-4">
            <label for="Date" class="block text-gray-700">Event Date</label>
            <input type="date" name="Date" id="Date" class="w-full p-2 border border-gray-300 rounded" value="{{ $event->Date }}" required>
        </div>

        <div class="mb-4">
            <label for="PIC" class="block text-gray-700">PIC</label>
            <input type="text" name="PIC" id="PIC" class="w-full p-2 border border-gray-300 rounded" value="{{ $event->PIC }}" required>
        </div>

        <div class="mb-4">
            <label for="CollaboratorName" class="block text-gray-700">Collaborator Name</label>
            <input type="text" name="CollaboratorName" id="CollaboratorName" class="w-full p-2 border border-gray-300 rounded" value="{{ $event->CollaboratorName }}" required>
        </div>

        <div class="mb-4">
            <label for="CollaboratorContact" class="block text-gray-700">Collaborator Contact</label>
            <input type="text" name="CollaboratorContact" id="CollaboratorContact" class="w-full p-2 border border-gray-300 rounded" value="{{ $event->CollaboratorContact }}" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Update Event</button>
    </form>
@endsection
