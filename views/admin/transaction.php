<?php
// Include your configuration file or database connection here
include '../../config.php';

// Function to get all transactions (replace it with your actual function)
function getAllTransactions($conn) {
    $query = "SELECT * FROM transactions";
    $result = mysqli_query($conn, $query);
    $transactions = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $transactions;
}

// Fetch all transactions
$transactions = getAllTransactions($conn);

// Include your header HTML or any necessary components here
include '../layouts/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Transaction List</title>
</head>
<body>

<div class="container mt-4">
    <h2>Transaction List</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Transaction ID</th>
                <th>User ID</th>
                <th>Book ID</th>
                <th>Transaction Type</th>
                <th>Amount</th>
                <th>Transaction Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($transactions as $transaction) {
                echo '<tr>';
                echo '<td>' . $transaction['transaction_id'] . '</td>';
                echo '<td>' . $transaction['user_id'] . '</td>';
                echo '<td>' . $transaction['book_id'] . '</td>';
                echo '<td>' . $transaction['transaction_type'] . '</td>';
                echo '<td>' . $transaction['amount'] . '</td>';
                echo '<td>' . $transaction['transaction_date'] . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Include your footer HTML or any necessary components here -->
<?php
include '../layouts/footer.php';
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstra
