<!DOCTYPE html> 
<html>
   
  <head> 
    @include('admin.css')

    <style type="text/css">
      input[type='text']
      {
        width: 400px; 
        height: 40px;
      }

      .div_deg{

        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px ;
      }

      .table_deg{

        text-align: center ;
        margin: auto;
        border: 2px solid yellowgreen; 
        margin-top: 50px ;
        width: 600px ;
      }

      th{

        background-color: skyblue ;
        padding: 15px ;
        font-size: 20px ;
        font-weight: bold ;
        color: white;  
      }

      td{

        color: white  ;
        padding : 10px ;
        border: 1px solid skyblue ;
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
             <div> 
           <form action="{{url('add_category')}}" method="POST">
           @csrf
           <h1 style="color:white;">Add Category</h1>
           <div class="div_deg">


           <input type="text" name="category">
          
           <input type="submit" value="Add Category" class="btn btn-primary">
           </div>
           </form>
          </div>

          <div>
           <!-- Category Table -->
<table class="table_deg table table-bordered table-striped">
    <thead>
        <tr>
            <th>Category Name</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($data as $category)
        <tr>
            <td>{{ $category->category_name }}</td>
            <td style="display:flex; gap:8px; align-items:center;">

                <!-- Edit Button -->
                <button 
                    class="btn btn-success btn-sm"
                    onclick="openEditModal('{{ $category->id }}', '{{ $category->category_name }}')">
                    Edit
                </button>

                <!-- Delete Form -->
                <form action="{{ url('delete_category/'.$category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure you want to delete this category?')">
                        Delete
                    </button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- Edit Category Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="POST" id="editForm">
        @csrf
        @method('PUT')

        <div class="modal-header">
          <h5 class="modal-title">Edit Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
            <input type="text" name="category_name" id="categoryNameInput" class="form-control">
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>

      </form>

    </div>
  </div>
</div>

   <!-- JavaScript files-->

   <script type="text/javascript">
    function confirmation(ev){
        ev.preventDefault();

        var urlToRedirect = ev.currentTarget.getAttribute('action');

        swal({
            title: "Are You Sure to Delete This?",
            text: "This delete will be permanent.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = urlToRedirect;
            }
        });
    }
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" 
integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
 crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('admin_css/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin_css/vendor/popper.js/umd/popper.min.js') }}"></script>
<script src="{{ asset('admin_css/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin_css/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
<script src="{{ asset('admin_css/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admin_css/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('admin_css/js/charts-home.js') }}"></script>
<script src="{{ asset('admin_css/js/front.js') }}"></script>
<script>
function openEditModal(id, name) 
{
    document.getElementById('categoryNameInput').value = name;
    document.getElementById('editForm').action = '/edit_category/' + id;

    var modal = new bootstrap.Modal(document.getElementById('editModal'));
    modal.show();
}
</script>



  </body>
</html>



