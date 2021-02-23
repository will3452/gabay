@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-lg">
        <div class="flex justify-center">
            <img src="{{ $service->user->account->public_picture }}" alt="" class="block w-40 h-40 object-cover ">
         </div>
         <div class="text-4xl font-bold uppercase text-center mt-2">
             {{ $service->user->name }}
         </div>
         <div class="text-center uppercase">
             {{$service->name}} / P {{$service->system_rate}}
         </div>
         <div class="text-center">
             @for ($i = 0; $i < $service->average_star; $i++)
                 <i class="fa fa-star text-yellow-500"></i>
             @endfor
         </div>
         @if ($service->feedbacks()->count())
             <div class="text-xs text-center">
                 {{ $service->feedbacks()->count() }} customer(s)
             </div>
         @endif
         @livewire('book-form', ['service'=>$service])
         @livewire('feedback-shower',['service'=>$service])
    </div>

@endsection