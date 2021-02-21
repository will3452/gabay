@extends('layouts.app')

@section('content')
    <div class="flex w-screen h-auto justify-center">
        <div class="md:w-4/12 w-full bg-gray-100 p-4">
            <h1 class="text-center p-2 text-2xl uppercase">
                LOGIN PAGE
            </h1>
            @if (session('errors'))
                <div class="text-red-500 p-2 capitalize text-center">Wrong credentials.</div>
            @endif
            <form action="{{route('login')}}" method="POST" class="flex flex-col justify-center items-center">
                @csrf
                <div class="w-full p-2">
                    <input type="email" placeholder="Email" required class="w-full p-2 text-xl" name="email">
                </div>
                <div class="w-full p-2">
                    <input type="password" placeholder="Password" required class="w-full p-2 text-xl" name="password">
                </div>
                <div class="w-full p-2">
                    <input type="submit" value="Login" class="w-full p-2 text-2xl bg-gray-900 text-gray-100">
                </div>
            </form>
        </div>
    </div>
@endsection