<?php
// Start the session to access session variables
session_start();

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Include the database configuration file
include '../config.php';

// Fetch user details from the database based on user ID stored in the session
$user_id = $_SESSION['user_id']; // Assuming user_id is stored in session upon login

// Prepare and execute the query to fetch user details
$stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if the user exists in the database
if ($result->num_rows > 0) {
    // Fetch user details
    $user_details = $result->fetch_assoc();
    $username = $user_details['username'];
    $email = $user_details['email'];
    $registrationDate = $user_details['registration_date'];
} else {
    // Handle the case where the user does not exist in the database
    // For example, you can display an error message or redirect the user
    echo "Error: User not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>User Profile</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Username: <?php echo $username; ?></h5>
                <p class="card-text">User ID: <?php echo $user_id; ?></p>
                <p class="card-text">Email: <?php echo $email; ?></p>
                <p class="card-text">Email: <?php echo $registrationDate; ?></p>

                <!-- Add more user details as needed -->
                <a href="/../LibraryManagement/views/auth/login.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
