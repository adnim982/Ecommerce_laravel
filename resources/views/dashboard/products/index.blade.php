@extends('dashboard.layout.layout')

@section('body')
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Product Categories</h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i data-feather="home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">Digital</li>
                            <li class="breadcrumb-item active">Sub Category</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                           <a href="{{ route('products.create') }}">
                            <button type="submit" class="btn btn-primary mt-md-0 mt-2">Add New Category</button>
                        </a>
                        </div>

                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="table-responsive table-desi">
                                <table class="table all-package table-category " id="ProductTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Dicount Price </th>
                                            <th>Color</th>
                                            <th>Action</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title f-w-600" id="exampleModalLabel">Add New Category</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1">Name:</label>
                                    <input class="form-control" id="validationCustom01" type="text" name="name">
                                </div>
                                    
                               
                                {{-- <div class="form-group">
                                    <label for="validationCustom01" class="mb-1">Main Category</label>
                                    <select name="parent_id" id="" class="form-control">
                                        <option value="">Main Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="form-group mb-0">
                                    <label for "validationCustom02" class="mb-1">Image:</label>
                                    <input class="form-control dropify" id="validationCustom02" type="file"
                                        name="image">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Save</button>
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    {{-- delete --}}
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this item?
                </div>
               
            </div>
        </div>
    </div>
    
    
    <!-- /.modal-dialog -->
    {{-- delete --}}
@endsection

@push('javascripts')
    <script type="text/javascript">
        $(function() {
            var table = $('#ProductTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('product.getall') }}",
                columns: [

                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'discount_price',
                        name: 'discount_price'
                    },
                    {
                        data: 'color',
                        name: 'color'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        
                    }
                   
                   
                ]
            });
        });

        $('#ProductTable tbody').on('click', '#deleteBtn', function(argument) {
            var id = $(this).attr("data-id");
            console.log(id);
        })
        $(document).ready(function () {
    var itemIdToDelete = null;

    // Store the item ID when the delete button is clicked
    $('#deleteBtn').on('click', function () {
        itemIdToDelete = $(this).data('id');
    });

    // Handle the confirmation dialog "Delete" button click
    $('#confirmDelete').on('click', function () {
        if (itemIdToDelete !== null) {
            // Send an AJAX request to delete the item
            $.ajax({
                url: '/your-delete-endpoint', // Replace with your actual delete endpoint
                type: 'POST', // Adjust the HTTP method as needed (e.g., POST, DELETE)
                data: { id: itemIdToDelete },
                success: function (response) {
                    // Handle success, e.g., remove the item from the UI
                    console.log('Item deleted successfully');
                },
                error: function (xhr, status, error) {
                    // Handle errors, e.g., display an error message
                    console.error('Error deleting item:', error);
                }
            });

            // Clear the stored item ID and hide the modal
            itemIdToDelete = null;
            $('#deletemodal').modal('hide');
        }
    });
});


    </script>
@endpush
