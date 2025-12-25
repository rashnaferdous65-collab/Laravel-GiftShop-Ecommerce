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

           
           <form action="{{url('upload_product')}}" method="POST"  enctype="multipart/form-data">
            @csrf
             <div class="input_div">
                <label for="">Enter the Product Title</label>
      <input type="title" name="title" required>
       </div>
       <div class="input_div">
       <label for="">Enter the Product Description </label>
      <textarea name="description" required></textarea>
       </div>
         <div class="input_div">
      <label for="">Enter the Product Price</label>
      <input type="text" name="price" required>
       </div>
        <div class="input_div">
      <label for="">Enter the Product Category</label>
      <select name="category" id="" required><option value=""> Select a Option</option>
       @foreach($category as $category)

      <option value=" {{$category->category_name}}"> {{$category->category_name}}</option>
       @endforeach
    </select>
       </div>
         <div class="input_div">
       <label for="">Enter the Product Quantity</label>
      <input type="number" name="quantity" required>
        </div>
          <div class="input_div">
      <label for="">Enter the Product Image</label>
      <input type="file" name="image">
        </div>
       
      

        <label for="">Click Here for Submit</label>
        <input class="btn btn-success submit_div" type="submit" value="Add Product" >
      
       
    
         </form>
          </div>
          
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








































    