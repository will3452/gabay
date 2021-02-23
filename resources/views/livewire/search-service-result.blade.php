<div class="px-2 mt-2">
    {{-- {{ $service_id }} --}}
    <div class="flex flex-col max-w-lg mx-auto  p-2 border-2 border-gray-900">
        <div class="w-full flex flex-col justify-between items-center">
            <a target="_blank" href="{{ $account->public_picture }}" class="border-2 border-gray-100 hover:border-gray-900">
                <img src="{{ $account->public_picture }}" alt="" class="w-32 h-32 object-cover">
            </a>
            <div class="text-center">
                <h3 class="text-2xl uppercase font-bold">{{ $account->user->name }}</h3>
                <div class="text-xl">{{ $account->user->services()->find($service_id)->name }} / P {{ $account->user->services()->find($service_id)->system_rate }}</div>
                {{-- <div>{{ $account->address }}</div> --}}
                <div>
                    @for ($i = 0; $i < $account->user->services()->find($service_id)->average_star; $i++)
                        <i class="fa fa-star text-yellow-500"></i>
                    @endfor
                </div>
               
            </div>
        </div>
        <div class="flex mt-2">
            <a class="w-full p-2 bg-gray-900 text-white text-center" href="{{ route('customers.services.show', $service_id) }}">VIEW MORE</a>
        </div>
    </div>

</div>
