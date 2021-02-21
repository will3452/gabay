<div>
    @if($step == 4)
    <div class="p-2">
        <div class="uppercase font-bold text-xl">Review:</div>
        <div>
            <div><span>Type: </span>{{ $type }}</div>
            <div><span>Name: </span>{{ $name }}</div>
            <div><span>Mobile number: </span> {{ $mobile_number }}</div>
            <div><span>Address: </span> {{ $address }}</div>
            <div><span>Gender: </span> {{ $gender }}</div>
            <div><span>Birthdate: </span> {{ $birthdate }}</div>
            <div><span>Valid ID: </span>  <div>
                <img src="{{ $valid_id->temporaryUrl() }}" alt="" class="w-32 h-32 object-contain">
            </div>
            <div><span>Account Picture: </span>
                <div>
                    <img src="{{ $picture->temporaryUrl() }}" alt="" class="w-32 h-32 object-contain">
                </div>
            <div><span>Email: </span> {{ $email }}</div>
            <div><span>Password: </span> 
                @for($i = 0; $i < strlen($opassword); $i++)
                    *
                @endfor
            </div>
            <div class="flex w-full p-2 justify-between" wire:loading.remove>
                <button wire:click="prev()" type="button" class="p-2 px-4 bg-gray-100 text-gray-900 border-2 border-gray-900 uppercase">Edit Again</button>
                <button  wire:click="submit()" class="p-2 px-4 bg-green-500 text-gray-100 uppercase">Submit</button>
            </div>
        </div>
    </div>
    @endif
    <form action="#" method="POST" class="flex flex-col justify-center items-center" autocomplete="off" >
       @if ($required_error)
            <p class="px-2 uppercase text-red-500">*** All fields are required.</p>
       @endif
        @csrf
        @if ($step == 1)
            <div class="w-full p-2">
                <select  wire:model="type" name="type" id="" required class="w-full p-2 text-xl">
                    <option value="customer">Customer</option>
                    <option value="provider">Provider</option>
                </select>
            </div>
            <div class="w-full p-2">
                <input wire:model.lazy="name" type="text" placeholder="Last-Name First-Name" required class="w-full p-2 text-xl" name="name">
            </div>
            <div class="w-full p-2">
                <input  wire:model.lazy="mobile_number" type="text" placeholder="Mobile Number" required class="w-full p-2 text-xl" name="mobile_number">
            </div>
            <div class="w-full p-2">
                <input wire:model.lazy="address" type="text" placeholder="Address" required class="w-full p-2 text-xl" name="address">
            </div>
            @if($type=='provider')
            <div class="w-full p-2">
                <select  wire:model="serviceName" name="serviceName" id="" required class="w-full p-2 text-xl">
                    <option value="" selected disabled>---SELECT SERVICE---</option>
                    <option value="driver">driver</option>
                    <option value="painter">painter</option>
                </select>
            </div>
            <div class="w-full p-2">
                <input wire:model.lazy="serviceRate" type="number" placeholder="Service Rate" required class="w-full p-2 text-xl" name="serviceRate">
            </div>
            @endif
            
            <div class="flex w-full p-2 justify-end" wire:loading.remove>
                <button type="button" class="p-2 px-4 bg-gray-900 text-gray-100 uppercase" wire:click="next(['{{ $type == 'customer' ? $type: $serviceRate }}','{{$type == 'customer' ? $type: $serviceName }}','{{ $name }}', '{{ $mobile_number }}', '{{ $address }}'])">Next</button>
            </div>
        @endif
        @if ($step == 2)
            <div class="w-full p-2">
                <select  wire:model="gender" name="gender" id="" required class="w-full p-2 text-xl">
                    <option value="male" selected>Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="w-full p-2">
                <input type="date" wire:model.lazy="birthdate" placeholder="Birthdate" required class="w-full p-2 text-xl" name="birthdate">
            </div>
            <div class="w-full p-2">
                <label for="" class="p-2 font-bold">Valid ID</label>
                <div class="text-xs text-gray-400 px-2">
                    UMID, Driver License, Postal Id, etc..,
                </div>
                <img src="{{ $valid_id != null ?  $valid_id->temporaryUrl():''}}" class="object-cover bg-white w-24 h-24 mx-2 border-dashed border-2 "/>
                <div wire:loading wire:target="valid_id">
                    uploading .. 
                </div>
                <input wire:model="valid_id" type="file" placeholder="Valid Id" required class="w-full p-2 text-xl" name="valid_id">
            </div>
            <div class="flex w-full p-2 justify-between" wire:loading.remove>
                <button wire:click="prev()" type="button" class="p-2 px-4 bg-gray-100 text-gray-900 border-2 border-gray-900 uppercase">Previous</button>
                <button wire:click="next(['{{ $valid_id ? $valid_id->temporaryUrl() :'' }}', '{{ $birthdate }}'])" type="button" class="p-2 px-4 bg-gray-900 text-gray-100 uppercase">Next</button>
            </div>
        @endif
        @if ($step == 3)
            <div class="w-full p-2">
                <label for="" class="p-2 font-bold">Account picture</label>
                <div class="text-xs text-gray-400 px-2">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, ex.
                </div>
                <img src="{{$picture ? $picture->temporaryUrl(): '' }} " class="object-cover w-24 h-24 bg-white mx-2 border-dashed border-2 ">
                <input wire:model="picture" type="file" placeholder="Valid Id" required class="w-full p-2 text-xl" name="picture">
            </div>
            <div class="w-full p-2">
                <input wire:model.lazy="email" type="email" placeholder="Email" required class="w-full p-2 text-xl" name="email">
                @error('email')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <input type="password" class="w-0 h-0">
            <div class="w-full p-2">
                @if ($password_error_message)
                    <div class="text-red-500">
                        {{ $password_error_message }}
                    </div>
                @endif
                <input  autocomplete="new-password" type="password"  id="password" wire:model="opassword" placeholder="Password" required class="w-full p-2 text-xl" name="password">
            </div>
            <div class="w-full p-2">
                <input  autocomplete="new-password" type="password" id="confirmpassword" wire:model="cpassword" placeholder="Confim password" required class="w-full p-2 text-xl" name="passwordconfirm">
            </div>
            
            <div class="flex w-full p-2 justify-between" wire:loading.remove>
                <button wire:click="prev()" type="button" class="p-2 px-4 bg-gray-100 text-gray-900 border-2 border-gray-900 uppercase">Previous</button>
                <button wire:click="next(['{{ $opassword }}', '{{ $picture ? $picture->temporaryUrl() :'' }}', '{{ $cpassword }}', '{{ $email }}'])" type="button" class="p-2 px-4 bg-gray-900 text-gray-100 uppercase">Finalize</button>
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