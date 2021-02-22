<div>
    <form action="#" class="w-screen p-2">
        <select wire:model="selected" name="" id="" class=" w-full p-2 mx-auto w-full border-2 border-gray-900">
            <option value="" disabled selected>
                --SELECT SERVICE HERE--
            </option>
            @foreach ($services as $service)
                <option value="{{ $service }}">
                    {{ $service }}
                </option>
            @endforeach
        </select>
    </form>
    <div wire:loading class="w-full text-center p-2 uppercase">
        Searching, Please Wait...
    </div>
    <div wire:loading.remove>
        @if(count($result))
            <div class="text-center font-bold text-2xl">
                RESULT : {{ count($result) }}
            </div>
        @endif
        @forelse ($result as $res)
            @livewire('search-service-result', ['service_id'=>$res->id])
        @empty
            @if ($selected != '')
                <div class="h-24 w-full flex justify-center">
                    NO PROVIDER.
                </div>
            @endif
        @endforelse
    </div>
    
</div>
