@extends('layouts.app')

@section('title', 'Giftshop - That is what makes you surprised.')

@section('content')

{{-- Header --}}
<div class="hero_area">
    @include('home.header')
</div>

{{-- Product Details --}}
<div class="container my-5">

    @isset($product)
        <div class="row align-items-start">

            {{-- Product Image --}}
            <div class="col-lg-6 mb-4">
                <div class="border p-3 text-center">
                    <img
                        src="{{ asset('products/'.$product->image) }}"
                        alt="{{ $product->title }}"
                        class="img-fluid rounded"
                        style="max-height:450px;"
                    >
                </div>
            </div>

            {{-- Product Info --}}
            <div class="col-lg-6">
                <h2 class="fw-bold mb-3">{{ $product->title }}</h2>

                <p class="mb-2">
                    <strong>Category:</strong> {{ $product->category }}
                </p>

                <p class="fs-4 fw-bold text-dark mb-3">
                    Price: ৳ {{ $product->price }}
                </p>

                <p class="text-muted mb-3">
                    {{ $product->description }}
                </p>

                <p class="fw-semibold text-danger mb-4">
                    Available Quantity: {{ $product->quantity }}
                </p>

                <a
                    href="{{ url('add_cart', $product->id) }}"
                    class="btn btn-primary px-4"
                >
                    Add to Cart
                </a>
            </div>

        </div>
    @else
        <div class="text-center py-5">
            <h3 class="text-danger">Product not found.</h3>
        </div>
    @endisset

</div>

{{-- Info Section --}}
@include('home.info')

@endsection

