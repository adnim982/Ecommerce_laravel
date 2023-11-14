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
                            <li class="breadcrumb-item active">Edit</li>
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
                               
                                <form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        @method('put')
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
                                        
                                        <div class="grid-container">
                                            <div class="form-group">
                                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                                    Category Name</label>
                                                <input class="form-control" id="validationCustom02" type="text" name="name" value="{{$category->name}}">
                                            </div>
                                            @if ($category->child_count < 1)
                                            <div class="form-group">
                                                <label for="validationCustom01" class="mb-1">Main Catgory </label>
                                                <select name="parent_id" id="" class="form-control">
                                                    <option value="" @if ($category->parent_id == null) selected @endif>Main Catgory</option>
                                                    @foreach ($mainCategories as $item)
                                                    @if ($item->id != $category->id)
                                                        <option value="{{ $category->id }}"  @if ($item->id == $category->parent_id) selected @endif>{{ $item->name }}</option>
                                                        @endif
                                                        @endforeach

                                                </select>
                                            </div>
                                            @else
                                            <h5 style="color:red">Sorry you cant edit the parent because he is the father of other</h5>
                                            @endif
                                            
                                            
                                            <div class="form-group">
                                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                                    Category Description</label>
                                                <input class="form-control" id="validationCustom02" type="text" name="description" value="{{$category->description}}">
                                            </div>
                                            {{-- another form --}}
                                            <center>
                                                {{-- if user make a picture send to database else send the old one  --}}

                                                <div class="form-group">

                                                    <input type="file" class="dropify" data-default-file="{{ asset($category->image) }}" name="image" />
                                                
                                                </div>
                                            </center>
                                            
                                            <script>
                                                $(document).ready(function () {
                                                    $('.dropify').dropify();
                                                });
                                            </script>
                                         <br><br>
    
<center>
    <button type="submit" class="edit btn btn-success btn-sm" style="width: 150px; height : 50px">Update</button>

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
