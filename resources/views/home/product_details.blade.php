@extends('layouts.app') 

@section('title', 'Giftshop - That is what makes you surprised.') 

@section('content') 
    
<div class="hero_area">
    @include('home.header') 
</div>

<!-- start product details -->
<div class="container mt-5">

    @if($product)
        <h2 style="font-weight:bold; font-size: 25px;">{{ $product->title }}</h2>

        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('products/' . $product->image) }}" width="500"
                     class="img-fluid" 
                     alt="{{ $product->title }}">
            </div>

            <div class="col-md-6">
                <h4 style="font-size: 25px; font-weight:bold; padding-bottom:15px;">
                    Category: {{ $product->category }}
                </h4>
                <h3 style="font-size: 30px; font-weight: 700; padding-bottom:15px;">
                    Price: ৳ {{ $product->price }}
                </h3>

                <p>{{ $product->description }}</p>
                <h2 style="font-size: 20px; color:red; padding-top:15px; padding-bottom:15px;">
                    Available Quantity: {{ $product->quantity }}
                </h2>

                <a href="{{ url('add_cart', $product->id) }}" class="btn btn-primary" style="margin-bottom:50px;">
                    Add to Cart
                </a>
            </div>
        </div>
    @else
        <h3 class="text-center text-danger mt-5">Product not found.</h3>
    @endif
</div>
<!-- end product details -->


@include('home.info')

@endsection
