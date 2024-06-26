<?php
  session_start();
 $userType = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : null;
include '../../config.php';
$userStatistics = getUserStatistics($conn);
$totalBooks = getTotalBooks($conn);
$bookStatusStatistics = getBookStatusStatistics($conn);
$bookCategories = getBookCategories($conn);
$currentPage = 'home';
?>
<html>
    <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="../../templatemo_561_purple_buzz/assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../templatemo_561_purple_buzz/assets/img/favicon.ico">
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
                        <?php if($userType === 'Staff') {?>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="/../LibraryManagement/views/index.php">Home</a>
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
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="/../LibraryManagement/views/admin/fines.php">Fines</a>
                        </li>
                        <?php } elseif ($userType === 'Student') { ?>
                            <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="/../LibraryManagement/views/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="/../LibraryManagement/views/admin/books.php">Books</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="/../LibraryManagement/views/admin/book_borrow.php">Book-Borrow</a>
                        </li>
                        <?php }?>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                 
                   
                    <a class="nav-link" href="/../LibraryManagement/views/auth/login.php"><i class='bx bx-log-out'> LOG-OUT</i></a>
                    <a class="nav-link" href="/../LibraryManagement/views/profile.php"><i class='bx bx-user bx-sm text-primary'></i> Profile</a>

                </div>
            </div>
        </div>
    </nav>
<body>  
    <section class="service-wrapper py-3">
        <div class="container-fluid pb-3">
            <div class="row">
                <h2 class="h2 text-center col-12 py-5 semi-bold-600">ABOUT-US</h2>
                <div class="service-header col-2 col-lg-3 text-end light-300">
                <i class='bx bx-book'></i>                </div>
                <div class="service-heading col-10 col-lg-9 text-start float-end light-300">
                    <h2 class="h3 pb-4 typo-space-line">Welcome to E-Library: Empowering Minds, Enriching Lives</h2>
                </div>
            </div>
            <p class="service-footer col-10 offset-2 col-lg-9 offset-lg-3 text-start pb-3 text-muted px-2">
                At E-Library, we believe in the transformative power of knowledge and the boundless possibilities that education opens up. Our digital library is a testament to this vision, providing an online space where readers, learners, and knowledge enthusiasts converge. </p>
        </div>
        <h2 class="h2 text-center col-12 py-5 semi-bold-600">WE SUGGEST BOOKS</h2>

        <div class="service-tag py-5 bg-secondary">
            <div class="col-md-12">
                <ul class="nav d-flex justify-content-center">
                    <li class="nav-item mx-lg-4">
                        <a class="filter-btn nav-link btn-outline-primary active shadow rounded-pill text-light px-4 light-300" href="../../views/book_types/fictions.php" data-filter=".project">Fiction</a>
                    </li>
                    <li class="nav-item mx-lg-4">
                        <a class="filter-btn nav-link btn-outline-primary rounded-pill text-light px-4 light-300" href="../../views/book_types/non_fiction.php" data-filter=".graphic">NON-FICTION</a>
                    </li>
                    <li class="filter-btn nav-item mx-lg-4">
                        <a class="filter-btn nav-link btn-outline-primary rounded-pill text-light px-4 light-300" href="../../views/book_types/technology.php" data-filter=".ui">TECHNOLOGY</a>
                    </li>
                    <li class="nav-item mx-lg-4">
                        <a class="filter-btn nav-link btn-outline-primary rounded-pill text-light px-4 light-300" href="../book_types/science_nature.php" data-filter=".branding">SCIENCE AND NATURE</a>
                    </li>
                    <li class="nav-item mx-lg-4">
                        <a class="filter-btn nav-link btn-outline-primary rounded-pill text-light px-4 light-300" href="../book_types/childre.php" data-filter=".branding">CHILDREN'S BOOKS</a>
                    </li>
                    <li class="nav-item mx-lg-4">
                        <a class="filter-btn nav-link btn-outline-primary rounded-pill text-light px-4 light-300" href="#" data-filter=".branding">OTHERS</a>
                    </li>
                </ul>
            </div>
        </div>

    </section>
   
    <section class="container overflow-hidden py-5">
        <div class="row gx-5 gx-sm-3 gx-lg-5 gy-lg-5 gy-3 pb-3 projects">
            <div class="col-xl-3 col-md-4 col-sm-6 project ui branding">
                <a href="#" class="service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0">
                    <img class="service card-img" src="../../Assets/Images/fiction.webp" alt="Card image">
                    <div class="service-work-vertical card-img-overlay d-flex align-items-end">
                        <div class="service-work-content text-left text-light">
                            <span class="btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300">FICTION BOOKS</span>
                            <p class="card-text">
                            Fiction books transport readers to imaginative worlds and storytelling.</p>                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-sm-6 project ui graphic">
                <a href="#" class="service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0">
                    <img class="card-img" src="../../Assets/Images/non fiction1.webp" alt="Card image">
                    <div class="service-work-vertical card-img-overlay d-flex align-items-end">
                        <div class="service-work-content text-left text-light">
                            <span class="btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300">NON-FICTION BOOKS</span>
                            <p class="card-text">Factual insights, real-world knowledge, diverse subjects.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-sm-6 project branding">
                <a href="#" class="service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0">
                    <img class="card-img" src="../../Assets/Images/science and nature.avif" alt="Card image">
                    <div class="service-work-vertical card-img-overlay d-flex align-items-end">
                        <div class="service-work-content text-left text-light">
                            <span class="btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300">SCIENCE AND NATURE</span>
                            <p class="card-text">Explore wonders, unravel mysteries, nurture curiosity</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-sm-6 project ui graphic">
                <a href="#" class="service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0">
                    <img class="card-img" src="../../Assets/Images/children.jpg" alt="Card image">
                    <div class="service-work-vertical card-img-overlay d-flex align-items-end">
                        <div class="service-work-content text-left text-light">
                            <span class="btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300">CHILDREN</span>
                            <p class="card-text"> Whimsical tales sparking young minds' joy</p>
                        </div>
                    </div>
                </a>
            </div>

            
            <div class="col-xl-3 col-md-4 col-sm-6 project ui graphic">
                <a href="#" class="service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0">
                    <img class="card-img" src="../../Assets/Images/technology.jpg" alt="Card image">
                    <div class="service-work-vertical card-img-overlay d-flex align-items-end">
                        <div class="service-work-content text-left text-light">
                            <span class="btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300">TECHNOLOGY</span>
                            <p class="card-text">Tech books: Innovate, code, transform, progress.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-sm-6 project branding">
                <a href="#" class="service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0">
                    <img class="card-img" src="../../Assets/Images/travel.jpg" alt="Card image">
                    <div class="service-work-vertical card-img-overlay d-flex align-items-end">
                        <div class="service-work-content text-left text-light">
                            <span class="btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300">TRAVEL</span>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-sm-6 project branding">
                <a href="#" class="service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0">
                    <img class="card-img" src="../../Assets/Images/religion1.jpg" alt="Card image">
                    <div class="service-work-vertical card-img-overlay d-flex align-items-end">
                        <div class="service-work-content text-left text-light">
                            <span class="btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300">RELIGION</span>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-sm-6 project ui graphic branding">
                <a href="#" class="service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0">
                    <img class="card-img" src="../../Assets/Images/business.webp" alt="Card image">
                    <div class="service-work-vertical card-img-overlay d-flex align-items-end">
                        <div class="service-work-content text-left text-light">
                            <span class="btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300">Business and Finance</span>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    
    <h2 class="h2 text-center col-12 py-5 semi-bold-600">OUR USERS</h2>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <?php
                if (isset($userStatistics)) {
                ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">User Information</h5>
                            <p class="card-text"><i class='bx bxs-user'></i> Total Users: <?php echo $userStatistics['totalUsers']; ?></p>
                            <p class="card-text"><i class='bx bx-user-check'></i> Active Users: <?php echo $userStatistics['activeUsers']; ?></p>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
    </section>
    <section>
        <h2 class="h2 text-center col-12 py-5 semi-bold-600">AVAILABLE BOOKS</h2>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Book Information</h5>
                            <p class="card-text">Total Books: <?php echo $totalBooks; ?></p>
                            <p class="card-text">Available Books: <?php echo $bookStatusStatistics['availableBooks']; ?></p>
                            <p class="card-text">Checked-Out Books: <?php echo $bookStatusStatistics['checkedOutBooks']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Book Categories and Genres</h5>
                            <ul>
                                <?php
                                foreach ($bookCategories as $category) {
                                    echo '<li>' . $category['category'] . ' - ' . $category['genre'] . '</li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Announcement -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Announcements and Notifications</h5>
                        <div class="alert alert-info" role="alert">
                            <strong>Important Announcement:</strong>
                            <p><b>Exciting News at E-Library!</b><br>

                              <b>  Dear E-Library Community,</b><br>

                                We are thrilled to announce some exciting developments at E-Library that will enhance your experience and make your journey with us even more enjoyable.
<br>
                                New Feature: Quick Search Functionality
<br>
                                We've introduced a quick search feature, allowing you to find your favorite books, users, or transactions with just a few clicks. It's now easier than ever to access the information you need.
                                Upcoming Events: Book Club Meetings

                                Join our upcoming book club meetings where avid readers and literature enthusiasts come together to discuss and share their thoughts on the latest reads. Stay tuned for more details on these engaging events.
                                Expanded Book Collection

                                Our library has expanded its collection with a variety of new and popular titles across different genres. Explore the latest arrivals and discover your next favorite book.
                                User-Friendly Navigation

                                We've revamped our navigation links to different sections of the system, making it more user-friendly and ensuring a seamless browsing experience.
                                Stay tuned for more updates as we continue to enhance our platform to serve you better. Thank you for being a part of the E-Library community!

                                Happy Reading!

                                Best Regards,

                                The E-Library Team</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
 

</html>
<?php
include __DIR__ . '/../layouts/footer.php';
?>