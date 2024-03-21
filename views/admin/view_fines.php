<?php
include '/../xampp/htdocs/LibraryManagement/config.php';
include '/../xampp/htdocs/LibraryManagement/views/layouts/header.php';

// Function to get all users with fines
function getUsersWithFines($conn)
{
    $query = "SELECT bb.*, u.username, b.title
              FROM book_borrow bb
              JOIN users u ON bb.user_id = u.user_id
              JOIN books b ON bb.book_id = b.book_id
              WHERE bb.return_date < CURDATE()"; // Select users with books not returned after the return date
    $result = mysqli_query($conn, $query);
    $usersWithFines = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $usersWithFines;
}

$usersWithFines = getUsersWithFines($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Fines</title>
</head>

<body>

    <div class="container mt-4">
        <h2>Fines</h2>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Book ID</th>
                    <th>Book Title</th>
                    <th>Borrow Date</th>
                    <th>Return Date</th>
                    <th>Fine</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usersWithFines as $user) : ?>
                    <tr>
                        <td><?php echo $user['user_id']; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['book_id']; ?></td>
                        <td><?php echo $user['title']; ?></td>
                        <td><?php echo $user['borrow_date']; ?></td>
                        <td><?php echo $user['return_date']; ?></td>
                        <?php
                        $finePerDay = 2;
                        $dueDate = $user['return_date'];
                        $returnDate = date('Y-m-d');
                        $daysLate = max(0, strtotime($returnDate) - strtotime($dueDate)) / (60 * 60 * 24);
                        $fine = $daysLate * $finePerDay;
                        ?>
                        <td><?php echo '$' . number_format($fine, 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
