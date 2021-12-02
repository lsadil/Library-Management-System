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

<<<<<<< HEAD
=======
//Books
Route::get('Books', function () {
    return view('books', [
        'books' => Book::all()
    ]);
});

>>>>>>> e9d35f0ce888892edaac7db5a06618212e46c270
Route::get('EditBook/{book:slug}', function (Book $book) {
    return view('editBook', [
        'book' => $book
    ]);
});

<<<<<<< HEAD
Route::get('Books', function () {
    return view('books', [
        'books' => Book::all()
    ]);
});

=======
>>>>>>> e9d35f0ce888892edaac7db5a06618212e46c270
Route::get('AddBook', function () {
    return view('addBook');
});

<<<<<<< HEAD
Route::get('editCategory/{category:slug}', function (Category $category) {
    return view('books', [
        'books' => $category
    ]);
});

Route::get('Categories', function () {
    return view('categories', [
        'categories' => Category::all()
=======
Route::get('Subscribers', function (Subscriber $subscriber) {
    return view('subscribers', [
        'subscribers' => $subscriber
>>>>>>> e9d35f0ce888892edaac7db5a06618212e46c270
    ]);
});

Route::post('EditBook/{book:slug}/update', [BookController::class, 'update']);
Route::post('EditBook/{book:slug}/delete', [BookController::class, 'destroy']);
Route::post('AddBook/add', [BookController::class, 'create']);
<<<<<<< HEAD
=======


// Categories
Route::get('Categories', function () {
    return view('categories', [
        'categories' => Category::all()
    ]);
});

Route::get('addcategory', function () {
    return view('addcategory');
});

Route::get('editCategory/{category:name}', function (Category $category) {
    return view('editcategory', [
        'category' => $category
    ]);
});

Route::post('addcategory/add', [CategoryController::class, 'create']);
Route::post('editCategory/{category:name}/update', [CategoryController::class, 'update']);
Route::post('editCategory/{category:name}/delete', [CategoryController::class, 'destroy']);


>>>>>>> e9d35f0ce888892edaac7db5a06618212e46c270
