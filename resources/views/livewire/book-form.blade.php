<div class="px-2">
    <form action="{{route('customers.bookings.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($show)
        <input type="hidden" name="service_id" value="{{$service->id}}">
        <div class="bg-gray-100 ">
            <div class="text-yellow-900 p-2 bg-yellow-300 uppercase ">
                <div class="font-bold">How to get proof of payment ? </div>
                Send Money via GCASH to this number "09096524461"  and save or capture the receipt.
            </div>
            <label for="">Enter Proof Of Payment</label>
            <input name="proof" type="file" required>
            <div class="pt-2">
                <input type="text" name="payment_value" required placeholder="PAYMENT VALUE" class="w-full p-2 border-2 border-gray-900">
            </div>
            <div class="pt-2">
                <input type="text"  name="address" wire:model.lazy="address" required placeholder="ADDRESS" class="w-full p-2 border-2 border-gray-900" required>
                <div>
                    <input type="checkbox" wire:change="$set('address', '{{ auth()->user()->account->address }}')"> Use your account address ?.
                </div>
            </div>
            <div class="pt-2">
                <label for="">DATE</label>
                <input type="date" placeholder="DATE" name="date" class="w-full p-2 border-2 border-gray-900" required>
            </div>
            <div class="pt-2">
                <label for="">TIME</label>
                <input type="time" placeholder="TIME" name="time" class="w-full p-2 border-2 border-gray-900" required>
            </div>
        </div>

    @endif
    <button @if(!$show) type="button" @else type="submit" @endif wire:click="showForm()" class="mt-2 w-full p-2 text-center border-2 border-gray-900 hover:bg-gray-900 hover:text-white">
        {{ $show ? 'SUBMIT DETAILS': 'BOOK NOW' }}
    </button>

    </form>

    <div class="h-32"></div>
    
</div>
