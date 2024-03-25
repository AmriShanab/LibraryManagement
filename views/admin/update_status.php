<?php

include '../../config.php';


if (isset($_POST['user_id']) && isset($_POST['transaction_id'])) {
    $userId = $_POST['user_id'];
    $transactionId = $_POST['transaction_id'];

    $query = "UPDATE transactions SET status = 'Success' WHERE transaction_id = $transactionId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        
        echo json_encode(['status' => 'success']);
    } else {
       
        echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]);
    }
} else {
    
    echo json_encode(['status' => 'error', 'message' => 'User ID or Transaction ID not provided']);
}
?>
