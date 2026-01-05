<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')

    <style>
        .content-wrapper{
            margin-top: 60px;
        }

        .search-box{
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            margin-left: 50px;
        }

        input[type="search"]{
            width: 500px;
            height: 40px;
        }

        .table-wrapper{
            display: flex;
            justify-content: center;
        }

        table{
            border: 2px solid yellowgreen;
            width: 95%;
        }

        th{
            background: skyblue;
            color: white;
            padding: 15px;
            font-size: 18px;
        }

        td{
            border: 2px solid yellowgreen;
            text-align: center;
            color: white;
            padding: 10px;
            vertical-align: middle;
        }

        .action-btns{
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .pagination-box{
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }

        img{
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
        <div class="container-fluid content-wrapper">

            <!-- 🔍 Search -->
            <form action="{{ url('product_search') }}" method="GET" class="search-box">
                @csrf
                <input type="search" name="search" placeholder="Search product...">
                <button class="btn btn-primary px-4">Search</button>
            </form>

            <!-- 📦 Product Table -->
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($product as $products)
                        <tr>
                            <td>{{ $products->title }}</td>

                            <td>{!! Str::limit($products->description, 50) !!}</td>

                            <td>{{ $products->price }}</td>

                            <td>{{ $products->category }}</td>

                            <td>{{ $products->quantity }}</td>

                            <td>
                                <img src="/products/{{ $products->image }}" width="80" height="80">
                            </td>

                            <td>
                                <div class="action-btns">
                                    <a href="{{ url('edit_product/'.$products->id) }}" class="btn btn-success btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ url('delete_product/'.$products->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this Product?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- 📄 Pagination -->
            <div class="pagination-box">
                {{ $product->links() }}
            </div>

        </div>
    </div>
</div>

</body>
</html>

   <!-- JavaScript files-->
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