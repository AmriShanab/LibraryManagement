<?php
include '/../xampp/htdocs/LibraryManagement/config.php';

// Function to add a new book
function addBook($conn, $isbn, $title, $author, $genre, $quantity, $status) {
    $query = "INSERT INTO books (isbn, title, author, genre, quantity, status) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ssssis', $isbn, $title, $author, $genre, $quantity, $status);
    mysqli_stmt_execute($stmt);
}

// Function to get all books
function getAllBook($conn) {
    $query = "SELECT * FROM books";
    $result = mysqli_query($conn, $query);
    $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $books;
}

// Check if the form is submitted for adding a new book
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addBook'])) {
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'];

    // Add the new book
    addBook($conn, $isbn, $title, $author, $genre, $quantity, $status);

    // Reload the page using JavaScript after adding a book
    echo '<script type="text/javascript">location.reload();</script>';
}

$books = getAllBooks($conn);

include '/../xampp/htdocs/LibraryManagement/views/layouts/header.php';
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
    <h2>Book List</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ISBN</th>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Quantity</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($books as $book) : ?>
            <tr>
                <td><?php echo $book['isbn']; ?></td>
                <td><?php echo $book['title']; ?></td>
                <td><?php echo $book['author']; ?></td>
                <td><?php echo $book['genre']; ?></td>
                <td><?php echo $book['quantity']; ?></td>
                <td><?php echo $book['status']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Form to add a new book -->
    <h2>Add New Book</h2>
    <form method="post" action="books.php">
        <div class="form-group">
            <label for="isbn">ISBN:</label>
            <input type="text" class="form-control" name="isbn" required>
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" name="author" required>
        </div>
        <div class="form-group">
            <label for="genre">Genre:</label>
            <input type="text" class="form-control" name="genre" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" name="quantity" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" class="form-control" name="status" required>
        </div>
        <button type="submit" class="btn btn-primary" name="addBook">Add Book</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
include '/../xampp/htdocs/LibraryManagement/views/layouts/footer.php';
?>
