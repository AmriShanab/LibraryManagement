<?php
include '/../xampp/htdocs/LibraryManagement/config.php';

// Function to get all book borrows with fine (replace it with your actual function)
function getAllBookBorrows($conn)
{
    $query = "SELECT bb.*, u.username, b.title, IFNULL(bb.fine_amount, 0) AS fine
              FROM book_borrow bb
              JOIN users u ON bb.user_id = u.user_id
              JOIN books b ON bb.book_id = b.book_id";
    $result = mysqli_query($conn, $query);
    $bookBorrows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $bookBorrows;
}

$bookBorrows = getAllBookBorrows($conn);

// Initialize the return date once outside of the loop
$returnDate = date('Y-m-d');

// Check if the form is submitted for returning a book
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($bookBorrows as &$borrow) {
        $borrowId = $borrow['borrow_id'];
        $status = isset($_POST['status_' . $borrowId]) ? $_POST['status_' . $borrowId] : 'Not returned';
    
        // If the return date has passed, change the status to 'Not returned' and set the font color to red
        if ($status == 'Not returned' && strtotime($borrow['return_date']) < strtotime($returnDate)) {
            echo "<script>document.getElementById('status_" . $borrowId . "').style.color = 'red';</script>";
        }
    
        // Calculate fine if return date has passed
        if ($status == 'Not returned' && strtotime($borrow['return_date']) < strtotime($returnDate)) {
            $dueDate = strtotime($borrow['return_date']);
            $currentDate = strtotime($returnDate);
            $daysLate = ceil(abs($currentDate - $dueDate) / 86400); // Calculate number of days late
            $fine = $daysLate * 1; // Fine per day is $1
        } else {
            $fine = 0; // No fine if book is returned on time
        }
    
        // Update the status and fine in the database
        returnBook($conn, $borrowId, $returnDate, $status);
        // Assign the fine amount to the 'fine' key in the $borrow array
        $borrow['fine'] = $fine;
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
                        <th>Fine</th>
                        <!-- <th>Due Amount</th> -->
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
                                echo '<span id="status_' . $borrow['borrow_id'] . '" style="' . $statusColor . '">' . $borrow['status'] . '</span>';
                                ?>
                            </td>
                            <td>
    <?php
    // Check if fine is numeric before formatting
    if (is_numeric($borrow['fine'])) {
        echo '$' . number_format((float)$borrow['fine'], 2);
    } else {
        echo $borrow['fine']; // If not numeric, just echo the value as is
    }
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