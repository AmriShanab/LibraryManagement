<?php
// Include your configuration file or database connection here
include '../../config.php';

// Check if user_id and transaction_id are provided
if (isset($_POST['user_id']) && isset($_POST['transaction_id'])) {
    $userId = $_POST['user_id'];
    $transactionId = $_POST['transaction_id'];

    // Update the status in the database
    $query = "UPDATE transactions SET status = 'Success' WHERE transaction_id = $transactionId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Return success response
        echo json_encode(['status' => 'success']);
    } else {
        // Return error response
        echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]);
    }
} else {
    // Return error response if user_id or transaction_id is not provided
    echo json_encode(['status' => 'error', 'message' => 'User ID or Transaction ID not provided']);
}
?>
