<?php
include '/../xampp/htdocs/LibraryManagement/config.php';

// Check if book_id is set in the POST request
if(isset($_POST['book_id'])) {
    // Retrieve the book_id from the POST request
    $book_id = $_POST['book_id'];

    // Query to select book details based on book_id
    $query = "SELECT * FROM books WHERE book_id = ?";
    
    // Prepare the statement
    $stmt = mysqli_prepare($conn, $query);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, 'i', $book_id);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the row
    $book = mysqli_fetch_assoc($result);

    // Check if book details are found
    if($book) {
        // Return book details as JSON response
        echo json_encode($book);
    } else {
        // If book details are not found, return an empty response or an error message
        echo json_encode(array('error' => 'Book details not found'));
    }
} else {
    // If book_id is not set in the POST request, return an error message
    echo json_encode(array('error' => 'Book ID not provided'));
}
?>
