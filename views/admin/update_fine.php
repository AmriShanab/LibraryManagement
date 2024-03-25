<?php



include '/../xampp/htdocs/LibraryManagement/config.php';


if (isset($_POST['borrow_id']) && !empty($_POST['borrow_id'])) {
    
    $borrowId = mysqli_real_escape_string($conn, $_POST['borrow_id']);
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
