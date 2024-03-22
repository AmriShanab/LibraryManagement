<?php
include __DIR__ . '/../../config.php';

if(isset($_POST['user_id']) && !empty($_POST['user_id'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

    $query = "DELETE FROM users WHERE user_id = $user_id";

    if(mysqli_query($conn, $query)) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request."; 
}
?>