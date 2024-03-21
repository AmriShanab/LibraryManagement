<?php
include '/../xampp/htdocs/LibraryManagement/config.php';
include '/../xampp/htdocs/LibraryManagement/views/layouts/student_header.php';

// Check if a search query is provided
$search_query = isset($_GET['search']) ? $_GET['search'] : '';

// Get books based on the search query
$books = getBooks($conn, $search_query);

function getBooks($conn, $search_query = '') {
    if (!empty($search_query)) {
        // If search query is provided, filter books based on it
        $query = "SELECT * FROM books WHERE title LIKE ? OR author LIKE ?";
        $search_param = "%$search_query%";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'ss', $search_param, $search_param);
        mysqli_stmt_execute($stmt);
    } else {
        // If no search query, get all books
        $query = "SELECT * FROM books";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_execute($stmt);
    }
    
    $result = mysqli_stmt_get_result($stmt);
    $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $books;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Books</title>
</head>
<body>

<div class="container mt-4">
    <!-- Search form -->
    <form method="GET" action="books.php" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search books by title or author" name="search" value="<?php echo htmlentities($search_query); ?>">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </div>
    </form>

    <h2>Book List</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Book_id</th>
            <th>ISBN</th>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Quantity</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($books as $book) : ?>
            <tr>
                <td><?php echo $book['book_id']?></td>
                <td><?php echo $book['isbn']; ?></td>
                <td><?php echo $book['title']; ?></td>
                <td><?php echo $book['author']; ?></td>
                <td><?php echo $book['genre']; ?></td>
                <td><?php echo $book['quantity']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
