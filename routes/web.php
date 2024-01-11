<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationFormController;
use App\Http\Controllers\LoginFormController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\ForgotPasswordFormController;
use App\Http\Controllers\ManageUsersController;
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
// Route::get('/forgotPassword',function(){
//     return view('forgotPasswordForm');
// });
Route::post('/forgotPassword',[ForgotPasswordFormController::class,'sendOTP']);


Route::get('/user',function(){
    return view('userPage');
});

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
    Session::forget('user_id');
    Session::invalidate();
    Session::regenerateToken();
    return redirect('/login');
});

Route::get('/manage-users',[ManageUsersController::class,'giveUsers']);

Route::get('/manage-users/delete/{id?}',[ManageUsersController::class,'deleteUser']);

Route::get('/manage-users/edit/{id?}',[ManageUsersController::class,'editUser'])->name('edit.user');

Route::get('/manage-users/addUser',[ManageUsersController::class,'addUser']);
Route::post('/manage-users/addUserHandler',[ManageUsersController::class,'addUserHandler']);

Route::get('/manage-books',);

Route::get('/manage-issued-books',);