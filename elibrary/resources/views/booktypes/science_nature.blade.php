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
        {{--  Card 1 --}}
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="{{asset('images/brief.jpeg')}}" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">A brief history of time</h5>
                    <p class="card-text">Stephen Hawking</p>
                </div>
            </div>
        </div>

        {{--  Card 2  --}}
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="{{asset('images/sapiens.webp')}}" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">Sapiens : A Brief History was Humankind</h5>
                    <p class="card-text">Yuval Noah Harari</p>
                </div>
            </div>
        </div>

        {{--  Card 3  --}}
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="{{asset('images/origin2.jpg')}}" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">The Origin of Species </h5>
                    <p class="card-text">Charles Darwin</p>
                </div>
            </div>
        </div>
        {{-- Card 4 --}}
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="{{asset('images/cosmos.jpg')}}" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">Cosmos</h5>
                    <p class="card-text">Harl Sagan</p>
                </div>
            </div>
        </div>
        {{-- Card 5 --}}
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="{{asset('images/selfish.webp')}}" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">The Selfish Gene</h5>
                    <p class="card-text">Richard Dawkins</p>
                </div>
            </div>
        </div>
        {{-- Card 6 --}}
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="{{asset('images/silent-spring-first-edition-signed-rare-2.webp')}}" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">Silent Spring</h5>
                    <p class="card-text">Rachel Carson</p>
                </div>
            </div>
        </div>
        {{-- Card 7 --}}
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="{{asset('images/The-Sixth-Extinction-An-Unnatural-History-by-Elizabeth-Kolbert.jpg')}}" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">The Sixth Extinction: An Unnatural History</h5>
                    <p class="card-text">Elizabeth Kolbert</p>
                </div>
            </div>
        </div>
       {{-- Card 8 --}}
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="{{asset('images/guns2.jpeg')}}" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">Guns, Germs, and Steel: The Fates of Human Societies</h5>
                    <p class="card-text"> Jared Diamond</p>
                </div>
            </div>
        </div>

        {{-- Card 9 --}}
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="{{asset('images/treees.jpg')}}" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">The hidden life of Trees</h5>
                    <p class="card-text">Peter</p>
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
