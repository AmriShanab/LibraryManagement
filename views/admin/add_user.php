<?php
session_start();
include __DIR__ . '/../../config.php';

  // add user
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $userType = $_POST['user_type'];
    $registrationDate = $_POST['registrationdate'];

    $query = "INSERT INTO users (name, username, email, password, user_type, registration_date) VALUES ('$name', '$username', '$email', '$password', '$userType', '$registrationDate')";
    
    if (mysqli_query($conn, $query)) {
        echo "User added successfully!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
