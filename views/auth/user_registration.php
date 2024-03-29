<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/../LibraryManagement/Assets/CSS/style.css">
    <link rel="stylesheet" href="/../LibraryManagement/Assets/node_modules/animate.css/animate.css">
    <title>User Registration</title>
</head>
<body>
    <h2>User Registration</h2>
    <form action="" method="post" autocomplete="off">
        <label for="Name">Name :</label>
        <input type="text" name="name" id="name" required value=""><br>
        <label for="username">Username :</label>
        <input type="text" name="username" id="username" required value=""><br>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required value=""><br>
        <label for="password">Password :</label>
        <input type="password" name="password" id="password" required value=""><br>
        <label for="confirmpassword">Confirm Password:</label>
        <input type="password" name="confirmpassword" id="confirmpassword" required value=""><br>
        <label for="userType">User Type</label>
        <select name="userType" id="userType">
            <option value="choose">Choose</option>
            <option value="Student">Student</option>
        </select><br>
        <label for="Registration Date">Registration Date :</label>
        <input type="date" name="registrationdate">
        <button type="submit" name="submit">Register</button>
    </form>
    <a href="../auth/login.php">  Login</a>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('submitBtn').addEventListener('click', function(event) {
                event.preventDefault();
                showSuccessMessage(); 
                showErrorMessage(); 
            });
        });

        function showSuccessMessage() {
            var successMessage = document.getElementById('successMessage');
            successMessage.classList.remove('hidden');
            setTimeout(function() {
                successMessage.classList.add('fadeOut');
            }, 3000); 
        }

        function showErrorMessage() {
            var errorMessage = document.getElementById('errorMessage');
            errorMessage.classList.remove('hidden');
            setTimeout(function() {
                errorMessage.classList.add('fadeOut');
            }, 3000); 
        }
    </script>
</body>

</html>
 <?php
//include '../layouts/footer.php';
?> 

<?php
require '../../config.php';  

if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $userType = $_POST['userType'];
    $registrationdate = $_POST['registrationdate'];

    $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "EMAIL Or USERNAME IS ALREADY TAKEN";
    } else {
        if ($password == $confirmpassword) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $query = "INSERT INTO users (name, username, email, password, user_type, registration_date) VALUES ('$name', '$username', '$email', '$hashedPassword', '$userType', '$registrationdate')";
            mysqli_query($conn, $query);
            echo "Registration Successful";
        } else {
            echo "Password Does Not Match";
        }
    }
}
?>
