<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <title>User Registration</title>
</head>
<body>
    <h2>User Registration</h2>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 form-wrapper">
                <form action="{{ route('users.store') }}" method="POST" class="form">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control @if ($errors->has('name')) is-invalid @endif" placeholder="Enter Your Name" required>
                        @if ($errors->has('name'))
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control @if ($errors->has('username')) is-invalid @endif" placeholder="Enter Username" required>
                        @if ($errors->has('username'))
                        <div class="invalid-feedback">{{ $errors->first('username') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control @if ($errors->has('email')) is-invalid @endif" placeholder="Enter Your Email" required>
                        @if ($errors->has('email'))
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="usertype" class="form-label">User Type</label>
                        <select name="usertype" id="usertype" class="form-control @if ($errors->has('usertype')) is-invalid @endif" required>
                            <option value="" disabled selected>Select UserType</option>
                            <option value="Student">Student</option>
                            <option value="Staff">Staff</option>
                        </select>
                        @if ($errors->has('usertype'))
                        <div class="invalid-feedback">{{ $errors->first('usertype') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control @if ($errors->has('password')) is-invalid @endif" placeholder="Enter Your Password" required>
                        @if ($errors->has('password'))
                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-dark b1">Add User</button>
                </form>
            </div>
        </div>
    </div>
    <a href="/login">  Login</a>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('submitBtn').addEventListener('click', function(event) {
                event.preventDefault();
                showSuccessMessage(); 
                showErrorMessage(); 
            });
        });

        function showSuccessMessage() {
            var successMessage = document.getElementById('successMessage');
            successMessage.classList.remove('hidden');
            setTimeout(function() {
                successMessage.classList.add('fadeOut');
            }, 3000); 
        }

        function showErrorMessage() {
            var errorMessage = document.getElementById('errorMessage');
            errorMessage.classList.remove('hidden');
            setTimeout(function() {
                errorMessage.classList.add('fadeOut');
            }, 3000); 
        }
    </script>
</body>

</html>