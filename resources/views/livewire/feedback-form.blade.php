<div class="w-full" x-data="{stars:3}">
    @if ($showForm)
        <form action="{{ route('customers.feedbacks.store') }}" method="POST" class="w-full">
            @csrf
            <input type="hidden" name="book_id" value="{{$book->id }}">
            <div>
                <label for="">
                    star(s)
                </label>
                <template x-for="_ in Number.parseInt(stars)">
                    <i  class="fa fa-star text-yellow-500"></i>
                </template>
            <input x-model="stars" class="w-full" type="range" name="stars"  max="5" min="1">
            </div>
            <div>
                <textarea class="border-2 border-gray-900 p-2 h-32 w-full" name="message" required id="">Very Good service !</textarea>
            </div>
            <button class=" w-full bg-gray-900 text-white border-2 p-2 border-gray-900">
                SUBMIT
            </button>
        </form>
    @endif
    @if (!$showForm)
        <button wire:click="$set('showForm', true)"class=" w-full border-2 p-2 border-gray-900" >
            RATE NOW
        </button>
    @endif
</div>
