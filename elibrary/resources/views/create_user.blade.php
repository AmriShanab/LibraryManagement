@extends('header')
@section('main')

<body class="body-clr">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>

@endsection
