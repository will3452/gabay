<div>
    <div  class="text-center">
        <h2 class="font-bold text-2xl">NEW : {{ count($this->accounts()) }}</h2>
    </div>
    <div class="container px-2">
        @forelse ($accountx as $account)
        <div wire:key="{{ $account->id.now() }}">
            @livewire('profile-card-list', ['account'=>$account], key($account->id.now()))
        </div>
        @empty
            
            <div class="flex h-32 items-center justify-center uppercase text-gray-400">
                No Application.
            </div>
    
        @endforelse
    </div>
</div>