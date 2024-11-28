@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Edit Konten</h2>

    <form action="{{ route('contents.update', $content->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="EventName" class="block text-gray-700">Nama Event</label>
            <input type="text" name="EventName" id="EventName" 
                   value="{{ old('EventName', $content->EventName) }}" 
                   class="w-full p-2 border border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label for="Description" class="block text-gray-700">Deskripsi</label>
            <textarea name="Description" id="Description" 
                      class="w-full p-2 border border-gray-300 rounded" required>{{ old('Description', $content->Description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="PIC" class="block text-gray-700">PIC</label>
            <input type="text" name="PIC" id="PIC" 
                   value="{{ old('PIC', $content->PIC) }}" 
                   class="w-full p-2 border border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label for="Deadline" class="block text-gray-700">Deadline</label>
            <input type="date" name="Deadline" id="Deadline" 
                   value="{{ old('Deadline', $content->Deadline) }}" 
                   class="w-full p-2 border border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label for="Platform" class="block text-gray-700">Platform</label>
            <select name="Platform" id="Platform" class="w-full p-2 border border-gray-300 rounded" required>
                @foreach(App\Enums\PlatformEnum::cases() as $platform)
                    <option value="{{ $platform->value }}" 
                            @if(old('Platform', $content->Platform) === $platform->value) selected @endif>
                        {{ ucfirst($platform->value) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="Status" class="block text-gray-700">Status</label>
            <select name="Status" id="Status" class="w-full p-2 border border-gray-300 rounded" required>
                @foreach(App\Enums\StatusEnum::cases() as $status)
                    <option value="{{ $status->value }}" 
                            @if(old('Status', $content->Status) === $status->value) selected @endif>
                        {{ ucfirst($status->value) }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Simpan Perubahan</button>
    </form>
@endsection
