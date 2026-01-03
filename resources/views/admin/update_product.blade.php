<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
    .product_div{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
        flex-direction: column;
    }

    .product_div div{
        margin-bottom: 15px;
    }

    label{
        display:block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input, textarea, select{
        width: 500px;
        padding: 8px;
    }

    .submit_div{

        width: 200px ;
    }
    </style>
</head>
<body>
    <header class="header">
        @include('admin.header')
    </header>

    <!-- Sidebar Navigation-->
    @include('admin.slide')
    <!-- Sidebar Navigation end-->

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
         <div class="product_div">
<form action="{{ url('update_product/'.$product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="input_div">
        <label>Edit the Product Title</label>
        <input type="text" name="title" value="{{ $product->title }}" required>
    </div>

    <div class="input_div">
        <label>Edit the Product Description</label>
        <textarea name="description" required> {{ $product->description }}</textarea>
    </div>

    <div class="input_div">
        <label>Edit the Product Price</label>
        <input type="text" name="price" value="{{ $product->price }}" required>
    </div>

  <div class="input_div">
    <label>Edit the Product Category</label>
    <select name="category" required>
     
        @foreach($categories as $cat)
            <option value="{{ $cat->category_name }}" 
                @if($product->category == $cat->category_name) selected @endif>
                {{ $cat->category_name }}
            </option>
        @endforeach
    </select>
</div>

    <div class="input_div">
        <label>Edit the Product Quantity</label>
        <input type="number" name="quantity" value="{{ $product->quantity }}" required>
    </div>
    <div class="input_div">

    <label for="">Current Image</label>
    <img width="150" src="/products/{{$product->image}}" alt="">
    </div>
    <div class="input_div">
        <label>New Image</label>
        <input type="file" name="image">
    </div>

    <button type="submit" class="btn btn-success">Update Product</button>
</form>



         
          </div>
            </div>
        </div>
    </div>

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

