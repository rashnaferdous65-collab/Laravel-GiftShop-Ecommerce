<!-- shop section -->
<section class="shop_section layout_padding">
    <div class="container">

        <div class="heading_container heading_center">
            <h2 class="fw-bold" style="font-size:50px;">Latest Products</h2>
        </div>

        <div class="row">

            @forelse($product ?? [] as $item)

                @continue(!is_object($item))

                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="box h-100">

                        {{-- Image --}}
                        <div class="img-box">
                            @php
                                $imagePath = !empty($item->image) && file_exists(public_path('products/'.$item->image))
                                    ? asset('products/'.$item->image)
                                    : asset('images/default.png');
                            @endphp

                            <img src="{{ $imagePath }}" alt="{{ $item->title }}">
                        </div>

                        {{-- Details --}}
                        <div class="detail-box">
                            <a href="{{ url('product_details', $item->id) }}">
                                {{ $item->title }}
                            </a>
                            <span>৳ {{ $item->price }}</span>
                        </div>

                        {{-- Buttons --}}
                        <div class="d-flex gap-2 mt-2">
                            <a href="{{ url('product_details', $item->id) }}"
                               class="btn btn-secondary text-white flex-fill">
                                View Details
                            </a>

                            <a href="{{ url('add_cart', $item->id) }}"
                               class="btn btn-primary text-white">
                                Add to Cart
                            </a>
                        </div>

                    </div>
                </div>

            @empty
                <p class="text-center mt-4">No products found.</p>
            @endforelse

        </div>
    </div>
</section>


