<?php
include '/../xampp/htdocs/LibraryManagement/config.php';

// Placeholder function to get all book borrows (replace it with your actual function)
function getAllBookBorrows($conn) {
    $query = "SELECT bb.*, u.username, b.title
              FROM book_borrow bb
              JOIN users u ON bb.user_id = u.user_id
              JOIN books b ON bb.book_id = b.book_id";
    $result = mysqli_query($conn, $query);
    $bookBorrows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $bookBorrows;
}

// Placeholder function to return a book (replace it with your actual function)
function returnBook($conn, $borrowId, $returnDate, $status) {
    // Your logic to update the database (e.g., update return date and status in the book_borrow table)
    $query = "UPDATE book_borrow SET return_date = '$returnDate', status = '$status' WHERE borrow_id = $borrowId";
    mysqli_query($conn, $query);

    return "Book returned successfully";
}

$bookBorrows = getAllBookBorrows($conn);

// Check if the form is submitted for returning a book
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($bookBorrows as $borrow) {
        $borrowId = $borrow['borrow_id'];
        $returnDate = date('Y-m-d');
        $status = isset($_POST['status_' . $borrowId]) ? $_POST['status_' . $borrowId] : 'Not returned';

        // If the return date has passed, change the status to 'Not returned' and set the font color to red
        if ($status == 'Not returned' && strtotime($borrow['return_date']) < strtotime($returnDate)) {
            echo "<script>document.getElementById('status_" . $borrowId . "').style.color = 'red';</script>";
        }

        // Update the status in the database
        returnBook($conn, $borrowId, $returnDate, $status);
    }
}

include '/../xampp/htdocs/LibraryManagement/views/layouts/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>All Book Borrow Records</title>
</head>
<body>

<div class="container mt-4">
    <h2>All Book Borrow Records</h2>
    <form method="post" action="">
    <table class="table">
        <thead>
            <tr>
                <th>Borrow ID</th>
                <th>User ID</th>
                <th>Username</th>
                <th>Book ID</th>
                <th>Book Title</th>
                <th>Borrow Date</th>
                <th>Return Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookBorrows as $borrow) : ?>
                <tr>
                    <td><?php echo $borrow['borrow_id']; ?></td>
                    <td><?php echo $borrow['user_id']; ?></td>
                    <td><?php echo $borrow['username']; ?></td>
                    <td><?php echo $borrow['book_id']; ?></td>
                    <td><?php echo $borrow['title']; ?></td>
                    <td><?php echo $borrow['borrow_date']; ?></td>
                    <td><?php echo $borrow['return_date']; ?></td>
                    <td>
                        <?php 
                        // Set the font color of 'Not returned' to red if return date has passed
                        $statusColor = ($borrow['status'] == 'Not returned' && strtotime($borrow['return_date']) < strtotime(date('Y-m-d'))) ? 'color:red;' : '';
                        echo '<span style="'.$statusColor.'">'.$borrow['status'].'</span>'; 
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button type="submit" class="btn rounded-pill px-4 btn-outline-primary light-300">Update Status</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
include '/../xampp/htdocs/LibraryManagement/views/layouts/footer.php';
?>
