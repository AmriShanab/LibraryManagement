    <?php
   if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


    $conn = mysqli_connect("localhost","root","","LibraryDB");
    function getUserStatistics($conn)
    {
        $userStatistics = array();

        // Total users
        $queryTotalUsers = "SELECT COUNT(*) as totalUsers FROM users";
        $resultTotalUsers = mysqli_query($conn, $queryTotalUsers);
        $rowTotalUsers = mysqli_fetch_assoc($resultTotalUsers);
        $userStatistics['totalUsers'] = $rowTotalUsers['totalUsers'];

        // Active users
        $queryActiveUsers = "SELECT COUNT(*) as activeUsers FROM users WHERE status = 'active'";
        $resultActiveUsers = mysqli_query($conn, $queryActiveUsers);
        $rowActiveUsers = mysqli_fetch_assoc($resultActiveUsers);
        $userStatistics['activeUsers'] = $rowActiveUsers['activeUsers'];

        // Add more statistics as needed

        return $userStatistics;
    }

    function getTotalBooks($conn) {
        $query = "SELECT COUNT(*) as totalBooks FROM books";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['totalBooks'];
    }

    function getBookStatusStatistics($conn) {
        $query = "SELECT 
                    SUM(CASE WHEN status = 'Available' THEN 1 ELSE 0 END) as availableBooks,
                    SUM(CASE WHEN status = 'Checked-Out' THEN 1 ELSE 0 END) as checkedOutBooks
                FROM books";
        $result = mysqli_query($conn, $query);
        return mysqli_fetch_assoc($result);
    }

    function getBookCategories($conn) {
        $query = "SELECT DISTINCT category, genre FROM books";
        $result = mysqli_query($conn, $query);
        $categories = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }

        return $categories;
    }
    function getAllUsers($conn)
    {
        $query = "SELECT * FROM users";
        $result = mysqli_query($conn, $query);
    
        $users = [];
    
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    
        return $users;
    }
   // Function to get all books
   function getAllBooks($conn) {
    $query = "SELECT * FROM books";
    $result = mysqli_query($conn, $query);

    $books = [];

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $books[] = $row;
        }
    }

    return $books;
}
// Function to get book data by ID
function getBookData($conn, $bookId) {
    $bookData = array();

    $query = "SELECT * FROM books WHERE book_id = " . $bookId;
    $result = mysqli_query($conn, $query);

    if ($result) {
        $bookData = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
    }

    return $bookData;
}


// // Function to add a new book to the database
// function addBook($conn, $title, $author, $genre)
// {
//     $sql = "INSERT INTO books (title, author, genre) VALUES ('$title', '$author', '$genre')";
//     if (mysqli_query($conn, $sql)) {
//         return "Book added successfully";
//     } else {
//         return "Error adding book: " . mysqli_error($conn);
//     }
// }

// Function to delete a book from the database
function deleteBook($conn, $book_id)
{
    $sql = "DELETE FROM books WHERE book_id = $book_id";
    if (mysqli_query($conn, $sql)) {
        return "Book deleted successfully";
    } else {
        return "Error deleting book: " . mysqli_error($conn);
    }
}
    
function getAllTransactions($conn) {
    $query = "SELECT t.transaction_id, t.user_id, u.username, b.title, t.transaction_type, t.amount, t.transaction_date, t.status 
              FROM transactions t 
              JOIN users u ON t.user_id = u.user_id 
              JOIN books b ON t.book_id = b.book_id";
    $result = mysqli_query($conn, $query);
    $transactions = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $transactions;
}




// Close the database connection
//mysqli_close($conn);
?>
