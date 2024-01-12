<?php

use App\Http\Controllers\AddBookController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\ManageBOokController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\ManageIssuedBooksController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/signup', function () {
    return view('signup');
});
Route::get('/login', [LoginController::class, 'getlogin']);
Route::get('/logout', [LogoutController::class, 'logout']);
Route::get('/addbook', function () {
    return view('addbook');
});
Route::middleware(['auth'])->group(function () {
    Route::view('/example-page', 'example-page');
    Route::view('/example-auth', 'example-auth');
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
});
Route::get('/forgot-password', [ForgetPasswordController::class, 'showForgotPasswordForm']);
Route::post('/reset-password', [ForgetPasswordController::class, 'resetPassword']);
Route::get('/manage-book', [ManageBOokController::class, 'showbooks']);
Route::get('/manage-issue-books', [ManageIssuedBooksController::class, 'showissuebooks']);

Route::get('/manage-user', [ManageUserController::class, 'showusers']);
// Route::post('/manage-bookdata', [ManageBOokController::class,'showbooksdata']);
Route::get('/dashboard', [DashboardController::class, 'dashboard']);
Route::post('/editbook/{id}', [AddBookController::class, 'posteditbook']);
Route::post('/edituser/{id}', [ManageUserController::class, 'postedituser']);
Route::post('/membership/{id}', [ManageUserController::class, 'postAddMembership']);
Route::post('/deleteuser/{id}', [ManageUserController::class, 'postdeleteuser']);
Route::post('/editissuebook/{id}', [ManageIssuedBooksController::class, 'posteditissuebook']);
Route::post('/sendotp', [ForgetPasswordController::class, 'sendOtp']);
Route::post('/addbook', [AddBookController::class, 'postAddBook']);
Route::post('/adduser', [ManageUserController::class, 'postAddUser']);
Route::get('/adduser', [ManageUserController::class, 'AddUser']);
Route::get('/editbook/{id}', [AddBookController::class, 'editbook']);
Route::get('/userbookissue/{id}', [AddBookController::class, 'userbookissue']);
Route::post('/userbookissue/{id}', [AddBookController::class, 'postuserbookissue']);
Route::get('/edituser/{id}', [ManageuserController::class, 'edituser']);
Route::get('/membership/{id}', [ManageuserController::class, 'AddMembership']);
Route::get('/deleteuser/{id}', [ManageuserController::class, 'deleteuser']);
Route::get('/editissuebook/{id}', [ManageIssuedBooksController::class, 'editissuebook']);
Route::post('/register', [RegisterController::class, 'postRegister']);
Route::post('/signin', [LoginController::class, 'postLogin']);
