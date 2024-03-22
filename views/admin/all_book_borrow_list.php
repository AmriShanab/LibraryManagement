<?php
include '/../xampp/htdocs/LibraryManagement/config.php';
include '/../xampp/htdocs/LibraryManagement/views/layouts/header.php';

// Function to get all book borrows with fine
function getAllBookBorrows($conn)
{
    $query = "SELECT bb.*, u.username, b.title, IFNULL(bb.fine_amount, 0) AS fine
              FROM book_borrow bb
              JOIN users u ON bb.user_id = u.user_id
              JOIN books b ON bb.book_id = b.book_id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $bookBorrows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $bookBorrows;
    } else {
        return array(); 
    }
}

$bookBorrows = getAllBookBorrows($conn);
$returnDate = date('Y-m-d');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($bookBorrows as &$borrow) {
        $borrowId = $borrow['borrow_id'];
        $status = isset($_POST['status_' . $borrowId]) ? $_POST['status_' . $borrowId] : 'Not returned';
    
        // if returned date pass shows in not returend as a red color
        if ($status == 'Not returned' && strtotime($borrow['return_date']) < strtotime($returnDate)) {
            echo "<script>document.getElementById('status_" . $borrowId . "').style.color = 'red';</script>";
            
            $dueDate = strtotime($borrow['return_date']);
            $currentDate = strtotime($returnDate);
            $daysLate = ceil(abs($currentDate - $dueDate) / 86400); 
            $fine = $daysLate * 2; 
    
            $updateQuery = "UPDATE book_borrow SET fine_amount = $fine WHERE borrow_id = $borrowId";
            mysqli_query($conn, $updateQuery);
        }
    
        returnBook($conn, $borrowId, $returnDate, $status);
    }
}
function compareBookBorrow($a, $b) {
    return $a['borrow_id'] - $b['borrow_id'];
}

usort($bookBorrows, 'compareBookBorrow');

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
                            <?php if ($borrow['status'] === 'Returned') : ?>
                                <span class="badge badge-success"><?= $borrow['status'] ?></span>
                            <?php elseif ($borrow['status'] === 'Not Returned') : ?>
                                <span class="badge badge-danger"><?= $borrow['status'] ?></span>
                            <?php else : ?>
                                <span class="badge bg-info"><?= $borrow['status'] ?></span>
                            <?php endif; ?>
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
