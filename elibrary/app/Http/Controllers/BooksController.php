<?php

namespace App\Http\Controllers;

use App\Models\books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        $books = books::orderBy('book_id')->paginate(5);
        return view('books', ['books' => $books]);
    }

    public function create()
    {
        return view('create_book');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'isbn' => 'required',
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'category' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:jpeg,jpg,png,webp,gif|max:20000',
        ]);

        $imageName = time() . "." . $request->image->extension();
        $request->image->move(public_path('pictures'), $imageName);

        $book = new books;
        $book->image = $imageName;
        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->genre = $request->genre;
        $book->category = $request->category;
        $book->quantity = $request->quantity;
        $book->save();
        return back()->withSuccess('Book Added Succesful');
    }

    public function show($book_id)
    {
        $book = books::where('book_id', $book_id)->first();
        return view('show_book', ['book' => $book]);
    }

    public function edit($book_id)
    {
        $book = books::where('book_id', $book_id)->first();
        return view('edit_book', ['book' => $book]);
    }

    public function update(Request $request, $book_id)
    {
        $request->validate([
            'isbn' => 'required',
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'category' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'nullable|mimes:jpeg,jpg,png,webp,gif|max:20000',
        ]);

        $book = books::where('book_id', $book_id)->first();

        if ($request->hasFile('image')) {
            // If image is uploaded, handle it
            $imageName = time() . "." . $request->image->extension();
            $request->image->move(public_path('pictures'), $imageName);
            $book->image = $imageName;
        }

        // Update other fields
        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->genre = $request->genre;
        $book->category = $request->category;
        $book->quantity = $request->quantity;
        $book->save();

        return back()->withSuccess('Book updated successfully');
    }

    public function destroy($book_id)
    {
        $book = books::where('book_id', $book_id)->first();
        $book->delete();
        return back()->withSuccess(' Delete Succeful');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $books = books::where('title', 'like', "%$search%")
            ->orWhere('author', 'like', "%$search%")
            ->paginate(10);

        return view('books', compact('books'));
    }

    public function nonfiction()
    {
        return view('booktypes.non-fiction');
    }

    public function fiction()
    {
        return view('booktypes.fiction');
    }

    public function technology()
    {
        return view('booktypes.technology');
    }

    public function scienceNature()
    {
        return view('booktypes.science_nature');
    }

    public function children()
    {
        return view('booktypes.children');
    }

    public function getBookId(Request $request)
    {
        $title = $request->input('title');
        $book = books::where('title', $title)->first();

        if ($book) {
            return response()->json(['book_id' => $book->book_id]);
        } else {
            return response()->json(['error' => 'Book not found'], 404);
        }
    }
}
