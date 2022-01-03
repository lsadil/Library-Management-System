<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\UserController;
use App\Models\Book;
use App\Models\Category;
use App\Models\Keyword;
use App\Models\Language;
use App\Models\Loan;
use App\Models\Subscriber;
use App\Models\User;
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
    return view('Home');
});


//Books

Route::get('EditBook/{book:slug}', function (Book $book) {
    return view('editBook', [
        'book' => $book
    ]);
});

Route::get('AddBook', function () {
    return view('addBook');
});

Route::get('DetailBook/{book:slug}', function (Book $book) {
    return view('detailbook', [
        'book' => $book,
        'loans' => Loan::with('subscriber')->where('book_id', $book->id)->get()
    ]);
});
Route::post('EditBook/{book:slug}/update', [BookController::class, 'update']);
Route::post('EditBook/{book:slug}/delete', [BookController::class, 'destroy']);
Route::post('AddBook/add', [BookController::class, 'create']);
Route::get('Books', [BookController::class, 'index']);

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

Route::get('Profile/{subscriber:id}', function (Subscriber $subscriber) {
    return view('profile', [
        'loans' => Loan::with('book', 'subscriber')->where('subscriber_id', $subscriber->id)->get(),
        'subscriber' => $subscriber
    ]);
})->name('Profile');

Route::post('AddSubscriber/add', [SubscriberController::class, 'create']);
Route::post('EditSubscriber/{subscriber:id}/edit', [SubscriberController::class, 'update']);
Route::post('EditSubscriber/{subscriber:id}/delete', [SubscriberController::class, 'destroy']);

//Users
Route::get('Users', function () {
    return view('users', [
        'users' => User::all()
    ]);
});

Route::get('AddUsers', function () {
    return view('adduser');
});

Route::get('EditUser/{user:id}', function (User $user) {
    return view('edituser', [
        'user' => $user
    ]);
});

Route::get('Profile/{subscriber:id}/AddLoan', function (Subscriber $subscriber) {
    return view('addLoan', [
        'subscriber' => $subscriber
    ]);
});

Route::post('AddUser/add', [UserController::class, 'create']);
Route::post('EditUser/{User:id}/edit', [UserController::class, 'update']);
Route::post('EditUser/{user:id}/delete', [UserController::class, 'destroy']);
Route::post('Profile/{subscriber:id}/AddLoan/add', [UserController::class, 'addLoan']);

//sign in and log out

Route::get('Sign-in', function () {
    return view('signin');
})->middleware('guest');

Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
