<?php

use App\Http\Controllers\BookBorrowController;
use App\Http\Controllers\BookReturnController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// ROutes for home section
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [HomeController::class, 'index'])->name('home.index');


// Route for books section
Route::get('/books', [BooksController::class, 'index'])->name('books.index');
Route::get('/books/create_book', [BooksController::class, 'create']);
Route::post('/books/store_book', [BooksController::class, 'store']);
Route::get('/books/{id}/show_book', [BooksController::class, 'show']);
Route::get('/books/{book_id}/edit_book', [BooksController::class, 'edit']);
Route::put('/books/{book_id}/update_book', [booksController::class, 'update']);
Route::get('/books/{book_id}/delete_book', [booksController::class, 'destroy']);
Route::get('/books/search', [booksController::class, 'search'])->name('books.search');
Route::get('/non-fiction', [BooksController::class, 'nonfiction']);
Route::get('/fiction', [BooksController::class, 'fiction']);
Route::get('/technology', [BooksController::class, 'technology']);
Route::get('/science', [BooksController::class, 'scienceNature']);
Route::get('/children', [BooksController::class, 'children']);


// Routes for Users Section
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create_user', [UserController::class, 'create']);
Route::post('/users/store_user', [UserController::class, 'store']);
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}/show_user', [UserController::class, 'show']);
Route::get('/users/{id}/edit_user', [UserController::class, 'edit']);
Route::put('/users/{id}/update_user', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{id}/delete_user', [UserController::class, 'destroy']);



// Routes to Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'submit'])->name('login.submit');
Route::get('/register', [LoginController::class, 'register']);
Route::post('/register/store', [LoginController::class, 'registerUser']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/home/student', [LoginController::class, 'student'])->name('home.student');
Route::get('/guest', [LoginController::class, 'guest']);


// routes for borrow section
Route::post('/borrow', [BookBorrowController::class, 'borrow'])->name('book.borrow');
Route::get('/index/borrow', [BookBorrowController::class, 'index'])->name('borrow.index');
Route::get('/borrow/create_book_borrow', [BookBorrowController::class, 'create']);
Route::post('/store_book_borrow', [BookBorrowController::class, 'store']);
Route::get('/get-book-id', [booksController::class, 'getBookId'])->name('get-book-id');



// routes for transaction
Route::post('/update-status', [TransactionController::class, 'updateStatus'])->name('update.status');
Route::post('/transactions/search', [TransactionController::class, 'search'])->name('transactions.search');
Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');


// ROutes for book return section
Route::post('/update-borrow-status', [BookReturnController::class, 'updateBorrowStatus'])->name('update-borrow-status');
Route::get('/borrows/search', [BookReturnController::class, 'search'])->name('borrows.search');
Route::get('/bookreturn', [BookReturnController::class, 'index'])->name('bookreturn.index');
