<div wire:poll.10000ms>
    @if(auth()->user()->account->type == 'provider' && auth()->user()->account->approved_at == null)
        <div class="bg-yellow-200 text-yellow-900 p-2 uppercase">
            Your Account is not approved yet.
        </div>
    @endif

{{--  --}}
    <div class="flex flex-wrap">
    <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5 ">
            @livewire('dashboard-card', ['menuLink'=> route('customers.services.index'),'menuName'=>'Find Services', 'menuImage'=> asset('svg/find-service.svg')], key('1'.now()))
    </div>
    <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5 ">
            @livewire('dashboard-card', ['menuCount'=>auth()->user()->pending_books_count, 'menuLink'=> route('customers.bookings.index').'?status=pending','menuName'=>'My books', 'menuImage'=> asset('svg/view-book.svg')],key('2'.now()))
        </div>
        
        @if (auth()->user()->account->type == 'provider')
            <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5 ">
                @livewire('dashboard-card', ['menuCount'=>auth()->user()->pending_requests_count, 'menuLink'=>route('providers.requests.index').'?status=pending','menuName'=>'View Request', 'menuImage'=> asset('svg/request.svg')], key('3'.now()))
            </div>
        @endif

         {{-- <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5 ">
        //     @livewire('dashboard-card', ['menuLink'=>'#','menuName'=>'My Profile', 'menuImage'=> asset('svg/profile.svg')])
        // </div>
        // <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5 ">
        //     @livewire('dashboard-card', ['menuLink'=>'#','menuName'=>'Setting', 'menuImage'=> asset('svg/setting.svg')])
        // </div>     --}}
    </div>
</div>
