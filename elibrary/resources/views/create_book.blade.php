@extends('header')
@section('main')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="/CSS/style.css">
</head>
<body>
    
    <div class="container mt-5">
        <div class="row">
        <h5><i class="bi bi-plus-square-fill"></i> Add NEW Book</h5>
        <hr />
        <nav class="my-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
            </ol>
        </nav>
        
            <form action="store_book" method="post" enctype="multipart/form-data">
                @csrf
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" name="isbn" id="isbn" class="form-control @if ($errors->has('isbn')) {{  'is-invalid'}} @endif" placeholder="Enter Book ISBN" value="{{old('isbn')}}">
                @if ($errors->has('isbn'))
                <div class="invalid-feedback">{{$errors->first("isbn")}}</div>
                @endif
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control @if ($errors->has('title')) {{  'is-invalid'}} @endif" placeholder="Enter Book Title" value="{{old('title')}}">
                        @if ($errors->has('title'))
                        <div class="invalid-feedback">{{$errors->first("title")}}</div>
                        @endif
                        <Label for="author" class="form-label">Author</Label>
                        <input type="text" name="author" id="author" class="form-control @if ($errors->has('author')) {{  'is-invalid'}} @endif" placeholder="Enter Author" value="{{old('author')}}">
                        @if ($errors->has('author'))
                        <div class="invalid-feedback">{{$errors->first("author")}}</div>
                        @endif
                        <Label for="genre" class="form-label">Genre</Label>
                        <input type="text" name="genre" id="genre" class="form-control @if ($errors->has('genre')) {{  'is-invalid'}} @endif" placeholder="Enter genre" value="{{old('genre')}}">
                        @if ($errors->has('genre'))
                        <div class="invalid-feedback">{{$errors->first("genre")}}</div>
                        @endif
                        <label for="category">Category</label>
                            <input type="text" name="category" id="category" class="form-control @if ($errors->has('category')) {{  'is-invalid'}} @endif" placeholder="Enter Your category">
                            @if ($errors->has('category'))
                            <div class="invalid-feedback">{{$errors->first("category")}}</div>
                            @endif
                        </label>
                        <label for="quantity">Quantity</label>
                        <input type="text" name="quantity" id="quantity" class="form-control @if ($errors->has('quantity')) {{  'is-invalid'}} @endif" placeholder="Enter Your quantity">
                        @if ($errors->has('quantity'))
                        <div class="invalid-feedback">{{$errors->first("quantity")}}</div>
                        @endif
                    </label>
                    <label for="image">Book-Image</label>
                    <input type="file" name="image" id="image" class="form-control @if ($errors->has('quantity')) {{  'is-invalid'}} @endif">
                    @if ($errors->has('image'))
                    <div class="invalid-feedback">{{$errors->first("image")}}</div>
                    @endif

                       
                    <div class="mb-3">
                        <button type="submit" class="btn btn-dark">Save Book</button>
                        <button type="reset" class="btn btn-danger">Clear All</button>
                    </div>   
            </form>

            @if ($message=Session::get('success'))
            <div class="alert alert-success alert-dismissable fade-show">
                <strong>Success</strong>{{$message}}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
                
            @endif
        </div>

        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>

@endsection