@extends('layouts.admin')

@section('content')
    <div>
        <h1 class="uppercase text-2xl text-center sm:text-left px-2">
            Admin Dashboard
        </h1>
        <div class="flex flex-wrap">
           <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5 ">
                @livewire('dashboard-card', ['menuLink'=>route('admins.applications.index'),'menuName'=>'NEW APPLICATIONS', 'menuImage'=> asset('svg/approved.svg')])
           </div>
        </div>
    </div>
@endsection
