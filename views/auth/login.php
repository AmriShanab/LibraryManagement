<?php
    // Start the session
    session_start();

    // Include the database configuration
    include '../../config.php';

    // Check if the form is submitted
    if (isset($_POST["submit"])) {
        // Retrieve username and password from the form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Query to fetch user details from the database based on the username
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        // Check if the query returned any rows
        if (mysqli_num_rows($result) > 0) {
            // Fetch the row
            $row = mysqli_fetch_assoc($result);
            // Verify the password using password_verify
            if (password_verify($password, $row['password'])) {
                // Password is correct, set session variables
                $_SESSION['user_id'] = $row['user_id']; // You can set other session variables here if needed
                $_SESSION['user_type'] = $row['user_type']; // Assuming user_type is stored in the database
                
                // Redirect to the appropriate page based on user type
                if ($_SESSION['user_type'] === 'Staff') {
                    header("Location: ../Staff/index.php");
                } elseif ($_SESSION['user_type'] === 'Student') {
                    header("Location: ../Student/index.php");
                } else {
                    // Handle other user types or unexpected cases
                    // header("Location: ../index.php");
                }
                exit(); // Ensure that no further code execution occurs after the redirection
            } else {
                // Password is incorrect
                echo '<script>alert("Incorrect password. Please try again.");</script>';
            }
        } else {
            // User does not exist
            echo '<script>alert("User does not exist. Please register.");</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Library Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        /* Custom CSS styles */
        .card {
            margin-top: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }

        .btn-register {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Login</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button><br>
                            <button type="submit" name="submit" class="btn btn-primary btn-block"><a href="../admin/guest_books.php" style="color: white;">Login as Guest</a></button>
                        </form>
                        <div class="text-center mt-3">
                            <p>Don't have an account? <a href="../auth/user_registration.php" class="btn-register">Register</a></p>
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
