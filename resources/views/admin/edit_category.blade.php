<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')

    <style>
        .category-card {
            max-width: 600px;
            margin: 60px auto;
            background: #2a2f34;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.4);
        }

        .category-card h1 {
            color: #fff;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            color: #ddd;
            margin-bottom: 8px;
            display: block;
        }

        .form-group input {
            width: 100%;
            height: 45px;
            border-radius: 6px;
            border: none;
            padding: 0 15px;
            font-size: 15px;
        }

        .btn-area {
            text-align: center;
            margin-top: 25px;
        }

        .btn-area input {
            padding: 10px 30px;
            font-size: 16px;
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

        <div class="category-card">
            <form action="{{ url('add_category') }}" method="POST">
                @csrf

                <h1>Edit Category</h1>

                <div class="form-group">
                    <label>Category Name</label>
                    <input 
                        type="text" 
                        name="category" 
                        placeholder="Enter Category Name"
                        required
                    >
                </div>

                <div class="btn-area">
                    <input 
                        type="submit" 
                        value="Add Category" 
                        class="btn btn-primary"
                    >
                </div>

            </form>
        </div>

    </div>
</div>

</body>
</html>


    <!-- Scripts -->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
</body>
</html>

