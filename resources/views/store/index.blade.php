@extends('layout')

@section('content')
<div class="border-solid border-red-600 border-[1px] w-full mx-[30px] flex flex-wrap gap-4">
    @forelse ($products as $product)
        @php
            $formattedPrice = $product->formattedPrice();
            $integerPart = $formattedPrice[0];
            $decimalPart = $formattedPrice[1];
        @endphp
        <div class="card border w-[170px] rounded-[10px] overflow-hidden relative group">
            <div class="h-[50%]">
                <img src="{{ asset('storage/'.$product->image) }}" alt="" class="object-cover h-full object-center w-full rounded-[10px]">
            </div>
            <div class="content p-2 h-[50%]">
                <div class="flex items-center justify-between">
                    <h4 class="title">{{ $product->name }}</h4>
                </div>
                <p class="price">
                    <span class="text-[1.6666666667em] font-bold bg-red-500 text-white px-[5px] rounded py-0">{{ $integerPart }}</span>.{{ $decimalPart }} MAD
                </p>
                <span>Quantity : <span class="bg-green-200 px-[2px] rounded">{{$product->quantity}}</span></span>
                <div class="description">
                    <p>{{ $product->description }}</p>
                </div>
                <div class="link text-center transform translate-y-[200px] group-hover:translate-y-0 transition-transform duration-300 ease-in-out absolute bottom-0 left-0 right-0 bg-slate-300 py-[10px]">
                    <a href="#" class="text-white bg-black rounded px-[25px] py-[5px]">Details</a>
                </div>
            </div>
        </div>
    @empty
        <div>
            empty
        </div>
    @endforelse
</div>
@endsection
