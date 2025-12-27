<!DOCTYPE html>
<html>
<head>
    @include('admin.css')

    <style>
        .category-wrapper{
            margin: 40px auto;
            max-width: 800px;
        }

        .category-card{
            background:#2a2f34;
            padding:25px;
            border-radius:10px;
            box-shadow:0 5px 20px rgba(0,0,0,0.4);
        }

        .category-card h2{
            color:#fff;
            text-align:center;
            margin-bottom:20px;
        }

        .category-form{
            display:flex;
            gap:10px;
            justify-content:center;
            margin-bottom:30px;
        }

        .category-form input[type="text"]{
            width:350px;
            height:42px;
        }

        table{
            width:100%;
            text-align:center;
        }

        th{
            background:#0dcaf0;
            color:#fff;
            padding:12px;
            font-size:18px;
        }

        td{
            padding:10px;
            color:#fff;
            border:1px solid #0dcaf0;
        }

        .action-btns{
            display:flex;
            justify-content:center;
            gap:8px;
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

        <div class="category-wrapper">
            <div class="category-card">

                <!-- Add Category -->
                <h2>Add Category</h2>

                <form action="{{ url('add_category') }}" method="POST">
                    @csrf
                    <div class="category-form">
                        <input type="text" name="category" placeholder="Enter category name">
                        <button type="submit" class="btn btn-primary">
                            Add
                        </button>
                    </div>
                </form>

                <!-- Category Table -->
                <table class="table table-bordered table-striped">
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
                            <td>
                                <div class="action-btns">

                                    <button class="btn btn-success btn-sm"
                                        onclick="openEditModal('{{ $category->id }}','{{ $category->category_name }}')">
                                        Edit
                                    </button>

                                    <form action="{{ url('delete_category/'.$category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this category?')">
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
        </div>

    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
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
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
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



