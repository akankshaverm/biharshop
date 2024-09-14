@extends('layout')
@section('content')
@php
$total_amount = 0;
$total_discount = 0;
$total_discount_amount=0;
$total_tax = 0;
$total_payable = 0;
@endphp
<div class=" flex flex-1 flex-col gap-4 px-[5%] py-5">
    <div class="w-full">
        <h2 class=" text-black font-bold text-3xl mt-8">My Cart</h2>
    </div>

    <div class="flex flex-1 gap-5">
        <div class="w-8/12">
            @foreach($order->orderItems as $item)
            @php
            $total_amount += $item->qty * $item->product->price;
            $total_discount_amount += $item->qty * $item->product->discount_price;
            $total_discount = $total_amount - $total_discount_amount;
            $total_tax = $total_discount_amount * 0.18;
            $total_payable = $total_discount_amount + $total_tax;


            if($order->coupon_id !=NULL):
            $total_payable -= $order->coupon->amount;
            endif

            @endphp


            <div class="flex items-center gap-4 mb-2 bg-slate-200 p-3">
                <img class=" size-32 rounded-sm" src="/images/{{$item->product->featured_image}}" alt="">
                <div class="font-medium dark:text-white">
                    <div>{{$item->product->name}}</div>
                    <div class=" text-xl font-light">{{$item->product->discount_price}} <del>{{$item->product->price}}</del></div>
                    <div class="text-sm mt-5 text-gray-500 dark:text-gray-400">
                        <a href="{{route('removeFromCart',$item->product->slug)}}" class=" bg-red-500 text-white px-3 py-2 text-xl">-</a>
                        <span class=" text-xl p-3">{{$item->qty}}</span>
                        <a href="{{route('addToCart',$item->product->slug)}}" class=" bg-green-500 text-white px-3 py-2 text-xl">+</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="w-4/12">


            <div class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <div aria-current="true" class="w-full px-4 py-2 font-medium text-left rtl:text-right text-white bg-gray-700 border-b border-gray-200 rounded-t-lg cursor-pointer focus:outline-none dark:bg-gray-800 dark:border-gray-600">
                    Price Details
                </div>
                <div class="w-full px-4 py-2 font-medium text-left rtl:text-right   border-b border-gray-200 cursor-pointer ">
                    Total Price
                    <span class=" float-end font-normal">Rs.{{$total_amount}}/-</span>
                </div>
                <div class="w-full px-4 py-2 font-medium text-left rtl:text-right   border-b border-gray-200 cursor-pointer bg-green-200">
                    Total Discount
                    <span class=" float-end font-normal">Rs.{{$total_discount}}/-</span>
                </div>
                <div class="w-full px-4 py-2 font-medium text-left rtl:text-right   border-b border-gray-200 cursor-pointer ">
                    Total TAX (GST 18%)
                    <span class=" float-end font-normal">Rs.{{$total_tax}}/-</span>
                </div>
                @if($order->coupon_id != NULL)
                <div class="w-full px-4 py-2 font-medium text-left rtl:text-right   border-b border-gray-200 cursor-pointer  bg-orange-200">
                    Total Coupon Discount ({{$order->coupon->code}})
                    <span class=" float-end font-normal">Rs.{{$order->coupon->amount}}/-</span>
                </div>

                @endif
                <div class="w-full text-xl px-4 py-2 font-medium text-left rtl:text-right   border-b border-gray-200 cursor-pointer ">
                    Total Payable
                    <span class=" float-end font-normal">Rs.{{$total_payable}}/-</span>
                </div>

            </div>

            <div class=" border w-full bg-white shadow-lg mt-4 p-5">

                @if($order->coupon_id == NULL)
                <form action="{{route('coupon.add')}}" method="post" class=" flex flex-1 gap-3">
                    @csrf
                    <input type="text" name="coupon_code" class=" border px-3 py-2 rounded flex-1 flex" placeholder="Enter Coupon Code Here">
                    <input type="submit" value="Apply" class=" bg-orange-600 text-white px-3 py-2 rounded">


                </form>
                @else
                <p class=" text-lg flex gap-4">Applied Coupon:<span class=" bg-green-600 text-white px-4 py-2  ">
                        {{$order->coupon->code}}


                    </span>
                    <a href="{{route('coupon.remove')}}" class="float-end text-red-600 font-bold text-center text-2xl">X</a>



                    @endif

            </div>

            @session('coupon_error')
            <div class=" text-red-500 text-xs">

                {{session('coupon_error')}}


            </div>
            @endsession
            <div class="flex flex-1 justify-between p-5">
                <a href="{{route('homepage')}}" class=" bg-slate-900 text-white px-3 py-2">More Shopping</a>
                <a href="{{route('checkout')}}" class=" bg-orange-500 text-white px-3 py-2">Checkout</a>
            </div>



        </div>
    </div>


</div>
@endsection