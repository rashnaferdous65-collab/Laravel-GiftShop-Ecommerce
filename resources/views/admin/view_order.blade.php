<!DOCTYPE html> 
<html>
  <head> 
    @include('admin.css')

    <style>

        .div_deg{


            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;

        }


        .table_deg{


            border:2px solid  yellowgreen ;
      
        }

        th{


            background-color: skyblue ;
            color: white ;
            font-size: 19px ;
            font-weight: bold ;
            padding: 15px ;
        
        }

        td{

        border:2px solid  yellowgreen ;
        text-align: center ;
        color: white;  

        }

        .pagi_deg{

           display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px; 
        }
        .action-cell {
    border-top: none;     
    border-bottom: none;
    margin-top: 30px ;

        }

        input[type='search']{
            width: 500px ;
            height: 40px ;
            margin-left: 50px ;
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
            
      <form action="{{url('product_search')}}" method="GET">
    @csrf
    <input type="search" name="search">
    <input type="submit" value="search" class="btn btn-primary py-2 px-4">
</form>
    
<div class="div_deg">
    <table class="table_deg">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Image</th>
                  <th>Payment Status</th>
                <th>Status</th>
                <th> Change Status</th>
                <th>Print PDF</th>
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
                    <img src="/products/{{ $order->product->image ?? '' }}" width="80" height="80" alt="No Image Found">
                   
                          <td>{{ $order->payment_status }}</td>
          <td>
    @if ($order->status == 'Deliverd')
        Delivered 
    @else
        {{ $order->status }}
    @endif
</td>
                <td style="vertical-align: middle; display:flex; gap:10px;" class="action-cell">
                    <!-- On the way Button -->
                   <a href="{{ route('on_the_way', $order->id) }}" class="btn btn-danger btn-sm">On the way</a>

                  <!-- Delivered Button -->
<form action="{{ route('delivered', ['id' => $order->id]) }}" method="POST" style="display:inline-block;">
    @csrf
    <button type="submit" class="btn btn-success btn-sm">
        Delivered
    </button>
</form>

                    
                </td>
                <td>

                 <!-- Print PDF button -->
                    <a href="{{ url('print_pdf/'.$order->id) }}" class="btn btn-info btn-sm">Print PDF</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Pagination links -->
<div class="pagi_deg">
    {{ $data->links() }}
</div>

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