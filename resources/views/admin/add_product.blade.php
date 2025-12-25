<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')

    <style>
        /* Page center */
        .product-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        /* Dark form box */
        .product-form {
            background: #1e1e2f;
            padding: 30px 40px;
            border-radius: 10px;
            width: 600px;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
        }

        .product-form h2 {
            color: #ffffff;
            text-align: center;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            color: #cccccc;
            margin-bottom: 6px;
            display: block;
            font-weight: 600;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: none;
            outline: none;
            background: #2b2b3d;
            color: #ffffff;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        input::placeholder {
            color: #999;
        }

        input[type="file"] {
            background: none;
            color: #cccccc;
        }

        .submit-btn {
            width: 100%;
            margin-top: 10px;
            padding: 10px;
            font-size: 16px;
            border-radius: 6px;
        }
    </style>
</head>

<body>

<header class="header">
    @include('admin.header')
</header>

@include('admin.slide')

<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">

            <div class="product-wrapper">
                <form class="product-form"
                      action="{{ url('upload_product') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    <h2>Add New Product</h2>

                    <div class="form-group">
                        <label>Enter the Product Title</label>
                        <input type="text" name="title" required>
                    </div>

                    <div class="form-group">
                        <label>Enter the Product Description</label>
                        <textarea name="description" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Enter the Product Price</label>
                        <input type="text" name="price" required>
                    </div>

                    <div class="form-group">
                        <label>Enter the Product Category</label>
                        <select name="category" required>
                            <option value="">Select an Option</option>
                            @foreach($category as $category)
                                <option value="{{ $category->category_name }}">
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Enter the Product Quantity</label>
                        <input type="number" name="quantity" required>
                    </div>

                    <div class="form-group">
                        <label>Enter the Product Image</label>
                        <input type="file" name="image">
                    </div>

                    <input type="submit"
                           value="Add Product"
                           class="btn btn-success submit-btn">
                </form>
            </div>

        </div>
    </div>
</div>

<!-- JS -->
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









































    