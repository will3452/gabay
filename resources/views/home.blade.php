@extends('layouts.app')

@section('content')
    <div>
        <h1 class="capitalize text-2xl px-2 text-center sm:text-left">
            {{ auth()->user()->account->type }} Dashboard
        </h1>
        @livewire('user-dashboard')
    </div>
@endsection

