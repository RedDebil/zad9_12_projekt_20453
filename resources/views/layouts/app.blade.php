<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <!-- Przyciski do zmiany kontrastu -->
        <button id="contrast-toggle" class="bg-gray-500 text-white px-4 py-2 rounded-md fixed top-4 right-4 z-50">
            Zmień kontrast
        </button>

        <div class="min-h-screen bg-gray-100" id="main-body">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script>
            // Funkcja do przełączania kontrastu
            const contrastToggleButton = document.getElementById('contrast-toggle');
            const body = document.body;

            // Funkcja zmieniająca tryb kontrastu
            contrastToggleButton.addEventListener('click', function () {
                body.classList.toggle('high-contrast');
                localStorage.setItem('high-contrast', body.classList.contains('high-contrast'));
            });

            // Zapamiętanie ustawienia kontrastu
            if (localStorage.getItem('high-contrast') === 'true') {
                body.classList.add('high-contrast');
            }
        </script>
    </body>
</html>
