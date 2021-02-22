<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <a href="{{ config('app.url') }}" referrerpolicy="origin">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <div id="app">
        <nav class="flex justify-between p-2 ">
            <a href="#">
                {{ config('app.name', "GABAY") }}
            </a>
            <div class="flex ">
                @guest('admin')
                <a href="{{ route('login') }}" class="mx-2">Login</a>
                <a href="{{ route('register') }}" class="mx-2">Register</a>
                @endguest
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @auth('admin')
        @livewire('admin-bottom-nav');
    @endauth
    @livewireScripts
</body>
</html>
