<div>
    @if($step == 4)
    <div class="p-2">
        <div class="uppercase font-bold text-xl">Review:</div>
        <div>
            <div><span>Name: </span> Juan Dela Cruz</div>
            <div><span>Mobile number: </span> Juan Dela Cruz</div>
            <div><span>Address: </span> Juan Dela Cruz</div>
            <div><span>Gender: </span> Juan Dela Cruz</div>
            <div><span>Birthdate: </span> Juan Dela Cruz</div>
            <div><span>Valid ID: </span> Juan Dela Cruz</div>
            <div><span>Account Picture: </span> Juan Dela Cruz</div>
            <div><span>Email: </span> Juan Dela Cruz</div>
            <div><span>Password: </span> Juan Dela Cruz</div>
            <div class="flex w-full p-2 justify-between">
                <button wire:click="prev()" type="button" class="p-2 px-4 bg-gray-100 text-gray-900 border-2 border-gray-900 uppercase">Edit Again</button>
                <button type="button" class="p-2 px-4 bg-green-500 text-gray-100 uppercase">Finalize</button>
            </div>
        </div>
    </div>
    @endif
    <form action="#" method="POST" class="flex flex-col justify-center items-center">
        @csrf
        @if ($step == 1)
            <div class="w-full p-2">
                <select wire:model="type" name="type" id="" required class="w-full p-2 text-xl">
                    <option value="customer">Customer</option>
                    <option value="provider">Provider</option>
                </select>
            </div>
            <div class="w-full p-2">
                <input wire:model="name" type="text" placeholder="Last-Name First-Name" required class="w-full p-2 text-xl" name="name">
            </div>
            <div class="w-full p-2">
                <input wire:model="mobile_number" type="text" placeholder="Mobile Number" required class="w-full p-2 text-xl" name="mobile_number">
            </div>
            <div class="w-full p-2">
                <input wire:model="address" type="text" placeholder="Address" required class="w-full p-2 text-xl" name="address">
            </div>
            <div class="flex w-full p-2 justify-end">
                <button type="button" class="p-2 px-4 bg-gray-900 text-gray-100 uppercase" wire:click="next()">Next</button>
            </div>
        @endif
        @if ($step == 2)
            <div class="w-full p-2">
                <select wire:model="gender" name="gender" id="" required class="w-full p-2 text-xl">
                    <option value="male" selected>Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="w-full p-2">
                <input type="date" wire:model="birthdate"  placeholder="Birthdate" required class="w-full p-2 text-xl" name="birthdate">
            </div>
            <div class="w-full p-2">
                <label for="" class="p-2 font-bold">Valid ID</label>
                <div class="text-xs text-gray-400 px-2">
                    UMID, Driver License, Postal Id, etc..,
                </div>
                <img src="{{ $valid_id ? $valid_id->temporaryUrl(): ''}}" class="object-cover bg-white w-24 h-24 mx-2 border-dashed border-2 "/>
                <div wire:loading wire:target="valid_id">
                    uploading .. 
                </div>
                <input wire:model="valid_id" type="file" placeholder="Valid Id" required class="w-full p-2 text-xl" name="valid_id">
            </div>
            <div class="flex w-full p-2 justify-between">
                <button wire:click="prev()" type="button" class="p-2 px-4 bg-gray-100 text-gray-900 border-2 border-gray-900 uppercase">Previous</button>
                <button wire:click="next()" type="button" class="p-2 px-4 bg-gray-900 text-gray-100 uppercase">Next</button>
            </div>
        @endif
        @if ($step == 3)
            <div class="w-full p-2">
                <label for="" class="p-2 font-bold">Account picture</label>
                <div class="text-xs text-gray-400 px-2">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, ex.
                </div>
                <img src="{{$picture ? $picture->temporaryUrl() : ''}} " class="object-cover w-24 h-24 bg-white mx-2 border-dashed border-2 ">

                </img>
                <input wire:model="picture" type="file" placeholder="Valid Id" required class="w-full p-2 text-xl" name="picture">
            </div>
            <div class="w-full p-2">
                <input wire:model="email" type="email" placeholder="Email" required class="w-full p-2 text-xl" name="email">
            </div>
            <div class="w-full p-2">
                <input wire:model="password" type="password" placeholder="Password" required class="w-full p-2 text-xl" name="password">
            </div>
            <div class="w-full p-2">
                <input wire:model="confirmpassword"type="password" placeholder="Confim password" required class="w-full p-2 text-xl" name="confirmedpassword">
            </div>
            <div class="flex w-full p-2 justify-between">
                <button wire:click="prev()" type="button" class="p-2 px-4 bg-gray-100 text-gray-900 border-2 border-gray-900 uppercase">Previous</button>
                <button wire:click="next()" type="button" class="p-2 px-4 bg-gray-900 text-gray-100 uppercase">Finalize</button>
            </div>
        @endif
    </form>
</div>

{{-- 
<div class="w-full p-2">
    <input type="password" placeholder="Password" required class="w-full p-2 text-xl" name="passsword">
</div>
<div class="w-full p-2">
    <input type="submit" value="Login" class="w-full p-2 text-2xl bg-gray-900 text-gray-100">
</div> --}}