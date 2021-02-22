@extends('layouts.app')

@section('content')
    <div>
        <h1 class="capitalize text-2xl px-2 text-center sm:text-left">
            {{ auth()->user()->account->type }} Dashboard
        </h1>

        {{-- for provider --}}

        @if(auth()->user()->account->type == 'provider' && auth()->user()->account->approved_at == null)
            <div class="bg-yellow-200 text-yellow-900 p-2 uppercase">
                Your Account is not approved yet.
            </div>
        @endif

        {{--  --}}
        <div class="flex flex-wrap">
           <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5 ">
                @livewire('dashboard-card', ['menuLink'=> route('customers.services.index'),'menuName'=>'Find Services', 'menuImage'=> asset('svg/find-service.svg')])
           </div>
           <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5 ">
                @livewire('dashboard-card', ['menuLink'=>'#','menuName'=>'My books', 'menuImage'=> asset('svg/view-book.svg')])
            </div>
            
            @if (auth()->user()->account->type == 'provider')
                <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5 ">
                    @livewire('dashboard-card', ['menuLink'=>route('providers.requests.index'),'menuName'=>'View Request', 'menuImage'=> asset('svg/request.svg')])
                </div>
            @endif

            <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5 ">
                @livewire('dashboard-card', ['menuLink'=>'#','menuName'=>'My Profile', 'menuImage'=> asset('svg/profile.svg')])
            </div>
            <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5 ">
                @livewire('dashboard-card', ['menuLink'=>'#','menuName'=>'Setting', 'menuImage'=> asset('svg/setting.svg')])
            </div>    
        </div>
    </div>
@endsection

