<?php 
include __DIR__ . '/layouts/header.php';
include '../config.php';
// Call the getUserStatistics function and store the results in $userStatistics
$userStatistics = getUserStatistics($conn);
$totalBooks = getTotalBooks($conn);
$bookStatusStatistics = getBookStatusStatistics($conn);
$bookCategories = getBookCategories($conn);
$currentPage = 'home';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head section with necessary meta tags, CSS, and other resources -->
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <?php
                // Check if $userStatistics is set before accessing its elements
                if (isset($userStatistics)) {
                ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">User Information</h5>
                            <p class="card-text">Total Users: <?php echo $userStatistics['totalUsers']; ?></p>
                            <p class="card-text">Active Users: <?php echo $userStatistics['activeUsers']; ?></p>
                            <!-- Add more information as needed -->
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="col-md-6">
                <!-- Add another card or information here -->
            </div>
        </div>
    </div>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
