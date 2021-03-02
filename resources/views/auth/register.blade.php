@extends('layouts.app')

@section('content')
    <div class="flex w-screen h-auto justify-center mt-8">
        <div class="md:w-4/12 w-full bg-gray-100 p-4">
            <h1 class="text-center p-2 text-2xl uppercase">
                REGISTER
            </h1>
            @livewire('register-form')
        </div>
    </div>
@endsection