<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationFormController;
use App\Http\Controllers\LoginFormController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\ForgotPasswordFormController;
use App\Http\Controllers\ManageUsersController;
use App\Http\Controllers\UserPageController;
use App\Http\Controllers\ManageBooksController;
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

Route::get('/', [RegistrationFormController::class,'doSignUp']);

// Register Page Routes::::
Route::get('/register', [RegistrationFormController::class,'doSignUp']);
Route::post('/register',[RegistrationFormController::class,'saveFormData']);

// Login Page Routes:::::
Route::get('/login',[LoginFormController::class,'giveLoginForm']);
Route::post('/login',[LoginFormController::class,'validateLoginData']);

// Forgot Password Page Routes:::
Route::get('/forgotPassword',[ForgotPasswordFormController::class,'showForm']);
Route::post('/forgotPassword',[ForgotPasswordFormController::class,'sendOTP']);

// User Page Routes::::
Route::get('/user',[UserPageController::class,'showUserPage']);


// Admin Page Routes:::::
Route::get('/admin',[AdminPageController::class,'showPage']);
Route::post('/admin',function(){
    echo "Helllo this is post request of /admin url";
});


// Route to handle Logout::::
Route::get('/logout',function(Request $request){
    // $request->session()->forget("user_id");
    // $request->session()->invalidate();
    // $request->session()->regenerateToken();

    // Session::forget('user_id');
    Session::flush();
    Session::invalidate();
    Session::regenerateToken();
    return redirect('/login');
});


// Manage Users Button Routes:::
Route::get('/manage-users',[ManageUsersController::class,'giveUsers']);

Route::get('/manage-users/delete/{id?}',[ManageUsersController::class,'deleteUser']);

Route::get('/manage-users/update/{id?}',[ManageUsersController::class,'updateUser']);
Route::post('/manage-users/updateHandler',[ManageUsersController::class,'updateUserHandler']);
Route::get('/manage-users/addUser',[ManageUsersController::class,'addUser']);
Route::post('/manage-users/addUserHandler',[ManageUsersController::class,'addUserHandler']);


// Manage Books Button Routes:::
Route::get('/manage-books',[ManageBooksController::class,'giveBooks']);
Route::get('/manage-books/deleteBook/{name?}',[ManageBooksController::class,'deleteBook']);

Route::get('/manage-books/addBook',[ManageBooksController::class,'addBook']);
Route::post('/manage-books/addBookHandler',[ManageBooksController::class,'addBookHandler']);

// Manage Issued Books Button Routes::::
Route::get('/manage-issued-books',);