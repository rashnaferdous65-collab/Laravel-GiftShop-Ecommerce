@extends('layouts.app')

@section('title', 'Giftshop - That is what makes you surprised.')

@section('content')

    {{-- Hero Area --}}
    <div class="hero_area">
        @include('home.header')
    </div>

    {{-- Why Section --}}
    <section class="why_section layout_padding">
        <div class="container">

            <div class="heading_container heading_center">
                <h2>Why Shop With Us</h2>
            </div>

            <div class="row">

                {{-- Fast Delivery --}}
                <div class="col-md-4">
                    <div class="box">
                        <div class="img-box">
                            {{-- SVG ICON --}}
                            {!! file_get_contents(public_path('icons/delivery.svg')) !!}
                        </div>
                        <div class="detail-box">
                            <h5>Fast Delivery</h5>
                            <p>Variations of passages of Lorem Ipsum available</p>
                        </div>
                    </div>
                </div>

                {{-- Free Shipping --}}
                <div class="col-md-4">
                    <div class="box">
                        <div class="img-box">
                            {!! file_get_contents(public_path('icons/shipping.svg')) !!}
                        </div>
                        <div class="detail-box">
                            <h5>Free Shipping</h5>
                            <p>Variations of passages of Lorem Ipsum available</p>
                        </div>
                    </div>
                </div>

                {{-- Best Quality --}}
                <div class="col-md-4">
                    <div class="box">
                        <div class="img-box">
                            {!! file_get_contents(public_path('icons/quality.svg')) !!}
                        </div>
                        <div class="detail-box">
                            <h5>Best Quality</h5>
                            <p>Variations of passages of Lorem Ipsum available</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- End Why Section --}}

    @include('home.info')

@endsection
