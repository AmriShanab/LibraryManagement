<?php
//   session_start();

 // Check if the 'user_type' session variable is set
 $userType = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : null;
//  var_dump($_SESSION);

//  echo "User Type: " . $userType; // Add this line for debugging
?>

<html>
    <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="../../templatemo_561_purple_buzz/assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../templatemo_561_purple_buzz/assets/img/favicon.ico">
    <!-- Load Require CSS -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font CSS -->
    <link href="../../assets/css/boxicon.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="../../assets/css/templatemo.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../Assets/CSS/custom.css">
    <link rel="stylesheet" href="../../Assets/CSS/card.css">
    <style>
    .nav-item1 {
    
        padding-right: 250px;
    }
    .nav-item2 {
        padding-left: 250px;
    }

</style>
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
                        
                        <li class="nav-item2">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="/../LibraryManagement/views/index.php">Home</a>
                        </li>
                        <li class="nav-item1">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="/../LibraryManagement/views/admin/books.php">Books</a>
                        </li>
                     
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                 
                   
                    <a class="nav-link" href="/../LibraryManagement/views/auth/login.php"><i class='bx bx-user-circle bx-sm text-primary'></i></a>
                </div>
            </div>
        </div>
    </nav>
</html>