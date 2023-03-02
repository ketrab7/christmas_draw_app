<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Czas na prezenty!!!</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        @vite('resources/css/app.css')
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <!-- npm run dev -->
        <div class="flex flex-wrap h-screen bg-gray-100">
            <section class="relative mx-auto">
                
                {{-- Navbar w osobnym komponencie --}}
                <x-navbar/>
                
                <div>{{-- class="bg-[url('{{ asset('image/christmas.jpg') }}']" --}}
                    @yield('content')
                </div>

            </section>
        </div>

        <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
    </body>
</html>
