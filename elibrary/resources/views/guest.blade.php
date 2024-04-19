<html>
    <head>
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="{{asset('images/apple-icon.png')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}">
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="{{asset('css/boxicon.min.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="{{asset('css/templatemo.css')}}">
        <link rel="stylesheet" href="{{asset('CSS/custom.css')}}">
        <link rel="stylesheet" href="{{asset('CSS/card.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
        
         <style>
             .nav-item1 {
                   padding-right: 450px;
                }
             .nav-item2 {
                    padding-left: 250px;
                }  
                
                .width{
                    width: 90%;
                    margin: 0 auto;
                }
                .position-absolute-top-right {
    position: absolute;
    top: 0;
    right: 0;
    margin: 10px;
}


</style>
    </head>
<br><br>
<h4 class="h2 pb-4 ">Welcome To Our Library !!</h4><br><br>
<div class="service-tag py-5 bg-secondary">
    <div class="col-md-12">
        <ul class="nav d-flex justify-content-center">
            <li class="nav-item mx-lg-4">
                <a class="filter-btn nav-link btn-outline-primary active shadow rounded-pill text-light px-4 light-300" href="/fiction" data-filter=".project">Fiction</a>
            </li>
            <li class="nav-item mx-lg-4">
                <a class="filter-btn nav-link btn-outline-primary rounded-pill text-light px-4 light-300" href="/non-fiction" data-filter=".graphic">NON-FICTION</a>
            </li>
            <li class="filter-btn nav-item mx-lg-4">
                <a class="filter-btn nav-link btn-outline-primary rounded-pill text-light px-4 light-300" href="/technology" data-filter=".ui">TECHNOLOGY</a>
            </li>
            <li class="nav-item mx-lg-4">
                <a class="filter-btn nav-link btn-outline-primary rounded-pill text-light px-4 light-300" href="/science" data-filter=".branding">SCIENCE AND NATURE</a>
            </li>
            <li class="nav-item mx-lg-4">
                <a class="filter-btn nav-link btn-outline-primary rounded-pill text-light px-4 light-300" href="/children" data-filter=".branding">CHILDREN'S BOOKS</a>
            </li>
            <li class="nav-item mx-lg-4">
                <a class="filter-btn nav-link btn-outline-primary rounded-pill text-light px-4 light-300" href="#" data-filter=".branding">OTHERS</a>
            </li>
        </ul>
    </div>
</div>

{{-- Books Table --}}
<br><br>
<h3 class="h3 pb-4 center ">BOOKS</h3>
<table class="table table-hover width">
    <thead>
        <tr>
            <th>BOOK-ID</th>
            <th>TITLE</th>
            <th>AUTHOR</th>
            <th>GENRE</th>
            <th>QUANTITY</th>
            <th>IMAGE</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
        @php
            $index = ($books->currentPage()-1) * $books->perPage() + $loop->iteration;
        @endphp
        <tr>
            <td>{{$index}}</td>
            <td>{{$book->title}}</td>
            <td>{{$book->author}}</td>
            <td>{{$book->genre}}</td>
            <td>{{$book->quantity}}</td>
            <td><img src="pictures/{{$book->image}}" alt="" style="width: 50px; height: 50px; object-fit: contain" alt="books"></td>
           
        </tr>
        @endforeach
    </tbody>
</table>
<br>
{{ $books->links() }}

<div class="navbar align-self-center d-flex position-absolute-top-right">
    <a href="/login" class="nav-link btn btn-sm btn-primary m-2"> Click Here For Login</a>
</div>


