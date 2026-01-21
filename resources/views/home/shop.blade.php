<!-- shop section -->

<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2 style="font-size:50px; font-weight:bold;">Latest Products</h2>
        </div>

        <div class="row">

            @if(!empty($product) && $product->count() > 0)
                @foreach($product as $item)
                    @if(is_object($item)) 
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="box">

                                <div class="img-box">
                                    @if(!empty($item->image) && file_exists(public_path('products/' . $item->image)))
                                        <img src="{{ asset('products/' . $item->image) }}" alt="{{ $item->title }}">
                                    @else
                                        <img src="{{ asset('images/default.png') }}" alt="Product Image Not Found">
                                    @endif
                                </div>

                                <div class="detail-box">
                                    <a href="{{ url('product_details', $item->id) }}">
                                        {{ $item->title }}
                                    </a>
                                    <span>৳ {{ $item->price }}</span>
                                </div>

                                <div style=" display: flex;  gap: 10px;">
                                    <a href="{{ url('product_details', $item->id) }}" class="btn btn-secondary text-white mt-1" style="flex-grow: 1;" >
                                        View Details
                                    </a>
                                <a href="{{ url('add_cart', $item->id) }}" class="btn btn-primary text-white" >Add to Cart</a>
                                </div>

                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <p class="text-center">No products found.</p>
            @endif

        </div>
    </div>
</section>

