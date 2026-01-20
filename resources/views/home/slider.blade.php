<!-- Slider Section -->
<section class="slider_section">
    <div class="slider_container">
        <div id="homeSlider" class="carousel slide" data-ride="carousel">
            
            <div class="carousel-inner">
                
                <!-- Slider Item -->
                <div class="carousel-item active">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            
                            <!-- Text Content -->
                            <div class="col-md-7">
                                <div class="detail-box">
                                    <h1>
                                        Welcome To Our <br>
                                        Gift Shop
                                    </h1>
                                    <p>
                                        Sequi perspiciatis nulla reiciendis rem, tenetur impedit.
                                        Eveniet non necessitatibus error distinctio mollitia suscipit.
                                    </p>
                                    <a href="{{ url('/contact') }}" class="btn btn-primary">
                                        Contact Us
                                    </a>
                                </div>
                            </div>

                            <!-- Image -->
                            <div class="col-md-5">
                                <div class="img-box">
                                    <img 
                                        src="{{ asset('images/image3.jpeg') }}" 
                                        class="img-fluid slider-img" 
                                        alt="Gift Shop Slider Image"
                                    >
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Slider Item -->

            </div>

        </div>
    </div>
</section>
<!-- End Slider Section -->
