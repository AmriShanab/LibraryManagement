@extends('header')
@section('main')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/CSS/style.css">
    <style>
        
        .form-container {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }
        .form-title {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="form-container">
                    <h5 class="form-title"><i class="bi bi-plus-square-fill"></i> Borrow a Book</h5>
                    <form action="/store_book_borrow" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <select name="title" id="title" class="form-control @if ($errors->has('title')) {{ 'is-invalid' }} @endif">
                                <option value="">Select a Title</option>
                                @foreach ($books as $book)
                                    <option value="{{ $book->title }}" {{ old('title') == $book->title ? 'selected' : '' }}>{{ $book->title }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('title'))
                            <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="book_id" class="form-label">Book ID</label>
                            <input type="text" name="book_id" id="book_id" class="form-control @error('book_id') is-invalid @enderror" placeholder="Enter Book ID" value="{{ old('book_id') }}">
                            @error('book_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="user_id" class="form-label">User ID</label>
                            <input type="text" name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror" placeholder="Enter User ID" value="{{ old('user_id') }}">
                            @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="borrow_date" class="form-label">Borrow Date</label>
                            <input type="date" name="borrow_date" id="borrow_date" class="form-control @error('borrow_date') is-invalid @enderror" value="{{ old('borrow_date') }}">
                            @error('borrow_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="return_date" class="form-label">Return Date</label>
                            <input type="date" name="return_date" id="return_date" class="form-control @error('return_date') is-invalid @enderror" value="{{ old('return_date') }}">
                            @error('return_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-dark">Save Book</button>
                            <button type="reset" class="btn btn-danger">Clear All</button>
                        </div>
                    </form>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success:</strong> {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#title').change(function() {
            console.log('Title changed');
            var selectedTitle = $(this).val(); 
            $.ajax({
                type: 'GET',
                url: '/get-book-id', 
                data: {
                    title: selectedTitle
                },
                success: function(response) {
                    console.log(response);
                    $('#book_id').val(response.book_id);
                },
                error: function(xhr, status, error) {
                    console.error("AJAX request failed:", error);
                }
            });
        });
        var loggedInUserId = "{{ auth()->id() }}";
        $('#user_id').val(loggedInUserId);
    });
</script>

@endsection
