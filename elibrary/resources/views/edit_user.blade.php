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
        <h5><i class="bi bi-pencil-square"></i>Edit User</h5>
        <hr />
        <nav class="my-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Edit User</li>
            </ol>
        </nav>
{{-- Form Edit --}}
            <form action="/users/{{$id}}/update_user" method="post">
                @csrf
                @method('PUT')
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control @if ($errors->has('name')) {{  'is-invalid'}} @endif" placeholder="Enter Name" value="{{old('name',$user->name)}}">
                        @if ($errors->has('name'))
                        <div class="invalid-feedback">{{$errors->first("name")}}</div>
                        @endif
                        <Label for="username" class="form-label">Username</Label>
                        <input type="text" name="username" id="username" class="form-control @if ($errors->has('username')) {{  'is-invalid'}} @endif" placeholder="Enter username" value="{{old('username',$user->username)}}">
                        @if ($errors->has('username'))
                        <div class="invalid-feedback">{{$errors->first("username")}}</div>
                        @endif
                        <Label for="Email" class="form-label">Email</Label>
                        <input type="text" name="email" id="email" class="form-control @if ($errors->has('email')) {{  'is-invalid'}} @endif" placeholder="Enter email" value="{{old('email',$user->email)}}">
                        @if ($errors->has('email'))
                        <div class="invalid-feedback">{{$errors->first("email")}}</div>
                        @endif
                        <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control @if ($errors->has('password')) {{  'is-invalid'}} @endif" placeholder="Enter Your Password">
                            @if ($errors->has('password'))
                            <div class="invalid-feedback">{{$errors->first("password")}}</div>
                            @endif
                        </label>
                        <label for="usertype">UserType</label>
                        <select name="userType" id="usertype">
                            <option value="Student">Student</option>
                            <option value="Staff">Staff</option>
                        </select>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-dark">Update User</button>
                        <button type="reset" class="btn btn-danger">Clear All</button>
                    </div>   
            </form>
{{-- Edit Form End --}}
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
@include('footer');
@endsection