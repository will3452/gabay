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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <div id="app">
        <nav class="flex justify-between p-2">
            <a href="#">
                {{ config('app.name', "GABAY") }}
            </a>
            <div class="flex ">
                @guest
                <a href="{{ route('login') }}" class="mx-2">Login</a>
                <a href="{{ route('register') }}" class="mx-2">Register</a>
                @endguest
                @auth
                    <a href="{{route('home')}}" class="mx-2">{{ auth()->user()->name }}</a>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button>Logout</button>
                    </form>
                @endauth
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @livewireScripts
</body>
</html>
