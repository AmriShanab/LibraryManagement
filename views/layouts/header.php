<?php
 $userType = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : null;

?>

<html>
    <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="../../templatemo_561_purple_buzz/assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../templatemo_561_purple_buzz/assets/img/favicon.ico">
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/boxicon.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../../assets/css/templatemo.css">
    <link rel="stylesheet" href="../../Assets/CSS/custom.css">
    <link rel="stylesheet" href="../../Assets/CSS/card.css">
 
    </head>
    <nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand h1" href="index.html">
                <i class='bx bx-buildings bx-sm text-dark'></i>
                <span class="text-dark h4">E</span> <span class="text-primary h4">Library</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="navbar-toggler-success">
                <div class="flex-fill mx-xl-5 mb-2">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-xl-5 text-center text-dark">
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="/../LibraryManagement/views/staff/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="/../LibraryManagement/views/admin/books.php">Books</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="/../LibraryManagement/views/admin/transaction.php">Transation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="/../LibraryManagement/views/admin/users.php">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="/../LibraryManagement/views/admin/book_borrow.php">Book-Borrow</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="/../LibraryManagement/views/admin/return_books.php">Book-Return</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="/../LibraryManagement/views/admin/fines.php">Fines</a>
                        </li> -->
                </div>
                <div class="navbar align-self-center d-flex">   
                    <a class="nav-link" href="/../LibraryManagement/views/auth/login.php"><i class='bx bx-log-out'>LOG-OUT</i></a>
                    <a class="nav-link" href="/../LibraryManagement/views/profile.php"><i class='bx bx-user bx-sm text-primary'></i> Profile</a>

                </div>
            </div>
        </div>
    </nav>
</html>