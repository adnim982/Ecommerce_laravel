@extends('dashboard.layout.layout')

@section('body')

    

<div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3></h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i data-feather="home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">Categories</li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row product-adding">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Settings</h5>
                        </div>
                        <div class="card-body">
                            <div class="digital-add needs-validation">
                               
                                <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        @method('POST')
                                        @if(session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session()->get('succes') }}
                                        </div>
                                    @endif      
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                        <style>
                                           
        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr; /* Two equal columns */
            grid-gap: 20px; /* Gap between grid items */
        }

        .image-container {
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ccc;
            height: 200px;
        }

        .image-container img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .file-upload {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .file-upload input[type="file"] {
            display: none; /* Hide the file input */
        }

        .file-upload label {
            background-color: #ff1100;
            color: #fff;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="validationCustom01" class="mb-1">Name:</label>
                                                <input class="form-control" id="validationCustom01" type="text" name="name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom01" class="mb-1">Main Category</label>
                                            <select name="parent_id" id="" class="form-control">
                                                <option value="">Main Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="validationCustom01" class="mb-1">Description:</label>
                                                <input class="form-control" id="validationCustom01" type="text" name="description">
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label for="validationCustom02" class="mb-1">Image:</label>
                                            <input class="form-control dropify" id="validationCustom02" type="file"
                                                name="image">
                                        </div>
                                    </div>
                                </div>
        
                                         <br><br>
    
<center>
    <button type="submit" class="edit btn btn-success btn-sm" style="width: 150px; height : 50px">Save</button>

</center>

                                    </form>
                                               
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
