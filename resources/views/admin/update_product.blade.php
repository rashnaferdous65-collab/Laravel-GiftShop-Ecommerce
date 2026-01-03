<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')

    <style>
        .product-wrapper{
            margin-top: 60px;
            display: flex;
            justify-content: center;
        }

        .product-card{
            width: 600px;
            background: #1f1f1f;
            padding: 30px;
            border-radius: 8px;
        }

        .form-group{
            margin-bottom: 18px;
        }

        .form-group label{
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select{
            width: 100%;
            padding: 8px;
        }

        .current-img img{
            margin-top: 10px;
            border-radius: 4px;
        }
    </style>
</head>

<body>
<header class="header">
    @include('admin.header')
</header>

@include('admin.slide')

<div class="page-content">
    <div class="container-fluid">

        <div class="product-wrapper">
            <div class="product-card">

                <form action="{{ url('update_product/'.$product->id) }}" 
                      method="POST" 
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" name="title" value="{{ $product->title }}" required>
                    </div>

                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea name="description" required>{{ $product->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Product Price</label>
                        <input type="text" name="price" value="{{ $product->price }}" required>
                    </div>

                    <div class="form-group">
                        <label>Product Category</label>
                        <select name="category" required>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->category_name }}"
                                    {{ $product->category == $cat->category_name ? 'selected' : '' }}>
                                    {{ $cat->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Product Quantity</label>
                        <input type="number" name="quantity" value="{{ $product->quantity }}" required>
                    </div>

                    <div class="form-group current-img">
                        <label>Current Image</label>
                        <img width="150" src="/products/{{ $product->image }}" alt="">
                    </div>

                    <div class="form-group">
                        <label>Change Image</label>
                        <input type="file" name="image">
                    </div>

                    <button type="submit" class="btn btn-success w-100">
                        Update Product
                    </button>

                </form>

            </div>
        </div>

    </div>
</div>
</body>
</html>


    <!-- JavaScript files -->
    <script src="{{ asset('admin_css/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_css/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admin_css/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin_css/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admin_css/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_css/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin_css/js/charts-home.js') }}"></script>
    <script src="{{ asset('admin_css/js/front.js') }}"></script>
</body>
</html>

