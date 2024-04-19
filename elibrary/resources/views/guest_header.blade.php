
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

</style>
    </head>
    <nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand h1" href="index.html">
                <i class='bi bi-buildings-fill'></i>
                <span class="text-dark h4">E</span> <span class="text-primary h4">Library</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="navbar-toggler-success">
                <div class="flex-fill mx-xl-5 mb-2">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-xl-5 text-center text-dark">
                        
                        <li class="nav-item2">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="{{Route('home.index')}}">Home</a>
                        </li>
                        <li class="nav-item1">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="{{Route('books.index')}}">Books</a>
                        </li>
                     
                    </ul>
                </div> --}}
                <div class="navbar align-self-center d-flex">
                 
                   
                    <a class="nav-link" href="/login"><i class='bi bi-box-arrow-right'></i></a>
                </div>
            </div>
        </div>
    </nav>
</html>