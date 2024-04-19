<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookBorrow;
use App\Models\books;
use App\Models\Transaction;
use Carbon\Carbon;

class BookBorrowController extends Controller
{
    public function index()
    {
        $bookBorrows = BookBorrow::paginate(10);
        return view('borrow', ['bookBorrows' => $bookBorrows]);
    }

    public function create()
    {
        $books = books::all();
        return view('create_book_borrow', ['books' => $books]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'book_id' => 'required',
            'borrow_date' => 'required',
            'return_date' => 'required',
            'title' => 'required',
        ]);

        $borrowDate = Carbon::createFromFormat('Y-m-d', $request->borrow_date);
        $returnDate = Carbon::createFromFormat('Y-m-d', $request->return_date);
        $borrowDays = $returnDate->diffInDays($borrowDate);
        $borrowAmount = $borrowDays * 50;

        $borrow = new BookBorrow;
        $borrow->user_id = $request->user_id;
        $borrow->book_id = $request->book_id;
        $borrow->borrow_date = $request->borrow_date;
        $borrow->return_date = $request->return_date;
        $borrow->title = $request->title;
        $borrow->save();


        $book = books::findOrFail($request->book_id);
        $book->quantity -= 1;
        $book->save();


        $transaction = new Transaction;
        $transaction->user_id = $request->user_id;
        $transaction->amount = $borrowAmount;
        $transaction->save();

        return back()->withSuccess('Book Borrowed Successfully');
    }
}
