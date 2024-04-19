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
            <div class="card books">
                <img src="{{asset('images/harry2.jpg')}}" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">Harry Poter and Philospher Stone</h5>
                    <p class="card-text">J.K.Rowling</p>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="{{asset('images/Chocolatefactory-600x600.jpg')}}" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">Charlie and the Choclate Factory</h5>
                    <p class="card-text">Roald Dahl</p>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="{{asset('images/The+Lion,+the+Witch,+and+the+Wardrobe.jpeg')}}" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">The Chronicles of Narnia: The Lion, the Witch and the Wardrobe </h5>
                    <p class="card-text">C.S.Lewis</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="{{asset('images/matilda.webp')}}" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">Matilda</h5>
                    <p class="card-text">Road Dahl</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="{{asset('images/winnie-book_1024x1024.webp')}}" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">Winnie-the-Pooh</h5>
                    <p class="card-text">A.A.Milne</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="{{asset('images/cat.webp')}}" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">The Cat in the Hat</h5>
                    <p class="card-text">Dr.Seuss</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="{{asset('images/where-the-wild-things-are-activities-interactive-read-aloud-1024x1024.jpg')}}" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">Where the Wild Things are</h5>
                    <p class="card-text">Maurice Sendak</p>
                </div>
            </div>
        </div>
       
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="{{asset('images/alice-in-wonderland-manuscript.jpg')}}" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">Alice's Adventures in Wonderland</h5>
                    <p class="card-text">Lewis.Carroll</p>
                </div>
            </div>
        </div>

        

        <!-- Card 10 -->
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="{{asset('images/ai.webp')}}" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">Artifical Intelligence</h5>
                    <p class="card-text">Stuart Russell and Peter Norvig</p>
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