<?php
// Include the database connection
include __DIR__ . '/../../config.php';
include "/xampp/htdocs/LibraryManagement/views/admin/users.php";

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the "action" parameter is set in the POST data
    if (isset($_POST["action"])) {
        $action = $_POST["action"]; // Retrieve the value of the "action" parameter

        // Depending on the value of "action", call the corresponding function
        switch ($action) {
            case 'update':
                updateUser($conn); // Call the updateUser function
                break;
            case 'add':
                addUser($conn); // Call the addUser function
                break;
            case 'get':
                getUser($conn); // Call the getUser function
                break;
            case 'delete':
                deleteUser($conn); // Call the deleteUser function
                break;
            default:
                echo "Invalid action."; // Handle the case where "action" is not recognized
                break;
        }
    } else {
        echo "Action not specified."; // Handle the case where "action" parameter is not set
    }
} else {
    echo "Invalid request method."; // Handle the case where the request method is not POST
}


// Function to update user information
function updateUser($conn) {
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

    // Close the statement
    $stmt->close();
}

// Function to add a new user
function addUser($conn) {
    // Retrieve form data
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $userType = $_POST['user_type'];
    $registrationDate = $_POST['registrationdate'];

    // Insert data into the database
    $query = "INSERT INTO users (name, username, email, password, user_type, registration_date) VALUES ('$name', '$username', '$email', '$password', '$userType', '$registrationDate')";
    
    if (mysqli_query($conn, $query)) {
        echo "User added successfully!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// Function to get user information
function getUser($conn) {
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
}

// Function to delete a user
function deleteUser($conn) {
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
}

// Close the database connection
$conn->close();
?>
