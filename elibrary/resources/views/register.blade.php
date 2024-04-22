<!DOCTYPE html>
<html lang="en">

<head>
    <head>
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="{{asset('images/apple-icon.png')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}">
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="{{asset('css/boxicon.min.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="{{asset('css/templatemo.css')}}">
        <link rel="stylesheet" href="{{asset('CSS/custom.css')}}">
        <link rel="stylesheet" href="{{asset('CSS/card.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
        </head>
    <title>User Registration</title>
    <style>
        body{
            background-image: url('/images/Designer.jpeg'); /* Path from the public directory */
            margin: 0;
            padding: 0;
            background-image: url('/images/Designer.jpeg'); /* Path from the public directory */
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        
    </style>
</head>
<body>
    <h2 class="text-white fw-bold">User Registration</h2>


            
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