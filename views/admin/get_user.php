<?php
// Include database connection or any necessary files
include __DIR__ . '/../../config.php';

// Check if user_id is provided in the POST request
if(isset($_POST['user_id'])) {
    // Sanitize the input to prevent SQL injection
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

    // Query to fetch user data based on user_id
    $query = "SELECT * FROM users WHERE user_id = '$user_id'";

    // Perform the query
    $result = mysqli_query($conn, $query);

    // Check if query was successful
    if($result) {
        // Check if user was found
        if(mysqli_num_rows($result) > 0) {
            // Fetch user data as an associative array
            $user = mysqli_fetch_assoc($result);

            // Return user data as JSON response
            echo json_encode($user);
        } else {
            // User with provided user_id not found
            echo json_encode(array('error' => 'User not found'));
        }
    } else {
        // Query failed
        echo json_encode(array('error' => 'Error executing query'));
    }
} else {
    // user_id not provided in POST request
    echo json_encode(array('error' => 'user_id not provided'));
}
?>