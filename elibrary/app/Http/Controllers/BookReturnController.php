<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookBorrow;

use App\Models\books;

class BookReturnController extends Controller
{
    public function updateBorrowStatus(Request $request)
    {
        $request->validate([
            'id' => 'exists:book_borrow,id',
            'status' => 'required|string',
        ]);

        $borrows = BookBorrow::findOrFail($request->id);
        $borrows->status = $request->status;
        $borrows->save();


        if ($request->status === 'Returned') {
            $book = books::findOrFail($borrows->book_id);
            $book->quantity++;
            $book->save();
        }

        return response()->json(['status' => 'success']);
    }



    public function index()
    {
        $user = auth()->user();
        if ($user->user_type === 'Student') {
            $notReturnedBookBorrows = BookBorrow::where('status', 'Not Returned')
                ->where('fine_amount', 0)
                ->where('user_id', $user->id)
                ->join('books', 'book_borrow.book_id', '=', 'books.book_id')
                ->select('book_borrow.*', 'books.title')
                ->get();
        } else {
            $notReturnedBookBorrows = BookBorrow::where('status', 'Not Returned')
                ->where('fine_amount', 0)
                ->join('users', 'book_borrow.user_id', '=', 'users.id')
                ->join('books', 'book_borrow.book_id', '=', 'books.book_id')
                ->select('book_borrow.*', 'users.username', 'books.title')
                ->get();
        }

        return view('bookreturn', ['borrows' => $notReturnedBookBorrows]);
    }


    public function search(Request $request)
    {
        $search = $request->input('search');
        $borrows = BookBorrow::where('id', 'like', "%$search%")
            ->orWhereHas('book', function ($query) use ($search) {
                $query->where('title', 'like', "%$search%");
            })
            ->get();
        return view('bookreturn', compact('borrows'));
    }
}
