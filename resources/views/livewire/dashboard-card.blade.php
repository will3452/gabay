<div class="w-full h-full p-2">
    <div class="w-full h-full border-200-700 border-2 hover:bg-gray-200 flex justify-center items-center flex-col" wire:click="goto()" >
        <div class="flex h-6 w-full justify-end">
            @if ($menuCount != '' || $menuCount != 0)
                <div class="h-full bg-red-500 text-white p-1 text-sm">
                    {{ $menuCount }}
                </div>
            @endif
        </div>
        <div class="w-full flex justify-center">
            <img src="{{ $menuImage }}" alt="" class="block w-32 h-32 object-contain">
        </div>
        <h1 class="font-bold text-lg uppercase text-gray-900">
            {{ $menuName }}
        </h1>
    </div>
</div>
