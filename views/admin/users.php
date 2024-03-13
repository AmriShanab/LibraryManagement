<?php
include __DIR__ . '/../../config.php';
include __DIR__ . '../../layouts/header.php';

// Get all users from the database
$users = getAllUsers($conn);

// Check if there are users
if (!empty($users)) {}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head section with necessary meta tags, CSS, and other resources -->
</head>

<body>
    <div class="container mt-5">
        <h2>User List</h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>User Type</th>
                    <th>Registration Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through the users and display each row
                foreach ($users as $user) {
                    echo '<tr>';
                    echo '<td>' . $user['user_id'] . '</td>';
                    echo '<td>' . $user['name'] . '</td>';
                    echo '<td>' . $user['username'] . '</td>';
                    echo '<td>' . $user['email'] . '</td>';
                    echo '<td>' . $user['user_type'] . '</td>';
                    echo '<td>' . $user['registration_date'] . '</td>';
                    echo '<td><button class="btn btn-sm btn-outline-primary edit-user-btn" data-toggle="modal" data-target="#editUserModal" data-userid="' . $user['user_id'] . '">Edit User</button></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Centered Add User Button -->
    <div class="container d-flex justify-content-center mt-4">
        <button class="btn rounded-pill px-4 btn-outline-primary light-300" data-toggle="modal" data-target="#addUserModal">
            Add User
        </button>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- User Registration Form -->
                    <form id="addUserForm" method="post" action="add_user.php">
                        <!-- Form fields go here -->
                        <label for="name">Name</label><br>
                        <input type="text" name="name" required><br>
                        <label for="username">Username:</label><br>
                        <input type="text" name="username" required><br>
                        <label for="email">E Mail :</label><br>
                        <input type="email" name="email" required><br>
                        <label for="password">Password</label><br>
                        <input type="password" name="password" required><br>
                        <label for="user_type">User Type</label><br>
                        <select name="user_type" id="userType" required>
                            <option value="choose">Choose</option>
                            <option value="Student">Student</option>
                            <option value="Staff">Staff</option>
                        </select><br>
                        <label for="registrationdate">Registration Date :</label>
                        <input type="date" name="registrationdate" required>
                        <!-- Add other form fields as needed -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    

    <!-- JavaScript to handle Edit User modal -->
    <script>
        $(document).ready(function () {
            // Function to handle Add User form submission
            $('#addUserForm').submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'add_user.php',
                    data: formData,
                    success: function (response) {
                        alert(response);
                        $('#addUserModal').modal('hide');
                        window.location.reload();
                    }
                });
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
