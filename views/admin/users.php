<?php
include __DIR__ . '/../../config.php';
include __DIR__ . '/../layouts/header.php';

// Get all users from the database
$users = getAllUsers($conn);

// Check if there are users
if (!empty($users)) {}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   
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
                    echo '<td><button class="btn btn-sm btn-outline-primary edit-user-btn" data-toggle="modal" data-target="#editUserModal" data-userid="' . $user['user_id'] . '">Edit User</button>';
                    echo '<td><button class="btn btn-sm btn-outline-danger delete-user-btn" data-toggle="modal"  data-userid="' . $user['user_id'] . '">Delete User</button></td>';


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
    
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- User Edit Form -->
                <form id="editUserForm">
                    <input type="hidden" name="user_id" id="editUserId">
                    <label for="editName">Name</label><br>
                    <input type="text" name="name" id="editName" required><br>
                    <label for="editUsername">Username:</label><br>
                    <input type="text" name="username" id="editUsername" required><br>
                    <label for="editEmail">E Mail :</label><br>
                    <input type="email" name="email" id="editEmail" required><br>
                    <label for="editUserType">User Type</label><br>
                    <select name="user_type" id="editUserType" required>
                        <option value="Student">Student</option>
                        <option value="Staff">Staff</option>
                    </select><br>
                    <label for="editRegistrationDate">Registration Date :</label>
                    <input type="date" name="registrationdate" id="editRegistrationDate" required>
                    <!-- Add other form fields as needed -->
                    <button type="submit" class="btn btn-primary" name="updateBook">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-ajax/dist/jquery.ajax.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>

<script>
$(document).ready(function () {
    // Function to handle Edit User modal
    $('.edit-user-btn').click(function () {
        var userId = $(this).data('userid');
        $.ajax({
            type: 'POST',
            url: 'get_user.php',
            data: { user_id: userId },
            dataType: 'json',
            success: function (response) {
                // Check if response contains user details
                if (response) {
                    // Set the values of form fields with user details
                    $('#editUserId').val(response.user_id);
                    $('#editName').val(response.name);
                    $('#editUsername').val(response.username);
                    $('#editEmail').val(response.email);
                    $('#editUserType').val(response.user_type);
                    $('#editRegistrationDate').val(response.registration_date);
                    // Show the Edit User modal
                    $('#editUserModal').modal('show');
                } else {
                    // Show an alert or handle the case where user details are not found
                    alert('User details not found.');
                }
            },
            error: function () {
                // Show an alert or handle the case where there's an error in fetching user details
                alert('Error in fetching user details.');
            }
        });
    });
});


        // Function to handle Edit User form submission
        $('#editUserForm').submit(function (e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: 'update_user.php', // Update this with the correct URL
                data: formData,
                success: function (response) {
                    alert(response); // Show a message indicating success or failure
                    $('#editUserModal').modal('hide');
                    window.location.reload(); // Reload the page to reflect changes
                },
                error: function () {
                    alert('Error in updating user.'); // Show an error message
                }
            });
        });
    

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

        $(document).ready(function () {
    // Handle click event for delete user button
    $('.delete-user-btn').click(function (e) {
        e.preventDefault(); // Prevent the default behavior of the button
        // Get the user ID from the data attribute
        var userId = $(this).data('userid');
        
        // Show confirmation dialog
        var confirmDelete = confirm("Are you sure you want to delete this user?");
        
        // If user confirms deletion
        if (confirmDelete) {
            // Perform AJAX request to delete user
            $.ajax({
                type: 'POST',
                url: 'delete_user.php', // Update this with the correct URL
                data: { user_id: userId },
                success: function (response) {
                    alert(response); // Show a message indicating success or failure
                    window.location.reload(); // Reload the page to reflect changes
                },
                error: function () {
                    alert('Error in deleting user.'); // Show an error message
                }
            });
        }
    });
});
        
    </script>

  
    
</body>

</html>
