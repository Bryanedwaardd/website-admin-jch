<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Link Tailwind CSS melalui Vite -->
    @vite('resources/css/app.css')  <!-- Menggunakan Vite jika Anda menggunakan Laravel 9.x dan seterusnya -->
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-5 p-5">

        <!-- Bagian konten utama -->
        <main class="mt-8">
            @yield('content')
        </main>

        <!-- Bagian footer -->
        <footer class="mt-12 text-center text-gray-600">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </footer>
    </div>

    <!-- JavaScript (Opsional jika ada) -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleButton = document.querySelector('[data-collapse-toggle="navbar-default"]');
            const navbarMenu = document.getElementById('navbar-default');
            
            // Event listener untuk mengatur toggle menu
            toggleButton.addEventListener('click', function () {
                navbarMenu.classList.toggle('hidden');
            });
        });
    </script>
</body>
</html>
