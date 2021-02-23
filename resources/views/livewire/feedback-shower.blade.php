<div class="mt-5 px-2">
    @if ($service->feedbacks()->count() && $showFeedback == false)
        <button class="uppercase w-full p-2 border-2 border-gray-900 text-gray-900" wire:click.prefetch="$set('showFeedback', true)">Show Feedback(s)</button>
    @endif
    @if ($showFeedback)
        <h1 class="text-2xl text-center font-bold uppercase">Latest Feedback(s)</h1>
        @foreach ($service->feedbacks()->latest()->take(5)->get() as $feedback)
            <div class="mt-2 border-b-2 border-gray-900 p-2">
                <div class="flex items-center">
                    <img src="{{ $feedback->user->account->public_picture }}" alt="" class="h-12 w-12 object-cover">
                    <div class="mx-2">
                        @for($i = 0; $i < $feedback->star; $i++)
                        <i class="fa fa-star text-yellow-500"></i>
                        @endfor
                        <div class="font-bold uppercase">
                            {{ $feedback->user->name }}
                        </div>
                    </div>
                </div>
                <div class="text-xl italic text-right text-gray-700 hover:text-gray-900">
                    {{ Str::limit($feedback->message, 50) }}
                </div>
            </div>
        @endforeach
    @endif
</div>
