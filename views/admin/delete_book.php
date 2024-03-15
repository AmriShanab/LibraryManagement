<?php
include '/../xampp/htdocs/LibraryManagement/config.php';

// Check if the database connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted for deleting a book
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_id'])) {
    $book_id = $_POST['book_id'];

    // Prepare and execute the SQL statement to delete the book
    $query = "DELETE FROM books WHERE book_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $book_id);
    
    if (mysqli_stmt_execute($stmt)) {
        // Return a success message if deletion is successful
        echo "Book deleted successfully";
    } else {
        // Return an error message if deletion fails
        echo "Error deleting book";
    }
} else {
    // If the form submission is not valid, return an error message
    echo "Invalid request";
}
?>
