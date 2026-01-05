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

 
>

            <td style="vertical-align: middle; display:flex; gap:10px;" class="action-cell" >

                <!-- Edit Button -->
               <a href="{{ url('edit_product/'.$products->id) }}" class="btn btn-success btn-sm"> Edit</a>

                <!-- Delete Button -->
                <form action="{{ url('delete_product/'.$products->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure you want to delete this Product?')">
                        Delete
                    </button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>


        
         </div>

         <div class="pagi_deg">  {{$product->links()}} </div>
         
          </div>
      </div>
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