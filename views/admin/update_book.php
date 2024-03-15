<?php
include '/../xampp/htdocs/LibraryManagement/config.php';

// Check if the database connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to update book details
function updateBook($conn, $book_id, $isbn, $title, $author, $genre, $quantity) {
    $query = "UPDATE books SET isbn=?, title=?, author=?, genre=?, quantity=? WHERE book_id=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ssssii', $isbn, $title, $author, $genre, $quantity, $book_id);
    
    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Return a success message
        echo json_encode(array('success' => 'Book details updated successfully'));
    } else {
        // Log the error
        error_log("Error updating book details: " . mysqli_error($conn));

        // Return an error message
        echo json_encode(array('error' => 'Error updating book details'));
    }
}

// Check if the form is submitted for updating book details
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateBook'])) {
    $book_id = $_POST['book_id'];
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $quantity = $_POST['quantity'];

    // Update the book details
    updateBook($conn, $book_id, $isbn, $title, $author, $genre, $quantity);
} else {
    // If the form submission is not valid, return an error message
    echo json_encode(array('error' => 'Invalid form submission'));
}

?>
