<!DOCTYPE html>
<html lang="en">

<head>
    @include('header')
</head>

<body class="body-clr">
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
                @foreach ($users as $user)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><a href="/users/{{$user->id}}/show_user">{{$user->name}}</a></td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->user_type}}</td>
                    <td>{{$user->created_at}}</td>
                    <td><a href="/users/{{$user->id}}/edit_user" class="btn btn-dark edit-user-btn"><i class="bi bi-pencil-square"></i></a>
                    <a class="btn btn-danger btn-sm" href="/users/{{$user->id}}/delete_user" onclick="return confirm('Are you sure Want to delete this user ??')"><i class="bi bi-trash"></i></a>
                    </td>
                    @endforeach
                </tr>
                
            </tbody>
        </table>
       <a href="users/create_user" class="btn btn-dark">Add User</a> 
    </button>
    </div>
</body>

</html>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
