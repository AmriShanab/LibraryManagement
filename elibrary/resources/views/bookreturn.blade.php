@extends('header')
@section('main')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Not Returned Books</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
</head>

<body class="body-clr">

    <div class="container mt-4">
        <h2 class="fw-bold">Not Returned Books</h2>
        <!-- Search form -->
        <form method="GET" action="{{ route('borrows.search') }}">
            <div class="form-group">
                <input type="text" class="form-control" name="search" placeholder="Search by Borrow ID or Book Title" value="{{ request('search') }}">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <br>
        
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Borrow ID</th>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Book ID</th>
                    <th>Book Title</th>
                    <th>Borrow Date</th>
                    <th>Return Date</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Fines (LKR)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrows as $borrow)
                    @php
                        $returnDate = new DateTime($borrow->return_date);
                        $today = new DateTime();
                        $isPastDue = $returnDate < $today;
                        $fine = $isPastDue ? $today->diff($returnDate)->days * 75 : 0;
                    @endphp
                    <tr class="{{ $isPastDue ? 'past-due' : '' }}">
                        <td>{{ $borrow->id }}</td> 
                        <td>{{ $borrow->user_id }}</td>
                        <td>{{ $borrow->user->username }}</td> 
                        <td>{{ $borrow->book_id }}</td>
                        <td>{{ $borrow->book->title }}</td> 
                        <td>{{ $borrow->borrow_date }}</td>
                        <td>{{ $borrow->return_date }}</td>
                        <td>{{ $borrow->status }}</td>
                        <td>
                            <button class="btn btn-primary confirmReturn" data-id="{{ $borrow->id }}">Return</button>
                        </td>
                        <td>{{ $fine }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('footer');

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
   
    <script>
        $(document).ready(function() {
            $('.confirmReturn').click(function() {
                var borrowId = $(this).data('id');
                console.log('Borrow ID:', borrowId); 
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: '{{ route("update-borrow-status") }}',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: {
                        id: borrowId,
                        status: 'returned'
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            alert('Status updated successfully!');
                            location.reload();
                        } else {
                            alert('Failed to update status.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX request failed:", error);
                        console.log(xhr.responseText); 
                    }
                });
            });
        });
    </script>
</body>

</html>
@endsection
