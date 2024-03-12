<?php
include '/../xampp/htdocs/LibraryManagement/config.php';

// Placeholder function to get all books (replace it with your actual function)
// function getAllBooks($conn) {
//     $query = "SELECT * FROM books";
//     $result = mysqli_query($conn, $query);
//     $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
//     return $books;
// }

// Placeholder function to get all users (replace it with your actual function)
// function getAllUsers($conn) {
//     $query = "SELECT * FROM users";
//     $result = mysqli_query($conn, $query);
//     $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
//     return $users;
// }

// Placeholder function to borrow a book (replace it with your actual function)
function borrowBook($conn, $bookId, $userId, $borrowDate, $returnDate) {
    // Insert into borrow table
    $insertQuery = "INSERT INTO book_borrow (book_id, user_id, borrow_date, return_date) VALUES (?, ?, ?, ?)";
    $insertStmt = mysqli_prepare($conn, $insertQuery);
    mysqli_stmt_bind_param($insertStmt, 'iiss', $bookId, $userId, $borrowDate, $returnDate);

    // Placeholder: Update book quantity
    $updateQuery = "UPDATE books SET quantity = quantity - 1 WHERE book_id = ?";
    $updateStmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($updateStmt, 'i', $bookId);

    // Execute both queries within a transaction
    mysqli_begin_transaction($conn);

    try {
        // Insert into borrow table
        mysqli_stmt_execute($insertStmt);

        // Update book quantity
        mysqli_stmt_execute($updateStmt);

        // Commit the transaction
        mysqli_commit($conn);

        return "Book borrowed successfully";
    } catch (Exception $e) {
        // An error occurred, rollback the transaction
        mysqli_rollback($conn);
        return "Error: " . $e->getMessage();
    } finally {
        // Close the prepared statements
        mysqli_stmt_close($insertStmt);
        mysqli_stmt_close($updateStmt);
    }
}


// Placeholder function to return a book (replace it with your actual function)
function returnBook($conn, $borrowId, $returnDate) {
    // Your logic to update the return date in the borrow table
    $updateQuery = "UPDATE book_borrow SET return_date = ? WHERE borrow_id = ?";
    $stmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($stmt, 'si', $returnDate, $borrowId);
    
    if (mysqli_stmt_execute($stmt)) {
        // Update successful
        mysqli_stmt_close($stmt);
        
        // Now, update the book quantity
        $query = "SELECT book_id FROM book_borrow WHERE borrow_id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $borrowId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $bookId);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        if ($bookId) {
            // Now we have the $bookId, update the book quantity
            $updateBookQuery = "UPDATE books SET quantity = quantity + 1 WHERE book_id = ?";
            $updateBookStmt = mysqli_prepare($conn, $updateBookQuery);
            mysqli_stmt_bind_param($updateBookStmt, 'i', $bookId);
            mysqli_stmt_execute($updateBookStmt);
            mysqli_stmt_close($updateBookStmt);

            return "Book returned successfully";
        } else {
            return "Failed to return book. Borrow ID not found.";
        }
    } else {
        // Update failed
        mysqli_stmt_close($stmt);
        return "Failed to return book. Unable to update return date.";
    }
}


// Fetch all books and users
$books = getAllBooks($conn);
$users = getAllUsers($conn);

// Check if the form is submitted for borrowing a book
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrow'])) {
    $bookId = $_POST['bookId'];
    $userId = $_POST['user_id'];
    $borrowDate = $_POST['borrow_date'];
    $returnDate = $_POST['return_date'];

    $result = borrowBook($conn, $bookId, $userId, $borrowDate, $returnDate);
    echo $result;
}

// Check if the form is submitted for returning a book
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['return'])) {
    $borrowId = $_POST['borrow_id'];
    $returnDate = $_POST['actual_return_date'];

    $result = returnBook($conn, $borrowId, $returnDate);
    echo $result;
}

include '/../xampp/htdocs/LibraryManagement/views/layouts/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Book Borrow</title>
</head>
<body>

<div class="container mt-4">
    <!-- Borrow Book Form -->
    <form method="post" action="book_borrow.php">
        <h2>Borrow a Book</h2>
        <div class="form-group">
            <label for="bookId">Select a Book:</label>
            <select name="bookId" id="bookId" class="form-control" required>
                <?php foreach ($books as $book) : ?>
                    <option value="<?php echo $book['book_id']; ?>"><?php echo $book['title']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="user_id">Select a User:</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <?php foreach ($users as $user) : ?>
                    <option value="<?php echo $user['user_id']; ?>"><?php echo $user['username']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="borrow_date">Borrow Date:</label>
            <input type="date" class="form-control" name="borrow_date" required>
        </div>
        <div class="form-group">
            <label for="return_date">Return Date:</label>
            <input type="date" class="form-control" name="return_date" required>
        </div>
        <button type="submit" class="btn btn-primary" name="borrow">Borrow Book</button>
    </form>
</div>
<br>
<a href="all_book_borrow_list.php" class="btn btn-info mt-3">View All Book Borrows</a>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
include '/../xampp/htdocs/LibraryManagement/views/layouts/footer.php';
?>
