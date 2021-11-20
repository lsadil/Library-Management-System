<?php

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
// <<<<<<< HEAD
    return view('Edit   Book');
// =======
//     return view('dashboard');
// });
// Route::get('/pages/tables', function () {
//     return view('tables');
// >>>>>>> 33e792849e7590bb49617f9b3f146de258169085
// });
// Route::get('/pages/dashboard', function () {
//     return view('dashboard');
});
