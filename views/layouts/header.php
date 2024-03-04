<html>
    <head>
        <link rel="stylesheet" href="/../LibraryManagement/Themes/ngowebsitetemplate/css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&family=Poppins:wght@200&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    </head>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Library System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item <?php echo ($currentPage === 'home') ? 'active' : ''; ?>">
                <a class="nav-link" href="/../LibraryManagement/views/index.php">Home</a>
            </li>
            <li class="nav-item <?php echo ($currentPage === 'books') ? 'active' : ''; ?>">
                <a class="nav-link" href="/../LibraryManagement/views/admin/books.php">Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/../LibraryManagement/views/admin/transaction.php">Transactions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/../LibraryManagement/views/admin/users.php">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/../LibraryManagement/views/auth/login.php">Log-out</a>
            </li>
        </ul>
    </div>
</nav>

</html>