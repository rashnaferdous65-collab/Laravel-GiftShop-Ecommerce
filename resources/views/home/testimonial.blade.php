@extends('layouts.app')

@section('title', 'Giftshop - That is what makes you surprised.')

@section('content')

<!-- Hero Area -->
<div class="hero_area">
    @include('home.header')
</div>

<!-- Testimonial Section -->
<section class="client_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Testimonial</h2>
        </div>
    </div>

    <div class="container px-0">
        <div id="customCarousel2" class="carousel carousel-fade" data-ride="carousel">
            <div class="carousel-inner">

                <!-- Item 1 -->
                <div class="carousel-item active">
                    <div class="box">
                        <div class="client_info">
                            <div class="client_name">
                                <h5>Morijorch</h5>
                                <h6>Default model text</h6>
                            </div>
                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                        </div>
                        <p>
                            Editors now use Lorem Ipsum as their default model text, and a search
                            for 'lorem ipsum' will uncover many web sites still in their infancy.
                        </p>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="carousel-item">
                    <div class="box">
                        <div class="client_info">
                            <div class="client_name">
                                <h5>Rochak</h5>
                                <h6>Default model text</h6>
                            </div>
                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                        </div>
                        <p>
                            Various editors now use Lorem Ipsum as their default model text, and a
                            search for 'lorem ipsum' will uncover many web sites still in their infancy.
                        </p>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="carousel-item">
                    <div class="box">
                        <div class="client_info">
                            <div class="client_name">
                                <h5>Brad Johns</h5>
                                <h6>Default model text</h6>
                            </div>
                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                        </div>
                        <p>
                            Editors now use Lorem Ipsum as their default model text, and a search
                            for 'lorem ipsum' will uncover many web sites still in their infancy.
                        </p>
                    </div>
                </div>

            </div>

            <!-- Carousel Controls -->
            <div class="carousel_btn-box">
                <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>
</section>
<!-- End Testimonial Section -->

<!-- Info / Footer Section -->
@include('home.info')

@endsection
