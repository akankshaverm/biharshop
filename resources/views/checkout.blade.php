@extends('layout')
@section('content')

<div class=" flex flex-1 flex-col gap-4 px-[5%] py-5">
    <div class="w-full">
        <h2 class=" text-black font-bold text-3xl mt-8">Checkout Your Order</h2>
    </div>

    <div class="flex flex-1 gap-5">
        <div class="w-9/12">
            <form action="{{route('address.store')}}" method="post" class=" grid grid-cols-2  gap-5">
                @csrf
                <div class="mb-3">
                    <label for="full_name" class=" font-semibold text-gray-700 text-xl ">Full Name</label>
                    <input type="text" id="full_name" name="full_name" class=" w-full px-3 py-2 text-gray-700 rounded-md">
                    @error('full_name')
                    <p class=" text-xs font-semibold text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="contact" class=" font-semibold text-gray-700 text-xl">Contact</label>
                    <input type="text" id="contact" name="contact" class=" w-full px-3 py-2 text-gray-700 rounded-md">
                    @error('contact')
                    <p class=" text-xs font-semibold  text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="street" class=" font-semibold text-gray-700 text-xl">Street</label>
                    <input type="text" id="street" name="street" class=" w-full px-3 py-2 text-gray-700 rounded-md">
                    @error('street')
                    <p class=" text-xs font-semibold  text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="area" class=" font-semibold text-gray-700 text-xl">Area</label>
                    <input type="text" id="area" name="area" class=" w-full px-3 py-2 text-gray-700 rounded-md">
                    @error('area')
                    <p class=" text-xs font-semibold  text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="landmark" class=" font-semibold text-gray-700 text-xl">Landmark</label>
                    <input type="text" id="landmark" name="landmark" class=" w-full px-3 py-2 text-gray-700 rounded-md">
                    @error('landmark')
                    <p class=" text-xs font-semibold  text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="city" class=" font-semibold text-gray-700 text-xl">City</label>
                    <input type="text" id="city" name="city" class=" w-full px-3 py-2 text-gray-700 rounded-md">
                    @error('city')
                    <p class=" text-xs font-semibold  text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="state" class=" font-semibold text-gray-700 text-xl">State</label>
                    <input type="text" id="state" name="state" class=" w-full px-3 py-2 text-gray-700 rounded-md">
                    @error('state')
                    <p class=" text-xs font-semibold  text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pincode" class=" font-semibold text-gray-700 text-xl">Pincode</label>
                    <input type="text" id="pincode" name="pincode" class=" w-full px-3 py-2 text-gray-700 rounded-md">
                    @error('pincode')
                    <p class=" text-xs font-semibold  text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="type" class=" font-semibold text-gray-700 text-xl">Type</label>
                    <select name="type" id="" class=" w-full px-3 py-2 text-gray-700 rounded-md border-2 border-gray-300">
                        <option value="" selected disabled>Select Type</option>
                        <option value="office">Office</option>
                        <option value="home">Home</option>
                    </select>
                    @error('type')
                    <p class=" text-xs font-semibold  text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="my-7">
                    <input type="submit" class=" bg-teal-600 text-white px-4 py-2 rounded w-full" value=" Create New Address">
                </div>
            </form>


        </div>
        <div class="w-3/12">
            <form action="{{route('order.addAddress')}}" method="post" class=" flex flex-col gap-2">
                @csrf
                @foreach($addresses as $address)
                <label for="address{{$loop->index}}" class=" block hover:bg-orange-100 border p-4 rounded-lg cursor-pointer transition-transform hover:scale-105">
                    <input type="radio" onchange="this.form.submit()" name="selected_address" value="{{$address->id}}" id="address{{$loop->index}}" class="">


                    <div class=" flex justify-between items-center">
                        <div>
                            <p class=" font-bold">{{$address->full_name}}</p>
                            <p>{{$address->contact}}</p>
                            <p>{{$address->street}}</p>
                            <p>{{$address->landmark}}</p>
                            <p>{{$address->city}},{{$address->state}},{{$address->pincode}}</p>
                            <p>{{$address->area}}</p>
                            <p>Type:{{$address->type}}</p>
                        </div>
                    </div>
                </label>
                @endforeach
            </form>
        </div>
    </div>
</div>
@endsection