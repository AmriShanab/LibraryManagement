<?php
include __DIR__ . '/../../config.php';

// Check if user_id is set and not empty
if(isset($_POST['user_id']) && !empty($_POST['user_id'])) {
    // Sanitize user_id to prevent SQL injection
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

    // SQL query to delete user
    $query = "DELETE FROM users WHERE user_id = $user_id";

    // Execute the query
    if(mysqli_query($conn, $query)) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request."; // Return an error message if user_id is not set or empty
}
?>