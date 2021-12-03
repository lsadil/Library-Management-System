<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Models\Book;
use App\Models\Category;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('books', [
        'books' => Book::with('category')->get()
    ]);
});

Route::get('EditBook/{book:slug}', function (Book $book) {
    return view('editBook', [
        'book' => $book
    ]);
});

Route::get('Books', function () {
    return view('books', [
        'books' => Book::all()
    ]);
});

Route::get('AddBook', function () {
    return view('addBook');
});

Route::get('editCategory/{category:slug}', function (Category $category) {
    return view('books', [
        'books' => $category
    ]);
});

Route::get('Categories', function () {
    return view('categories', [
        'categories' => Category::all()
    ]);
});

Route::post('EditBook/{book:slug}/update', [BookController::class, 'update']);
Route::post('EditBook/{book:slug}/delete', [BookController::class, 'destroy']);
Route::post('AddBook/add', [BookController::class, 'create']);
