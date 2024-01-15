<?php
  
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\ManageBookController;
use App\Http\Controllers\ManageIssueController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ResetPassController;
use App\Http\Middleware\CheckUserType;
use App\Http\Controllers\WelcomeController;
// use App\Http\Middleware\OTPController;
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


Route::group(['middleware' => 'checkUserType:admin', 'prefix' => 'admin'], function () {

    
    Route::get('/', [AdminController::class, 'showadmin']);
    

    Route::group(['middleware' => 'checkUserType:admin','prefix' => '/user'], function () {
        Route::get('/', [ManageUserController::class, 'index']);

        Route::get('delete/{id?}', [ManageUserController::class, 'deleteUser']);

        Route::get('add', [ManageUserController::class, 'showAddUser']);
        Route::post('add', [ManageUserController::class, 'addUser']);

        Route::get('update/{id?}', [ManageUserController::class, 'showUpdateUserForm']);
        Route::post('update/{id?}', [ManageUserController::class, 'updateUser']);

        Route::post('change-status/{id}', [ManageUserController::class, 'changeStatus']);


    });

    Route::group(['middleware' => 'checkUserType:admin','prefix' => '/book'], function () {
        Route::get('/', [ManageBookController::class, 'index']);

        Route::get('delete/{id?}', [ManageBookController::class, 'deleteBook']);

        Route::get('add', [ManageBookController::class, 'showAddBook']);
        Route::post('add', [ManageBookController::class, 'addBook']);

        Route::get('update/{id?}', [ManageBookController::class, 'showUpdateBookForm']);
        Route::post('update/{id?}', [ManageBookController::class, 'updateBook']);

        Route::post('change-status/{bookId}', [ManageBookController::class, 'changeStatus']);

    });

    Route::group( ['middleware' => 'checkUserType:admin','prefix' => '/issue'], function () {
        Route::get('/', [ManageIssueController::class, 'index']);

        // Route::get('delete/{id?}', [ManageBookController::class, 'deleteBook']);

        // Route::get('add', [ManageBookController::class, 'showAddBook']);
        // Route::post('add', [ManageBookController::class, 'addBook']);

        // Route::get('update/{id?}', [ManageBookController::class, 'showUpdateBookForm']);
        // Route::post('update/{id?}', [ManageBookController::class, 'updateBook']);
    });


});



Route::group(['middleware' => 'checkUserType:student'], function () {
   
    // Route::get('/home', function () {
    //     return view('home');
    // })->name('home');

    Route::get('/home', [HomeController::class, 'showhome']);
});



// Route::get('/', function () {
//     return view('welcome');
// })->name('/');

Route::get('/', [WelcomeController::class, 'showwelcome']);

Route::get('/notfound', function () {
    return view('notfound');
});

Route::get('/login', [LoginController::class, 'showlogin']);

Route::get('/register', [RegisterController::class, 'showregister']);
// Route::get('/login', function () {
//     return view('login');
// })->name('login');

// Route::get('/register', function () {
//     return view('register');
// })->name('register');


Route::get('/forgotpass', [ResetPassController::class, 'showforgotpass']);


Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



Route::post('/register', [RegisterController::class, 'register']);


