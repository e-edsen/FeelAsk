<!DOCTYPE html>
<html data-theme="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FeelAsk</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="flex flex-col">
        {{-- Navbar --}}
        <div class="flex flex-row">
            <img src="{{ asset('images/feelask-logo.png') }}" alt="logo" class="w-20 h-20">
        </div>

        {{-- Hero --}}
        {{-- Say --}}
        {{-- Footer --}}
        </div>
    </body>
</html>
