@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
       <img src="{{ $service->user->account->public_picture }}" alt="" class="block w-40 h-40 object-cover ">
    </div>
    <div class="text-4xl font-bold uppercase text-center mt-2">
        {{ $service->user->name }}
    </div>
    <div class="text-center uppercase">
        {{$service->name}} /P {{$service->system_rate}}
    </div>
    <div class="text-center">
        <i class="fa fa-star text-yellow-500"></i>
        <i class="fa fa-star text-yellow-500"></i>
        <i class="fa fa-star text-yellow-500"></i>
        <i class="fa fa-star text-yellow-500"></i>
    </div>
    @livewire('book-form', ['service'=>$service])
@endsection