<div class="mt-2">
    
    <div class="flex flex-col max-w-lg mx-auto  p-2 border-2 border-gray-900">
        <div class="w-full flex justify-between items-center">
            <a target="_blank" href="{{ $account->public_picture }}" class="border-2 border-gray-100 hover:border-gray-900">
                <img src="{{ $account->public_picture }}" alt="" class="w-32 h-32 object-cover">
            </a>
            <div class="text-right">
                <h3 class="text-2xl uppercase font-bold">{{ $account->user->name }}</h3>
                <div class="text-xl">{{ $account->user->services()->first()->name }} / P {{ $account->user->services()->first()->rate }}</div>
                <div>{{ $account->address }}</div>
                <div class="mt-2">
                    <span wire:loading>Please wait ... </span>
                    <a href="#" wire:click.prevent="$set('viewmore', {{ !$viewmore }})" class="p-1 border-2 border-gray-900">View {{ $viewmore ? 'Less':'More' }}</a>
                </div>
            </div>
        </div>
        @if($viewmore)
        <div class="mt-2">
            <div class="flex justify-between w-full">
                <div>
                    Email
                </div>
                <div>
                    {{ $account->user->email }}
                </div>
            </div>
            <div class="flex justify-between w-full">
                <div>
                    Gender
                </div>
                <div>
                    {{ $account->gender }}
                </div>
            </div>
            <div class="flex justify-between w-full">
                <div>
                    Birthdate
                </div>
                <div>
                    {{ $account->birthdate }}
                </div>
            </div>
            <div class="flex justify-between w-full">
                <div>
                    Mobile Number
                </div>
                <div>
                    {{ $account->mobile_number }}
                </div>
            </div>
            <div class="flex justify-between w-full">
                <div>
                    Valid ID
                </div>
                <div>
                    <a target="_blank" href="{{ $account->public_valid_id }}" class="underline">View Valid ID</a>
                </div>
            </div>
        </div>
        
        @endif
        <div class="flex">
            <button class="w-1/2 p-2 bg-red-500 text-white" wire:click="delete()">DELETE</button>
            <button class="w-1/2 p-2 bg-gray-900 text-white" wire:click="approve()">APPROVED</button>
        </div>
    </div>

</div>
