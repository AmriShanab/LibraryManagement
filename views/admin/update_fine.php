<?php
// update_fine.php

// Include the database configuration file
include '/../xampp/htdocs/LibraryManagement/config.php';

// Check if borrow_id is set and not empty
if (isset($_POST['borrow_id']) && !empty($_POST['borrow_id'])) {
    // Sanitize the borrow_id to prevent SQL injection
    $borrowId = mysqli_real_escape_string($conn, $_POST['borrow_id']);

    // Update the fine_amount to 0 for the specified borrow_id
    $updateQuery = "UPDATE book_borrow SET fine_amount = '0' WHERE borrow_id = $borrowId";
    if (mysqli_query($conn, $updateQuery)) {
        echo "Fine amount set to 0 successfully.";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid borrow ID.";
}
?>
