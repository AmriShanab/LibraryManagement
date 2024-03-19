<?php
include '/../xampp/htdocs/LibraryManagement/config.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the 'borrow_id' parameter is set in the POST data
    if (isset($_POST['borrow_id'])) {
        $borrowId = $_POST['borrow_id'];

        // Get the fine amount from the database based on the borrow_id
        $fineQuery = "SELECT fine, user_id, book_id FROM book_borrow WHERE borrow_id = $borrowId";
        $fineResult = mysqli_query($conn, $fineQuery);
        $row = mysqli_fetch_assoc($fineResult);
        $fineAmount = $row['fine'];
        $userId = $row['user_id'];
        $bookId = $row['book_id'];

        // Update the 'status' column in the 'book_borrow' table to mark the fine as paid
        $updateQuery = "UPDATE book_borrow SET fine = 'Paid' WHERE borrow_id = $borrowId";
        $result = mysqli_query($conn, $updateQuery);

        if ($result) {
            // Insert payment information into the transaction table
            $insertQuery = "INSERT INTO transactions (user_id, book_id, amount) VALUES ($userId, $bookId, $fineAmount)";
            $insertResult = mysqli_query($conn, $insertQuery);
            if ($insertResult) {
                // If the payment information was successfully inserted, return a success message
                echo "Payment processed successfully";
            } else {
                // If there was an error inserting the payment information, return an error message
                echo "Error inserting payment information into the transaction table";
            }
        } else {
            // If there was an error updating the database, return an error message
            echo "Error processing payment";
        }
    } else {
        // If the 'borrow_id' parameter is not set, return an error message
        echo "Borrow ID not provided";
    }
} else {
    // If the request method is not POST, return an error message
    echo "Invalid request method";
}
?>
