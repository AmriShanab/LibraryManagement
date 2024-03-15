<?php
// Include your configuration file or database connection here
include '../../config.php';
include '../layouts/header.php';
$transactions = getAllTransactions($conn);
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
                    <th>Username</th>
                    <th>Book Title</th>
                    <th>Transaction Type</th>
                    <th>Amount</th>
                    <th>Transaction Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction) : ?>
                    <tr>
                        <td><?= $transaction['transaction_id'] ?></td>
                        <td><?= $transaction['username'] ?></td>
                        <td><?= $transaction['title'] ?></td>
                        <td><?= $transaction['transaction_type'] ?></td>
                        <td><?= $transaction['amount'] ?></td>
                        <td><?= $transaction['transaction_date'] ?></td>
                        <td>
                            <?php if ($transaction['status'] === 'pending') : ?>
                                <span class="badge badge-danger"><?= $transaction['status'] ?>>Pending</span>
                            <?php else : ?>
                                <?= $transaction['status'] ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-info m-2 payment-modal" data-userid="<?= $transaction['user_id'] ?>" data-username="<?= $transaction['username'] ?>" data-booktitle="<?= $transaction['title'] ?>" data-amount="<?= $transaction['amount'] ?>" data-transactionid="<?= $transaction['transaction_id'] ?>">Pay</button>
                            <button class="btn btn-sm btn-primary m-2 invoice-modal">Invoice</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Payment Form Modal -->
    <div id="paymentModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Payment Form</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <form id="paymentForm">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" readonly autocomplete="username">
                        </div>
                        <div class="form-group">
                            <label for="booktitle">Book Title:</label>
                            <input type="text" class="form-control" id="booktitle" readonly autocomplete="booktitle">
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount:</label>
                            <input type="text" class="form-control" id="amount" readonly autocomplete="amount">
                        </div>
                        <!-- Hidden input field for user_id -->
                        <input type="hidden" id="user_id" name="user_id">
                        <button type="button" class="btn btn-primary" id="payNowBtn">Pay Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include your footer HTML or any necessary components here -->
    <?php include '../layouts/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-ajax/dist/jquery.ajax.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.payment-modal').click(function() {
                var userId = $(this).data('userid');
                var username = $(this).data('username');
                var booktitle = $(this).data('booktitle');
                var amount = $(this).data('amount');
                var transactionId = $(this).data('transactionid'); // Retrieve transaction_id
                $('#username').val(username);
                $('#booktitle').val(booktitle);
                $('#amount').val(amount);
                $('#user_id').val(userId); // Set user_id in the hidden input field
                $('#paymentModal').modal('show');
                $('#payNowBtn').attr('data-transactionid', transactionId); // Set transaction_id for payment button
            });

            $('#payNowBtn').click(function() {
                console.log("Pay Now button clicked");
                var userId = $('#user_id').val();
                var transactionId = $(this).data('transactionid'); // Retrieve transaction_id
                $.ajax({
                    type: 'POST',
                    url: 'update_status.php',
                    data: {
                        user_id: userId,
                        transaction_id: transactionId
                    },
                    success: function(response) {
                        console.log("AJAX request successful", response);
                        $('#status_' + userId).text('successful');
                        $('#paymentModal').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        console.log("AJAX request failed:", error);
                        // Handle errors here
                    }
                });
            });

            $('.invoice-modal').click(function() {
                var userId = $(this).data('userid');
                var username = $(this).data('username');
                var booktitle = $(this).data('booktitle');
                var amount = $(this).data('amount');

                // AJAX request to generate receipt PDF
                $.ajax({
                    type: 'POST',
                    url: 'receipt.php',
                    data: {
                        user_id: userId,
                        username: username,
                        booktitle: booktitle,
                        amount: amount
                    },
                    success: function(response) {
                        // Handle success, if needed
                        alert('Receipt generated successfully!');
                        // Optionally, you can redirect the user to the generated PDF
                        // window.location.href = response;
                    },
                    error: function(xhr, status, error) {
                        // Handle error, if needed
                        console.error('Error generating receipt:', error);
                    }
                });
            });
        });
    </script>
</body>

</html>
