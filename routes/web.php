<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
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

Route::group(['middleware' => 'checkusertype:admin'], function () {
    // Admin routes here
});

Route::group(['middleware' => 'checkusertype:student'], function () {
    // Student routes here
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/adminhome', function () {
    return view('adminhome');
})->name('adminhome');

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/password/reset', function () {
    
// })->name('password.request');


Route::post('/register', [RegisterController::class, 'register']);


// Route::get('/password/reset', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
// Define other necessary routes for authentication
// Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
// Route::get('/manage/users', [AdminController::class, 'manageUsers'])->name('manage.users');
// Route::get('/manage/books', [AdminController::class, 'manageBooks'])->name('manage.books');
// Route::get('/manage/issue-books', [AdminController::class, 'manageIssueBooks'])->name('manage.issue.books');
