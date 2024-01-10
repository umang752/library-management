<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationFormControllcer;
use App\Http\Controllers\LoginFormController;
use App\Http\Controllers\AdminPageController;
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

// Admin Page Routes:::::
Route::get('/admin',[AdminPageController::class,'showPage']);
Route::post('/admin',function(){
    echo "Helllo";
});
