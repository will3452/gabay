<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    <div id="app">
        <nav class="flex justify-between p-4 bg-gray-900 text-white text-2xl uppercase">
            <a href="#">
                {{ config('app.name', "GABAY") }}
            </a>
            <div class="flex ">
                @guest
                <a href="{{ route('login') }}" class="mx-2">Login</a>
                <a href="{{ route('register') }}" class="mx-2">Register</a>
                @endguest
            </div>
        </nav>
        <a style="z-index:999" href="{{ url()->full() }}" class="fixed bottom-20 right-0 bg-gray-900 text-white p-2 w-8 h-8 flex justify-center items-center"><i class="fa fa-refresh"></i></a>
        <main class="py-4">
            @yield('content')
        </main>
        @auth
            @livewire('user-bottom-nav')
        @endauth
    </div>
    <div class="h-32"></div>
    @livewireScripts
</body>
</html>
