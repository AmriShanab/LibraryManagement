<?php
include __DIR__ . '/../../config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = isset($_POST['user_id']) ? $_POST['user_id'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $userType = isset($_POST['user_type']) ? $_POST['user_type'] : '';
    $registrationDate = isset($_POST['registrationdate']) ? $_POST['registrationdate'] : '';

    
    $sql = "UPDATE users SET name = ?, username = ?, email = ?, user_type = ?, registration_date = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $name, $username, $email, $userType, $registrationDate, $userId);

    if ($stmt->execute()) {
      
        echo "User information updated successfully";
    } else {
        
        echo "Error updating user information: " . $conn->error;
    }

    
    $stmt->close();
    $conn->close();
} else {
    
    echo "Invalid request method";
}
?>
