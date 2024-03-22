<?php
include '/../xampp/htdocs/LibraryManagement/config.php';


function borrowBook($conn, $bookId, $userId, $borrowDate, $returnDate)
{
    $insertQuery = "INSERT INTO book_borrow (book_id, user_id, borrow_date, return_date) VALUES (?, ?, ?, ?)";
    $insertStmt = mysqli_prepare($conn, $insertQuery);
    mysqli_stmt_bind_param($insertStmt, 'iiss', $bookId, $userId, $borrowDate, $returnDate);

    $updateQuery = "UPDATE books SET quantity = quantity - 1 WHERE book_id = ?";
    $updateStmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($updateStmt, 'i', $bookId);

    mysqli_begin_transaction($conn);

    try {
        mysqli_stmt_execute($insertStmt);

        mysqli_stmt_execute($updateStmt);

        mysqli_commit($conn);
    } catch (Exception $e) {
        mysqli_rollback($conn);
        return "Error: " . $e->getMessage();
    } finally {
        mysqli_stmt_close($insertStmt);
        mysqli_stmt_close($updateStmt);
    }
}


function returnBook($conn, $borrowId, $returnDate)
{
    $updateQuery = "UPDATE book_borrow SET return_date = ? WHERE borrow_id = ?";
    $stmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($stmt, 'si', $returnDate, $borrowId);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);

        $query = "SELECT book_id FROM book_borrow WHERE borrow_id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $borrowId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $bookId);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        if ($bookId) {
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
        
        mysqli_stmt_close($stmt);
        return "Failed to return book. Unable to update return date.";
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrow'])) {
    $bookId = $_POST['bookId'];
    $userId = $_POST['user_id'];
    $borrowDate = $_POST['borrow_date'];
    $returnDate = $_POST['return_date'];

   
    $borrowDateObj = new DateTime($borrowDate);
    $returnDateObj = new DateTime($returnDate);
    $interval = $returnDateObj->diff($borrowDateObj);
    $days = $interval->days;

    
    $ratePerDay = 2;
    $totalRate = $days * $ratePerDay;

   
    $rateMessage = "Total rate for borrowing: $" . $totalRate . " for " . $days . " days";

  
    $result = borrowBook($conn, $bookId, $userId, $borrowDate, $returnDate);
    echo $result; 
    
    $insertTransactionQuery = "INSERT INTO transactions (user_id, book_id, amount) VALUES (?, ?, ?)";
    $insertTransactionStmt = mysqli_prepare($conn, $insertTransactionQuery);
    mysqli_stmt_bind_param($insertTransactionStmt, 'iii', $userId, $bookId, $totalRate);
    mysqli_stmt_execute($insertTransactionStmt);
    mysqli_stmt_close($insertTransactionStmt);
}




$books = getAllBooks($conn);
$users = getAllUsers($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrow'])) {
    $bookId = $_POST['bookId'];
    $userId = $_POST['user_id'];
    $borrowDate = $_POST['borrow_date'];
    $returnDate = $_POST['return_date'];
    $borrowDateObj = new DateTime($borrowDate);
    $returnDateObj = new DateTime($returnDate);
    $interval = $returnDateObj->diff($borrowDateObj);
    $days = $interval->days;
    $ratePerDay = 2;
    $totalRate = $days * $ratePerDay;
    $rateMessage = "Total rate for borrowing: $" . $totalRate . " for " . $days . " days";
}

include '/../xampp/htdocs/LibraryManagement/views/layouts/student_header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Book Borrow</title>
    <style>
                        .borrow-success-message {
                            color: green;
                            font-weight: bold;
                            padding: 10px;
                            border: 1px solid green;
                            border-radius: 5px;
                            margin-top: 20px;
                        }
                    </style>
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
                <input type="date" class="form-control" name="borrow_date" id="borrow_date" required>
            </div>
            <div class="form-group">
                <label for="return_date">Return Date:</label>
                <input type="date" class="form-control" name="return_date" id="return_date" required>
            </div>
            <div id="rateMessage"><?php echo isset($rateMessage) ? $rateMessage : ''; ?></div>

            <button type="submit" class="btn rounded-pill px-4 btn-outline-primary light-300" name="borrow">Borrow Book</button>

        </form>

    </div>
    <div><?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrow'])) {
                $result = borrowBook($conn, $bookId, $userId, $borrowDate, $returnDate);
                echo "<div class='borrow-success-message'>";
                echo "Book Borrwoed Succesful"; 
                echo "</div>";
            } ?>
               <br>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
                      $('#borrow_date, #return_date').change(function() {
                var borrowDate = new Date($('#borrow_date').val());
                var returnDate = new Date($('#return_date').val());
                var days = Math.floor((returnDate - borrowDate) / (1000 * 60 * 60 * 24));
                var ratePerDay = 2;
                var totalRate = days * ratePerDay;
                $('#rateMessage').text('Total rate for borrowing: $' + totalRate + ' for ' + days + ' days');
            });
        </script>

</html>

<?php
include '/../xampp/htdocs/LibraryManagement/views/layouts/footer.php';
?>