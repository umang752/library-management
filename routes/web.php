<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManageUserController;
use App\Http\Middleware\CheckUserType;
use App\Http\Middleware\OTPController;
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

Route::group(['middleware' => 'checkUserType:admin'], function () {
   


    Route::get('/adminhome', function () {
        return view('adminhome');
    })->name('adminhome');
    

Route::get('/adminhome/manageuser', [ManageUserController::class, 'index'])->name('admin.manage_user');

Route::get('/adminhome/manageuser/delete/{id}', [ManageUserController::class, 'deleteUser'])->name('admin.delete_user');


Route::get('/adminhome/manage_user/add_user', [ManageUserController::class, 'showAddUserForm'])->name('admin.add_user');

Route::post('/adminhome/manage_user/add_user', [ManageUserController::class, 'addUser'])->name('admin.add_user');

Route::get('/adminhome/manage_user/update/{id}', [ManageUserController::class, 'showUpdateUserForm'])->name('admin.update_user');
Route::post('/adminhome/manage_user/update/{id}', [ManageUserController::class, 'updateUser'])->name('admin.update_user');


});
Route::group(['middleware' => 'checkUserType:student'], function () {
   
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});



Route::get('/', function () {
    return view('welcome');
})->name('/');



Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/forgotpass', function () {
    return view('forgotpass');
})->name('forgotpass');


Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



Route::post('/register', [RegisterController::class, 'register']);


Route::post('/forgotpass', [OTPController::class, 'resetpass'])->name('forgotpass');
// Route::get('/password/reset', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
// Define other necessary routes for authentication
// Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
// Route::get('/manage/users', [AdminController::class, 'manageUsers'])->name('manage.users');
// Route::get('/manage/books', [AdminController::class, 'manageBooks'])->name('manage.books');
// Route::get('/manage/issue-books', [AdminController::class, 'manageIssueBooks'])->name('manage.issue.books');
