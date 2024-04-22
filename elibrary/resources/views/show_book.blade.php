@extends('header')
@section('main')
<body class="body-clr">
    <div class="container mt-5">
        <div class="row">
            <h5><i class="bi bi-pencil-square"></i>Book Details</h5>
            <nav class="my-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                </ol>
            </nav>
    
            <div class="card book_show">
                 <img src="/pictures/{{ $book->image }}" alt="Book" class="card-img-top book_img"> 
    
                <div class="card-body book_show ">
                    <h5 class="card-title fw-bold">{{$book->title}}</h5>
                    <p class="card-text text-secondary fw-bold text-success">Author : {{$book->author}}</p>
                    <p class="card-text text-secondary fw-bold text-success">Genre : {{$book->genre}}</p>
                    <p class="card-text text-secondary fw-bold text-success">Quantity Available : {{$book->quantity}}</p>
                    
                </div>
            </div> 
</body>
@endsection