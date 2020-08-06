<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Scripts -->
    <script src="{{ asset('js/manifest.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
@if (session('sucesso'))
    <body onload="M.toast({html:'{{session('sucesso')}}',classes:'sucesso'})">
@endif

@if (session('erro'))
    <body onload="M.toast({html:'{{session('erro')}}',classes:'erro'})">
@endif
    @stack('loader')
    <div id="app">
        @navbar
        <main class="py-3">
            @yield('content')
        </main>
    </div>
</body>
</html>
<!-- Antiga cor #6bbfa9-->