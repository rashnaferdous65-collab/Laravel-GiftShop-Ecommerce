@extends('layouts.app')

@section('title')
    Giftshop-That is what makes you surprised.
@endsection

@section('content')

<div class="hero_area">
    @include('home.header')
</div>

<!-- Contact Section -->
<section class="contact_section layout_padding">
    <div class="container px-0">
        <div class="heading_container">
            <h2>Contact Us</h2>
        </div>
    </div>

    <div class="container container-bg">
        <div class="row">

            <!-- Map Area -->
            <div class="col-lg-7 col-md-6 px-0">
                <div class="map_container">
                    <div class="map-responsive">
                        <iframe
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France"
                            style="border:0; width:100%; height:100%;"
                            allowfullscreen
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-5 col-md-6 px-0">
                <form action="#">
                    <div class="mb-3">
                        <input type="text" placeholder="Name">
                    </div>

                    <div class="mb-3">
                        <input type="email" placeholder="Email">
                    </div>

                    <div class="mb-3">
                        <input type="text" placeholder="Phone">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="message-box" placeholder="Message">
                    </div>

                    <div class="d-flex">
                        <button type="submit">SEND</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
<!-- End Contact Section -->

@include('home.info')

@endsection
