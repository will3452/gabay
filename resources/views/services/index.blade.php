@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        @livewire('search-service', ['services'=>['driver', 'painter']])
    </div>
@endsection