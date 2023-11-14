@extends('dashboard.layout.layout')

@section('body')
<div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Site Settings</h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i data-feather="home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Site Settings</li>
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
                               
                                <form action="{{ route('settings.update', $setting->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        @method('put')
                                        @if(session()->has('succes'))
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
                                           
                                                <input type="file" class="dropify" data-default-file="{{ asset($setting->logo) }}" name="logo" />
                                            
                                        </div>
                                        <script>
                                            $(document).ready(function () {
                                                $('.dropify').dropify();
                                            });
                                        </script>
                                     
                                        
                                        
                                        <div class="form-group">
                                            <label class="col-form-label">Favicon</label>
                                            <input class="form-control" id="validationCustom05" type="file" name="favicon" onchange="displaySelectedImage()">
                                        </div>
                                        <img id="selectedImage" style="display: none; max-width: 100px; max-height: 100px;" />
                                        
                                        <script>
                                            function displaySelectedImage() {
                                                const input = document.getElementById("validationCustom05");
                                                const image = document.getElementById("selectedImage");
                                        
                                                if (input.files && input.files[0]) {
                                                    const reader = new FileReader();
                                        
                                                    reader.onload = function (e) {
                                                        image.src = e.target.result;
                                                        image.style.display = "block"; // Display the image
                                                    };
                                        
                                                    reader.readAsDataURL(input.files[0]);
                                                }
                                            }
                                        </script>
                                           <style>
                                            .circle-image {
                                                width: 100px; /* Adjust the width and height as needed for the desired size */
                                                height: 100px;
                                                border-radius: 50%; /* Create a circular shape with border-radius */
                                                overflow: hidden; /* Clip any content outside the circular shape */
                                            }
                                    
                                            .circle-image img {
                                                width: 100%; /* Ensure the image covers the entire circular shape */
                                                height: 100%;
                                                object-fit: cover; /* Resize the image to cover the circle */
                                            }
                                        </style>
                                    <div class="circle-image">
                                        <img src="{{ $setting->favicon }}"  alt="Description of your image">
                                    </div>

                                        
                                        <div class="form-group">
                                            <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>
                                                Website Name</label>
                                            <input class="form-control" id="validationCustom01" type="text" name="title" value="{{$setting->title}}">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-form-label">Website Description</label>
                                            <textarea rows="5" cols="12" name="description">{{$setting->description}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom02" class="col-form-label"><span>*</span>
                                                Email Address</label>
                                            <input class="form-control" id="validationCustom02" type="text" name="email" value="{{$setting->email}}">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="validationCustomtitle" class="col-form-label pt-0">Phone Number</label>
                                            <input class="form-control" id="validationCustomtitle" type="text" name="phone" value="{{$setting->phone}}">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="validationCustomtitle" class="col-form-label pt-0">Address</label>
                                            <input class="form-control" id="validationCustomtitle" type="text" name="adresse" value="{{$setting->adresse}}">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="validationCustomtitle" class="col-form-label pt-0">Facebook Link</label>
                                            <input class="form-control" id="validationCustomtitle" type="text" name="facebook" value="{{$setting->facebook}}">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div>
                                        
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
