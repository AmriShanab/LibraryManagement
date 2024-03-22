<?php
include '/../xampp/htdocs/LibraryManagement/config.php';

if(isset($_POST['book_id'])) {
    $book_id = $_POST['book_id'];

    $query = "SELECT * FROM books WHERE book_id = ?";
    
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, 'i', $book_id);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $book = mysqli_fetch_assoc($result);

    if($book) {
        echo json_encode($book);
    } else {
        echo json_encode(array('error' => 'Book details not found'));
    }
} else {
    echo json_encode(array('error' => 'Book ID not provided'));
}
?>
