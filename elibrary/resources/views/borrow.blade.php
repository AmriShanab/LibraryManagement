@extends('header')
@section('main')
<body class="body-clr">
    <div class="container">
        <h2 class="mt-4 fw-bold">Borrowers List</h2>
    
        <table class="table table-striped mt-3">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Borrow ID</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Book ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Borrowed Date</th>
                    <th scope="col">Returned Date</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookBorrows as $bookBorrow)
                @php
                    $index = ($bookBorrows->currentPage()-1) * $bookBorrows->perPage() + $loop->iteration;
                @endphp
                <tr>
                    <td>{{$index}}</td>
                    <td>{{$bookBorrow->user_id}}</td>
                    <td>{{$bookBorrow->book_id}}</td>
                    <td>{{$bookBorrow->title}}</td>
                    <td>{{$bookBorrow->borrow_date}}</td>
                    <td>{{$bookBorrow->return_date}}</td>
                    <td>{{$bookBorrow->status}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    
        <div class="text-center">
            {{ $bookBorrows->links() }}
            <a href="/borrow/create_book_borrow" class="btn btn-dark mt-3"><i class="bi bi-plus"></i> Book Borrow</a>
        </div>
    </div> 
</body>


@endsection
