@extends('header')
@section('main')
<div class="container mt-4">
    <!-- Search form -->
    <form method="GET" action="{{ route('books.search') }}" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search books by title or author" name="search" value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </div>
    </form>

    <h2>Book List</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Book_id</th>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            @php
                $index = ($books->currentPage()-1) * $books->perPage() + $loop->iteration;
            @endphp
            <tr>
                <td>{{$index}}</td>
                <td><a href="/books/{{$book->book_id}}/show_book">{{$book->title}}</a></td>
                <td>{{$book->author}}</td>
                <td>{{$book->genre}}</td>
                <td>{{$book->quantity}}</td>
                <td><img src="pictures/{{$book->image}}" alt="" style="width: 50px; height: 50px; object-fit: contain" alt="books"></td>
                <td>
                    {{-- <a href="/books/create_book" class="btn btn-dark btn-sm"><i class="bi bi-plus"></i></a> --}}
                    <a href="/books/{{$book->book_id}}/edit_book" class="btn btn-dark edit-book-btn"><i class="bi bi-pencil-square"></i></a>
                    <a class="btn btn-danger btn-sm" href="/books/{{$book->book_id}}/delete_book" onclick="return confirm('Are you sure Want to delete this book ??')"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $books->links() }}

    <div class="center"><a href="/books/create_book" class="btn btn-dark btn-lg"><i class="bi bi-plus"> Add Book</i></a></div>
</div>
@endsection
