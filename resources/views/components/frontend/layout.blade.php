<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('assets/svgs/logo-mark.svg') }}" type="image/x-icon">

        <title>@yield('title') | {{ config('app.name', 'Tickety') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/frontend.css'])

        <!-- Styles -->
        @livewireStyles

        @stack('css')
    </head>
    <body>

        <x-frontend.navbar/>

        {{ $slot }}

        @livewireScripts

        <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        @stack('js')
    </body>
</html>
