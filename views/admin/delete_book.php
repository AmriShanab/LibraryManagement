<?php
include '/../xampp/htdocs/LibraryManagement/config.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_id'])) {
    $book_id = $_POST['book_id'];

    $query = "DELETE FROM books WHERE book_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $book_id);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "Book deleted successfully";
    } else {
        echo "Error deleting book";
    }
} else {
    echo "Invalid request";
}
?>
