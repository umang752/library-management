<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgetPasswordController;
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
Route::get('/login', function () {
    return view('login');
});
Route::get('/addbook',function () {
    return view('addbook');
});
Route::get('/forgot-password', [ForgetPasswordController::class,'showForgotPasswordForm']);
Route::post('/sendotp', [ForgetPasswordController::class,'sendOtp']);
Route::post('/register',[RegisterController::class,'postRegister']);
Route::post('/signin',[LoginController::class,'postLogin']);
// Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
