<?php
include '/../xampp/htdocs/LibraryManagement/config.php';
include '../layouts/header.php';

// Function to fetch all book borrows with status 'Not Returned'
function getNotReturnedBookBorrows($conn)
{
    $query = "SELECT bb.*, u.username, b.title
              FROM book_borrow bb
              JOIN users u ON bb.user_id = u.user_id
              JOIN books b ON bb.book_id = b.book_id
              WHERE bb.status = 'Not Returned' AND bb.fine_amount = 0"; // Add condition for fine_amount
    $result = mysqli_query($conn, $query);
    $bookBorrows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $bookBorrows;
}

// Fetch all not returned book borrows
$notReturnedBookBorrows = getNotReturnedBookBorrows($conn);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Not Returned Books</title>
</head>

<body>

    <div class="container mt-4">
        <h2>Not Returned Books</h2>
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notReturnedBookBorrows as $borrow) : ?>
                    <tr>
                        <td><?php echo $borrow['borrow_id']; ?></td>
                        <td><?php echo $borrow['user_id']; ?></td>
                        <td><?php echo $borrow['username']; ?></td>
                        <td><?php echo $borrow['book_id']; ?></td>
                        <td><?php echo $borrow['title']; ?></td>
                        <td><?php echo $borrow['borrow_date']; ?></td>
                        <td><?php echo $borrow['return_date']; ?></td>
                        <td>
                            <button class="btn btn-primary confirmReturn" data-borrow-id="<?php echo $borrow['borrow_id']; ?>">Return</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".confirmReturn").click(function() {
                var borrowId = $(this).data('borrow-id');
                if (confirm("Are you sure you want to return this book?")) {
                    $.ajax({
                        url: 'returns_book.php',
                        method: 'POST',
                        data: {
                            borrow_id: borrowId
                        },
                        success: function(response) {
                            if (response === 'success') {
                                alert('Book returned successfully.');
                                location.reload(); // Reload the page to reflect the changes
                            } else if (response.startsWith('error')) {
                                alert('Failed to return the book.');
                            } else {
                                alert('Book Returned Successfully.\nFine to Pay: $' + response);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            alert('Error occurred while processing the request.');
                        }
                    });
                }
            });
        });
    </script>

</body>

</html>
