<script src="https://cdn.tailwindcss.com"></script>
@extends('layout')
@section('title')
Home Page

@endsection
@section('content')
<x-banner />

<div class=" w-full flex flex-1 flex-col px-[13%] py-5">
    
    <x-category-navbar/>


    <div class="flex flex-1">
        <h2 class=" border-l-4 border-orange-600 pl-2 text-xl">You May Also Like</h2>
    </div>
    <div class="grid grid-cols-4 gap-5  mt-5">
        @foreach ($products as $product)
        <x-product-card :product="$product" />
        @endforeach

    </div>

</div>


</div>
@endsection