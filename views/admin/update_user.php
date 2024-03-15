<?php
// Include the database connection and any necessary functions
include __DIR__ . '/../../config.php';

// Check if the form data is received via POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the incoming data (you can add more validation as needed)
    $userId = isset($_POST['user_id']) ? $_POST['user_id'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $userType = isset($_POST['user_type']) ? $_POST['user_type'] : '';
    $registrationDate = isset($_POST['registrationdate']) ? $_POST['registrationdate'] : '';

    // Perform the update operation in the database
    $sql = "UPDATE users SET name = ?, username = ?, email = ?, user_type = ?, registration_date = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $name, $username, $email, $userType, $registrationDate, $userId);

    if ($stmt->execute()) {
        // If the update was successful, return a success message
        echo "User information updated successfully";
    } else {
        // If there was an error, return an error message
        echo "Error updating user information: " . $conn->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If the request method is not POST, return an error message
    echo "Invalid request method";
}
?>
