<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Library Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
      body {
    margin: 0;
    padding: 0;
    background-image: url('/images/Designer.jpeg'); /* Path from the public directory */
    background-size: cover;
    background-repeat: no-repeat;
    height: 100vh;
    font-family: Arial, sans-serif;
}

/* Login Styles */
.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 100vh;
}

.login-card {
    width: 400px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    background-color: rgba(0, 0, 0, 0.6); /* Black color with some transparency */
}

.login-header {
    background-color: black;
    color: #fff !important;
    border-radius: 10px 10px 0 0;
    text-align: center;
    padding: 20px;
    font-size: 24px;
}

.login-body {
    padding: 20px;
}

.login-form-group {
    margin-bottom: 20px;
}

.login-btn {
    width: 100%;
    
}

.login-register-link {
    text-align: center;
}

.log-header{
    background-color: rgba(0, 0, 0, 0.5) !important;}

.btn-dark{
    background-color: black !important;
}
    </style>
</head>
<body>
    <!-- E-Library Heading -->
    <div class="container-fluid bg-dark text-light py-3 log-header" style="">
        <h1 class="text-center">E-Library</h1>
    </div>
    

    <!-- Login Form -->
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h2>Login</h2>
            </div>
            <div class="login-body">
                <form action="{{ route('login.submit') }}" method="post">                            
                    @csrf
                    <div class="login-form-group">
                        <label for="username" style="color: #fff">Username:</label>
                        <input type="text" name="username" class="form-control" required>
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="login-form-group">
                        <label for="password" style="color: #fff">Password:</label>
                        <input type="password" name="password" class="form-control" required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-dark login-btn">Login</button><br><br>
                    <button type="button" class="btn btn-dark login-btn"><a href="/guest" style="color: white;">Login as Guest</a></button>
                </form>
                <div class="login-register-link">
                    <p style="color: #fff">Don't have an account? <a href="/register" class="btn-register" style="color: white">Register</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
