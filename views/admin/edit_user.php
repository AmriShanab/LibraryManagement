<?php
session_start();
include __DIR__ . '../../../config.php';

// Update user in the database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $userId = $_POST['editUserId'];
    $name = $_POST['editName'];
    $username = $_POST['editUsername'];
    $email = $_POST['editEmail'];
    $password = password_hash($_POST['editPassword'], PASSWORD_BCRYPT);
    $userType = $_POST['editUserType'];
    $registrationDate = $_POST['editRegistrationDate'];
    
    // Validate and sanitize data as needed

    // Update data in the database
    $query = "UPDATE users SET name='$name', username='$username', email='$email', password='$password', user_type='$userType', registration_date='$registrationDate' WHERE user_id='$userId'";
    
    if (mysqli_query($conn, $query)) {
        echo "User updated successfully!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>