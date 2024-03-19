<?php
include '/../xampp/htdocs/LibraryManagement/config.php';
include '/../xampp/htdocs/LibraryManagement/views/layouts/header.php';

// Function to get book borrows with fine
function getBookBorrowsWithFine($conn)
{
    $query = "SELECT bb.*, u.username, b.title
              FROM book_borrow bb
              JOIN users u ON bb.user_id = u.user_id
              JOIN books b ON bb.book_id = b.book_id
              WHERE bb.fine_amount > 0";
    $result = mysqli_query($conn, $query);
    $bookBorrows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $bookBorrows;
}



$bookBorrows = getBookBorrowsWithFine($conn);

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
                    <th>Borrow ID</th>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Book ID</th>
                    <th>Book Title</th>
                    <th>Borrow Date</th>
                    <th>Return Date</th>
                    <th>Fine</th>
                    <th>Action</th>
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
                        <td><?php echo '$' . number_format($borrow['fine_amount'], 2); ?></td>
                        <td>
                            <button class="btn btn-sm btn-info m-2 payment-modal" data-borrowid="<?= $borrow['borrow_id'] ?>">Pay</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Payment Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to pay the fine?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id="confirmPayment">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    $(document).ready(function() {
        $(".payment-modal").click(function() {
            var borrowId = $(this).data('borrowid');
            $("#confirmPayment").data('borrowid', borrowId);
            $('#paymentModal').modal('show');
        });

        $("#confirmPayment").click(function() {
            var borrowId = $("#confirmPayment").data('borrowid');
            if (confirm("Are you sure you want to pay the fine?")) {
                $.ajax({
                    url: 'process_payment.php',
                    method: 'POST',
                    data: {
                        borrow_id: borrowId
                    },
                    success: function(response) {
                        $('#paymentModal').modal('hide');
                        $('tr[data-borrowid="' + borrowId + '"]').remove(); // Remove the row from the table

                        // Set fine_amount to 0 in the database
                        $.ajax({
                            url: 'update_fine.php',
                            method: 'POST',
                            data: {
                                borrow_id: borrowId
                            },
                            success: function(response) {
                                // Handle success if needed
                                console.log('Fine amount set to 0');
                            },
                            error: function(xhr, status, error) {
                                // Handle errors here
                                console.error(xhr.responseText);
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>


</html>
