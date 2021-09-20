<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 left-0 px-6 py-3 bg-gray-800 sm:block">
                    <p class="text-xl float-left mt-0 text-gray-300 font-bold">simple-shop</p>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm pt-1 text-gray-100 dark:text-gray-500 underline float-right">Dashboard</a>
                    @else
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 pt-1 text-sm text-gray-100 dark:text-gray-500 underline float-right">Register</a>
                        @endif
                        <a href="{{ route('login') }}" class="text-sm pt-1 text-gray-100 dark:text-gray-500 underline float-right">Log in</a>
                    @endauth
                </div>
            @endif

        <div class="font-sans text-gray-900 antialiased pt-10">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
