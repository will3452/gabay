<div>
    @if ($menushow)
        <div class="fixed py-12   flex flex-col top-0 bg-gray-900 text-white w-full max-w-sm bg-gray-900 h-screen">
            <a href="#" class="text-left px-2 sm:text-center text-2xl uppercase">
                {{ auth()->user()->name }}
            </a>
            <div class="mt-8 w-full h-2 bg-gray-100"></div>
            <form action="{{route('logout')}}" method="POST" class="text-2xl  p-4 text-left sm:text-center">
                @csrf
                <button class="uppercase"><i class="fa fa-power-off"></i> Logout</button>
            </form>
        </div>
    @endif
    <div class="flex fixed bottom-0  h-16 bg-gray-900 w-full items-center justify-evenly">
        <button class="text-4xl text-white" wire:click.prevent="$set('menushow', {{ !$menushow }})">
            @if (!$menushow)
                <i class="fa fa-bars"></i>
            @else
                <i class="fa fa-times"></i>
             @endif
        </button>
        <a class="text-4xl text-white" href="/home">
            <i class="fa fa-home"></i>
        </a>
        <a class="text-4xl text-white" href="{{ url()->previous() }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>
</div>