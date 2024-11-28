<!-- resources/views/events/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>{{ $event->name }}</h1>
    <p>{{ $event->description }}</p>

    <!-- Jika pengguna sudah mendaftar, jangan tampilkan tombol pendaftaran -->
    @auth
        @if ($event->registrations()->where('user_id', Auth::id())->exists())
            <p>Anda sudah terdaftar untuk event ini.</p>
        @else
            <!-- Pastikan URL mengirimkan parameter 'event' -->
            <form action="{{ route('events.register', $event) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Daftar untuk Event Ini</button>
            </form>
        @endif
    @endauth
@endsection
