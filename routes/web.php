<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubscriberController;
use App\Models\Book;
use App\Models\Category;
use App\Models\Keyword;
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


//Books
Route::get('Books', function () {
    return view('books', [
        'books' => Book::all()
    ]);
});

Route::get('EditBook/{book:slug}', function (Book $book) {
    return view('editBook', [
        'book' => $book
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

Route::post('EditBook/{book:slug}/update', [BookController::class, 'update']);
Route::post('EditBook/{book:slug}/delete', [BookController::class, 'destroy']);
Route::post('AddBook/add', [BookController::class, 'create']);


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

// Keywords

Route::get('Keywords', function () {
    return view('keywords', [
        'keywords' => Keyword::all()
    ]);
});

// Subscribers

Route::get('Subscribers', function () {
    return view('subscribers', [
        'subscribers' => Subscriber::all()
    ]);
});

Route::get('AddSubscriber', function () {
    return view('addsubscriber');
});

Route::get('EditSubscriber/{subscriber:id}', function (Subscriber $subscriber) {
    return view('editsubscriber', [
        'subscriber' => $subscriber
    ]);
});

Route::post('AddSubscriber/add', [SubscriberController::class, 'create']);
Route::post('EditSubscriber/{subscriber:id}/edit', [SubscriberController::class, 'update']);


