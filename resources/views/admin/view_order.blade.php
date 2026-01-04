<!DOCTYPE html>
<html>
<head>
    @include('admin.css')

    <style>
        body{
            background-color: #1f1f1f;
        }

        .search-box{
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        input[type='search']{
            width: 400px;
            height: 42px;
            border-radius: 5px;
            padding-left: 15px;
            border: none;
        }

        .order-wrapper{
            display: flex;
            justify-content: center;
        }

        .order-table{
            border-collapse: collapse;
            width: 95%;
            background-color: #2b2b2b;
            border-radius: 10px;
            overflow: hidden;
        }

        th{
            background-color: #0d6efd;
            color: white;
            padding: 14px;
            font-size: 16px;
            text-align: center;
        }

        td{
            padding: 12px;
            text-align: center;
            color: #f1f1f1;
            border-bottom: 1px solid #444;
            vertical-align: middle;
        }

        tr:hover{
            background-color: #3a3a3a;
        }

        .order-img{
            border-radius: 6px;
            border: 1px solid #555;
        }

        .action-btns{
            display: flex;
            justify-content: center;
            gap: 8px;
        }

        .pagination-box{
            display: flex;
            justify-content: center;
            margin: 40px 0;
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

        <!-- Search -->
        <div class="search-box">
            <form action="{{ url('product_search') }}" method="GET">
                @csrf
                <input type="search" name="search" placeholder="Search product...">
                <button type="submit" class="btn btn-primary ms-2 px-4">Search</button>
            </form>
        </div>

        <!-- Order Table -->
        <div class="order-wrapper">
            <table class="order-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th>Change Status</th>
                        <th>Invoice</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($data as $order)
                    <tr>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->rec_address }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->product->title ?? 'No Product Found' }}</td>
                        <td>{{ $order->product->price ?? 'No Price Found' }}</td>

                        <td>
                            <img src="/products/{{ $order->product->image ?? '' }}"
                                 width="70" height="70"
                                 class="order-img"
                                 alt="No Image">
                        </td>

                        <td>{{ $order->payment_status }}</td>

                        <td>
                            @if ($order->status == 'Deliverd')
                                <span class="badge bg-success">Delivered</span>
                            @else
                                <span class="badge bg-warning text-dark">{{ $order->status }}</span>
                            @endif
                        </td>

                        <td>
                            <div class="action-btns">
                                <a href="{{ route('on_the_way', $order->id) }}"
                                   class="btn btn-danger btn-sm">
                                    On the way
                                </a>

                                <form action="{{ route('delivered', ['id' => $order->id]) }}"
                                      method="POST">
                                    @csrf
                                    <button class="btn btn-success btn-sm">
                                        Delivered
                                    </button>
                                </form>
                            </div>
                        </td>

                        <td>
                            <a href="{{ url('print_pdf/'.$order->id) }}"
                               class="btn btn-info btn-sm">
                                Print PDF
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination-box">
            {{ $data->links() }}
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