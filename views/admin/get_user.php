<?php
include __DIR__ . '/../../config.php';

if(isset($_POST['user_id'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

    $query = "SELECT * FROM users WHERE user_id = '$user_id'";

    $result = mysqli_query($conn, $query);

    if($result) {
        if(mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            echo json_encode($user);
        } else {
            echo json_encode(array('error' => 'User not found'));
        }
    } else {
        echo json_encode(array('error' => 'Error executing query'));
    }
} else {
    echo json_encode(array('error' => 'user_id not provided'));
}
?>