<!DOCTYPE html> 
<html>
  <head> 
    @include('admin.css')
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
               
           @include('admin.body')
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