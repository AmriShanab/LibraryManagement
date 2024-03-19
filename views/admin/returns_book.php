<?php
include '/../xampp/htdocs/LibraryManagement/config.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the 'borrow_id' parameter is set in the POST data
    if (isset($_POST['borrow_id'])) {
        $borrowId = $_POST['borrow_id'];

        // Get the fine amount from the database based on the borrow_id
        $fineQuery = "SELECT fine FROM book_borrow WHERE borrow_id = $borrowId";
        $fineResult = mysqli_query($conn, $fineQuery);
        $row = mysqli_fetch_assoc($fineResult);
        $fineAmount = $row['fine'];

        // Check if the fine amount is greater than 0
        if ($fineAmount > 0) {
            // If the user has fines to pay, return the fine amount with 'error' message
            echo 'error: ' . $fineAmount;
        } else {
            // If no fines, proceed with returning the book
            // Update the 'status' column in the 'book_borrow' table to mark the book as returned
            $updateQuery = "UPDATE book_borrow SET status = 'Returned' WHERE borrow_id = $borrowId";
            $result = mysqli_query($conn, $updateQuery);

            if ($result) {
                // If the book was returned successfully, return 'success'
                echo 'success';
            } else {
                // If there was an error updating the database, return 'error' message
                echo 'error: Failed to update database';
            }
        }
    } else {
        // If the 'borrow_id' parameter is not set, return 'error' message
        echo 'error: Borrow ID not provided';
    }
} else {
    // If the request method is not POST, return 'error' message
    echo 'error: Invalid request method';
}
?>
