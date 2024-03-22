<?php
include '/../xampp/htdocs/LibraryManagement/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['borrow_id'])) {
        $borrowId = $_POST['borrow_id'];

        $fineQuery = "SELECT fine FROM book_borrow WHERE borrow_id = $borrowId";
        $fineResult = mysqli_query($conn, $fineQuery);
        $row = mysqli_fetch_assoc($fineResult);
        $fineAmount = $row['fine'];

        if ($fineAmount > 0) {
            echo 'error: ' . $fineAmount;
        } else {
            $updateQuery = "UPDATE book_borrow SET status = 'Returned' WHERE borrow_id = $borrowId";
            $result = mysqli_query($conn, $updateQuery);

            if ($result) {
                echo 'success';
            } else {
                echo 'error: Failed to update database';
            }
        }
    } else {
        echo 'error: Borrow ID not provided';
    }
} else {
    echo 'error: Invalid request method';
}
?>
