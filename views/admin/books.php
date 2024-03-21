<?php
include '/../xampp/htdocs/LibraryManagement/config.php';

// Check if the database connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to add a new book
function addBook($conn, $isbn, $title, $author, $genre, $quantity) {
    $query = "INSERT INTO books (isbn, title, author, genre, quantity) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ssssi', $isbn, $title, $author, $genre, $quantity);
    mysqli_stmt_execute($stmt);
}

// Function to get all books or filtered books based on search query
function getBooks($conn, $search_query = '') {
    if (!empty($search_query)) {
        // If search query is provided, filter books based on it
        $query = "SELECT * FROM books WHERE title LIKE ? OR author LIKE ?";
        $search_param = "%$search_query%";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'ss', $search_param, $search_param);
        mysqli_stmt_execute($stmt);
    } else {
        // If no search query, get all books
        $query = "SELECT * FROM books";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_execute($stmt);
    }
    
    $result = mysqli_stmt_get_result($stmt);
    $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $books;
}

// Check if the form is submitted for adding a new book
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addBook'])) {
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $quantity = $_POST['quantity'];

    // Add the new book
    addBook($conn, $isbn, $title, $author, $genre, $quantity);

    // Reload the page using JavaScript after adding a book
    // echo '<script type="text/javascript">location.reload();</script>';
}

// Check if a search query is provided
$search_query = isset($_GET['search']) ? $_GET['search'] : '';

// Get books based on the search query
$books = getBooks($conn, $search_query);

include '/../xampp/htdocs/LibraryManagement/views/layouts/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Books</title>
</head>
<body>

<div class="container mt-4">
    <!-- Search form -->
    <form method="GET" action="books.php" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search books by title or author" name="search" value="<?php echo htmlentities($search_query); ?>">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </div>
    </form>

    <h2>Book List</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Book_id</th>
            <th>ISBN</th>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($books as $book) : ?>
            <tr>
                <td><?php echo $book['book_id']?></td>
                <td><?php echo $book['isbn']; ?></td>
                <td><?php echo $book['title']; ?></td>
                <td><?php echo $book['author']; ?></td>
                <td><?php echo $book['genre']; ?></td>
                <td><?php echo $book['quantity']; ?></td>
                <td><button class="btn btn-sm btn-outline-primary edit-book-btn" data-toggle="modal" data-target="#editBookModal" data-book_id="<?php echo $book['book_id']; ?>">Edit Book</button></td>
                <td><button class="btn btn-sm btn-outline-danger delete-book-btn" data-toggle="modal"  data-book_id="<?php echo $book['book_id']; ?>">Delete Book</button></td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Form to add a new book -->
    <h2>Add New Book</h2>
    <form method="post" action="books.php">
        <div class="form-group">
            <label for="isbn">ISBN:</label>
            <input type="text" class="form-control" name="isbn" required>
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" name="author" required>
        </div>
        <div class="form-group">
            <label for="genre">Genre:</label>
            <input type="text" class="form-control" name="genre" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" name="quantity" required>
        </div>
        <button type="submit" class="btn btn-primary" name="addBook">Add Book</button>
    </form>
</div>

<!-- Edit book modal -->
<div class="modal fade" id="editBookModal" tabindex="-1" role="dialog" aria-labelledby="editBookModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBookModalLabel">Edit Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Edit book form -->
                <form id="editBookForm">
                    <input type="hidden" name="book_id" id="editBookId">
                    <div class="form-group">
                        <label for="editISBN">ISBN:</label>
                        <input type="text" class="form-control" id="editISBN" name="isbn" required>
                    </div>
                    <div class="form-group">
                        <label for="editTitle">Title:</label>
                        <input type="text" class="form-control" id="editTitle" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="editAuthor">Author:</label>
                        <input type="text" class="form-control" id="editAuthor" name="author" required>
                    </div>
                    <div class="form-group">
                        <label for="editGenre">Genre:</label>
                        <input type="text" class="form-control" id="editGenre" name="genre" required>
                    </div>
                    <div class="form-group">
                        <label for="editQuantity">Quantity:</label>
                        <input type="number" class="form-control" id="editQuantity" name="quantity" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="updateBook">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    // Function for handling the edit book modal
    $('.edit-book-btn').click(function(){
        var bookId = $(this).data('book_id');
        $.ajax({
            type: 'POST',
            url: 'get_book.php',
            data: {book_id: bookId},
            dataType: 'json',
            success: function (response) {
                // Check if response contains book details
                if (response) {
                    // Set the values of form fields with book details
                    $('#editBookId').val(response.book_id);
                    $('#editISBN').val(response.isbn);
                    $('#editTitle').val(response.title);
                    $('#editAuthor').val(response.author);
                    $('#editGenre').val(response.genre);
                    $('#editQuantity').val(response.quantity);
                    // Show the edit book modal
                    $('#editBookModal').modal('show');
                } else {
                    alert('Book details not found');
                }
            },
            error: function () {
                // Show an alert
                alert('Error fetching book details');
            }
        });
    });

    // Function to handle edit book form submission
    $('#editBookForm').submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize(); // Define formData variable here
        $.ajax({
            type: 'POST',
            url: 'update_book.php',
            data: formData, // Use formData variable here
            dataType: 'json', // Specify that the expected response type is JSON
            success: function (response) {
                console.log(response); // Log the response received from update_book.php
                if (response.success) {
                    alert(response.success);
                    $('#editBookModal').modal('hide');
                    window.location.reload();
                } else if (response.error) {
                    alert(response.error);
                } else {
                    console.log('Unknown response format:', response); // Log if the response format is unexpected
                    alert('Unknown error occurred');
                }
            },
            error: function () {
                alert('Error in book updating');
            }
        });
    });
});

$(document).ready(function () {
    // Handle click event for delete book button
    $('.delete-book-btn').click(function (e) {
        e.preventDefault(); // Prevent the default behavior of the button
        // Get the book ID from the data attribute
        var bookId = $(this).data('book_id');
        
        // Show confirmation dialog
        var confirmDelete = confirm("Are you sure you want to delete this book?");
        
        // If user confirms deletion
        if (confirmDelete) {
            // Perform AJAX request to delete book
            $.ajax({
                type: 'POST',
                url: 'delete_book.php', // Update this with the correct URL for deleting a book
                data: { book_id: bookId },
                success: function (response) {
                    alert(response); // Show a message indicating success or failure
                    window.location.reload(); // Reload the page to reflect changes
                },
                error: function () {
                    alert('Error in deleting book.'); // Show an error message
                }
            });
        }
    });
});


</script>
</body>
</html>
