<?php
include '/../xampp/htdocs/LibraryManagement/config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $bookId = $_POST['book_id'];
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $quantity = $_POST['quantity'];

        $query = "UPDATE books SET isbn=?, title=?, author=?, genre=?, quantity=? WHERE book_id=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'sssiii', $isbn, $title, $author, $genre, $quantity, $bookId);

    
    if (mysqli_stmt_execute($stmt)) {
              echo json_encode(array("success" => "Book updated successfully"));
    } else {
       
        echo json_encode(array("error" => "Failed to update book"));
    }

   
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    
    echo json_encode(array("error" => "Invalid form submission"));
}
?>
