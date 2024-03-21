<?php
include '/../xampp/htdocs/LibraryManagement/config.php';

// Check if the form data is received via POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the book details from the POST data
    $bookId = $_POST['book_id'];
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $quantity = $_POST['quantity'];

    // Update the book details in the database
    $query = "UPDATE books SET isbn=?, title=?, author=?, genre=?, quantity=? WHERE book_id=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'sssiii', $isbn, $title, $author, $genre, $quantity, $bookId);

    // Execute the update query
    if (mysqli_stmt_execute($stmt)) {
        // Book details updated successfully
        echo json_encode(array("success" => "Book updated successfully"));
    } else {
        // Error occurred while updating book details
        echo json_encode(array("error" => "Failed to update book"));
    }

    // Close the database connection and statement
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    // If the request method is not POST, return an error message
    echo json_encode(array("error" => "Invalid form submission"));
}
?>
