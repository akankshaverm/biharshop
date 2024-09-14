@extends('layout')
@section('content')

<div class=" flex flex-1 flex-col gap-4 px-[5%] py-5">
    <div class="w-full">
        <h2 class=" text-black font-bold text-3xl mt-8">Make Payment Online & Offline</h2>
    </div>

    <div class="flex flex-1 gap-5">
       <div class=" w-3/12">
        <div class="flex flex-col gap-2">
            <label for="payment_method" class=" text-slate-500 font-semibold text-sm">Payment Method</label>
            <select name="payment_method" id="payment_method" class="border-2 border-gray-300 rounded">
                <option value="" selected disabled>Select Payment Method</option>
                <option value="online">Online Payment</option>
                <option value="offline">Offline Payment</option>
            </select>
        </div>

       </div>
    </div>


</div>
@endsection