<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Assets/CSS/style.css">
    <title>Library Management System</title>
    <!-- Include your CSS and JS dependencies here -->
</head>

<body>
    <?php include '/../xampp/htdocs/LibraryManagement/views/layouts/header.php'; ?>

    <div class="homepage-container">
        <h1>Welcome to the Library Management System</h1>

        <div class="about-section">
            <h2>About Us</h2>
            <p>
                Welcome to our modern and efficient library system. We strive to provide an extensive collection of books
                to support your academic and recreational needs. Our user-friendly system ensures easy access to
                information and seamless borrowing processes.
            </p>
        </div>

        <div class="features-section">
            <h2>Key Features</h2>
            <ul>
                <li>Search and browse our extensive book collection.</li>
                <li>Borrow and return books with ease.</li>
                <li>Receive notifications about due dates and overdue books.</li>
                <li>Explore our catalog and discover new releases.</li>
            </ul>
        </div>

        <div class="get-started-section">
            <h2>Get Started</h2>
            <p>
                Ready to explore the world of books? Login to your account or register to access our full range of
                services.
            </p>
            <a href="../views/auth/login.php">Login</a>
            <a href="../views/auth/user_registration.php">Register</a>
        </div>
    </div>

    <?php include '/../xampp/htdocs/LibraryManagement/views/layouts/footer.php'; ?>
</body>

</html>
