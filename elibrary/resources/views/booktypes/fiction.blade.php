@extends('header')
@section('main')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Fiction Books</title>
</head>
<body>

<div class="container mt-4">
    <div class="row">
        <!-- Card 1 -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{asset('images/to kill a mocking bird.webp')}}" class="card-img-top fixed-size-img" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">To Kill a Mockingbird</h5>
                    <p class="card-text">Harper Lee</p>
                    <a href="../admin/book_borrow.php" class="btn btn-primary">Borrow</a>

                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{asset('images/Pride-and-Prejudice3.webp')}}" class="card-img-top fixed-size-img" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">Pride and Prejudice</h5>
                    <p class="card-text">Jane Auston</p>
                    <a href="../admin/book_borrow.php" class="btn btn-primary">Borrow</a>

                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{asset('images/catcher in the rye.jpeg')}}" class="card-img-top fixed-size-img" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">Catcher in the RYE</h5>
                    <p class="card-text">J.D.Salinger</p>
                    {{-- <a href="../admin/book_borrow.php" class="btn btn-primary">Borrow</a> --}}

                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{asset('images/animal farm 2.jpg')}}" class="card-img-top fixed-size-img" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">Animal Farm</h5>
                    <p class="card-text">George Orwell</p>
                    <a href="../admin/book_borrow.php" class="btn btn-primary">Borrow</a>

                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{asset('images/Brave-new-2048x2048_grande.webp')}}" class="card-img-top fixed-size-img" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">Brave New World</h5>
                    <p class="card-text">Aldous Huxley</p>
                    <a href="../admin/book_borrow.php" class="btn btn-primary">Borrow</a>

                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{asset('images/Book_cover.jpeg')}}" class="card-img-top fixed-size-img" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">THE HOBBIT</h5>
                    <p class="card-text">J.R.R.Tolikien</p>
                    <a href="../admin/book_borrow.php" class="btn btn-primary">Borrow</a>

                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{asset('images/frankenstein_cover-print.jpg')}}" class="card-img-top fixed-size-img" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">Frankenstein</h5>
                    <p class="card-text">Mary Shelley</p>
                    <a href="../admin/book_borrow.php" class="btn btn-primary">Borrow</a>

                </div>
            </div>
        </div>
       
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{asset('images/great.webp')}}" class="card-img-top fixed-size-img" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">The Great Gatsby</h5>
                    <p class="card-text">F.Scott Fitzgerald</p>
                    <a href="../admin/book_borrow.php" class="btn btn-primary">Borrow</a>

                </div>
            </div>
        </div>

        

        <!-- Card 10 -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{asset('images/1994.webp')}}" class="card-img-top fixed-size-img" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">Nineteen Eighty-Four</h5>
                    <p class="card-text">George Orwell</p>                    <a href="../admin/book_borrow.php" class="btn btn-primary">Borrow</a>


                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection