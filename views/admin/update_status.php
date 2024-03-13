<?php
// Include your configuration file or database connection here
include '../../config.php';

// Check if user_id and transaction_id are sent via POST
if(isset($_POST['user_id']) && isset($_POST['transaction_id'])) {
    // Retrieve user_id and transaction_id sent via POST
    $user_id = $_POST['user_id'];
    $transaction_id = $_POST['transaction_id'];

    // Update status in the database for the specific transaction
    $query = "UPDATE transactions SET status = 'successful' WHERE user_id = '$user_id' AND transaction_id = '$transaction_id'";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if($result) {
        // Status update successful
        $response = array('status' => 'success', 'message' => 'Status updated successfully');
        echo json_encode($response);
    } else {
        // Status update failed
        $response = array('status' => 'error', 'message' => 'Failed to update status');
        echo json_encode($response);
    }
} else {
    // Handle invalid request (user_id or transaction_id not sent)
    $response = array('status' => 'error', 'message' => 'Invalid request');
    echo json_encode($response);
}
?>
