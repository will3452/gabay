@extends('layouts.app')

@section('content')
    
    <div class="flex justify-center mt-2">
        <a href="{{ url()->current() }}?status=pending" class="p-2 {{ request()->status == 'pending' ? 'bg-gray-900 text-white':'text-gray-900' }} border-2 border-gray-900 ">PENDING</a>
        <a href="{{ url()->current() }}?status=in-progress" class="p-2 {{ request()->status == 'in-progress' ? 'bg-gray-900 text-white':'text-gray-900' }}  border-2 border-gray-900 ">IN PROG.</a>
        <a href="{{ url()->current() }}?status=completed" class="p-2 {{ request()->status == 'completed' ? 'bg-gray-900 text-white':'text-gray-900' }} border-2 border-gray-900 ">COMPLETED.</a>
    </div>
    @forelse ($books as $book)
        <div class="p-2 uppercase">
            <div class="border-2 border-gray-900 p-2 w-full flex justify-center items-center flex-col mt-2">
                <img src="{{ $book->user->account->public_picture }}" alt="" class="w-32 h-32 object-cover">
                 <h3 class="text-2xl font-bold uppercase">{{ $book->user->name }}</h3>
                 <h3 class="uppercase">Service Need: {{ $book->service->name }}</h3>
                 <p>
                     Date: {{ $book->date }}, Time: {{ $book->time }}
                 </p>
                 <div>
                     Address: {{ $book->address }}
                 </div>
                 @if ($book->status == 'pending')
                    <div class="mt-2 flex w-full">
                        <form action="{{ route('providers.requests.update', $book) }}" class="w-1/2" method="POST">
                            @csrf 
                            @method('PUT')
                            <input type="hidden" name="answer" value="decline">
                            <button class="block w-full p-2 bg-red-500 text-white">DECLINE</button>
                        </form>
                        <form action="{{ route('providers.requests.update', $book) }}" class="w-1/2" method="POST">
                            @csrf 
                            @method('PUT')
                            <input type="hidden" name="answer" value="accept">
                            <button class="block w-full p-2 bg-gray-900 text-white">ACCEPT</button>
                        </form>
                    </div>
                 @endif
            </div>
        </div>
    @empty
        <div class="w-full h-32 flex justify-center items-center">
            NO REQUEST.
        </div>
    @endforelse
    
@endsection