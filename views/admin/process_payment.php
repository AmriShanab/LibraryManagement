<?php
include '/../xampp/htdocs/LibraryManagement/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['borrow_id'])) {
        $borrowId = $_POST['borrow_id'];

        $fineQuery = "SELECT fine, user_id, book_id FROM book_borrow WHERE borrow_id = $borrowId";
        $fineResult = mysqli_query($conn, $fineQuery);
        $row = mysqli_fetch_assoc($fineResult);
        $fineAmount = $row['fine'];
        $userId = $row['user_id'];
        $bookId = $row['book_id'];

        $updateQuery = "UPDATE book_borrow SET fine = 'Paid' WHERE borrow_id = $borrowId";
        $result = mysqli_query($conn, $updateQuery);

        if ($result) {
            $insertQuery = "INSERT INTO transactions (user_id, book_id, amount) VALUES ($userId, $bookId, $fineAmount)";
            $insertResult = mysqli_query($conn, $insertQuery);
            if ($insertResult) {
                echo "Payment processed successfully";
            } else {
                echo "Error inserting payment information into the transaction table";
            }
        } else {
            echo "Error processing payment";
        }
    } else {
        echo "Borrow ID not provided";
    }
} else {
    echo "Invalid request method";
}
?>
