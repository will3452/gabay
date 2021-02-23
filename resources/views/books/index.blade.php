@extends('layouts.app')

@section('content')
<div class="flex flex-wrap justify-center mt-2">
    <a href="{{ url()->current() }}?status=declined" class="p-1 {{ request()->status == 'declined' ? 'bg-gray-900 text-white':'text-gray-900' }} border-2 border-gray-900 ">DECLINED</a>
    <a href="{{ url()->current() }}?status=pending" class="p-1 {{ request()->status == 'pending' ? 'bg-gray-900 text-white':'text-gray-900' }} border-2 border-gray-900 ">PENDING</a>
    <a href="{{ url()->current() }}?status=in-progress" class="p-1 {{ request()->status == 'in-progress' ? 'bg-gray-900 text-white':'text-gray-900' }}  border-2 border-gray-900 ">IN PROG.</a>
    <a href="{{ url()->current() }}?status=completed" class="p-1 {{ request()->status == 'completed' ? 'bg-gray-900 text-white':'text-gray-900' }} border-2 border-gray-900 ">COMPLETED.</a>
</div>
@forelse ($books as $book)
    <div class="p-2 uppercase max-w-md mx-auto">
        <div class="border-2 border-gray-900 p-2 w-full flex justify-center items-center flex-col mt-2">
            <img src="{{ $book->service->user->account->public_picture }}" alt="" class="w-32 h-32 object-cover">
             <h3 class="text-2xl font-bold uppercase">{{ $book->service->user->name }}</h3>
             <h3 class="uppercase">{{ $book->service->name }} / {{ $book->service->system_rate }}</h3>
             <p>
                 Date: {{ $book->date }}, Time: {{ $book->time }}
             </p>
             <div>
                 Address: {{ $book->address }}
             </div>
             @if ($book->status == 'in-progress')
                <div class="mt-2 flex w-full">
                    @livewire('feedback-form', ['book'=>$book]);
                </div>
             @endif
             @if($book->status == 'declined')
                <form action="#">
                    @csrf
                    <button>REFUND</button>
                </form>
             @endif
        </div>
    </div>
@empty
    <div class="w-full h-32 flex justify-center items-center">
        NO REQUEST.
    </div>
@endforelse
@endsection