<?php
  
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\ManageBookController;
use App\Http\Controllers\ManageIssueController;
use App\Http\Middleware\CheckUserType;
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

    Route::get('/', function () {
        return view('admin');
    })->name('admin');

    

    Route::group(['prefix' => '/user'], function () {
        Route::get('/', [ManageUserController::class, 'index']);

        Route::get('delete/{id?}', [ManageUserController::class, 'deleteUser']);

        Route::get('add', [ManageUserController::class, 'showAddUser']);
        Route::post('add', [ManageUserController::class, 'addUser']);

        Route::get('update/{id?}', [ManageUserController::class, 'showUpdateUserForm']);
        Route::post('update/{id?}', [ManageUserController::class, 'updateUser']);
    });

    Route::group(['prefix' => '/book'], function () {
        Route::get('/', [ManageBookController::class, 'index']);

        Route::get('delete/{id?}', [ManageBookController::class, 'deleteBook']);

        Route::get('add', [ManageBookController::class, 'showAddBook']);
        Route::post('add', [ManageBookController::class, 'addBook']);

        Route::get('update/{id?}', [ManageBookController::class, 'showUpdateBookForm']);
        Route::post('update/{id?}', [ManageBookController::class, 'updateBook']);
    });

    Route::group(['prefix' => '/issue'], function () {
        Route::get('/', [ManageIssueController::class, 'index']);

        // Route::get('delete/{id?}', [ManageBookController::class, 'deleteBook']);

        // Route::get('add', [ManageBookController::class, 'showAddBook']);
        // Route::post('add', [ManageBookController::class, 'addBook']);

        // Route::get('update/{id?}', [ManageBookController::class, 'showUpdateBookForm']);
        // Route::post('update/{id?}', [ManageBookController::class, 'updateBook']);
    });


});


// Route::group(['middleware' => 'checkUserType:admin'], function () {
   


//     Route::get('/adminhome', function () {
//         return view('adminhome');
//     })->name('adminhome');
    

// Route::get('/adminhome/manage-user', [ManageUserController::class, 'index']);

// Route::get('/adminhome/manage-user/delete/{id?}', [ManageUserController::class, 'deleteUser']);


// Route::get('/adminhome/manage-user/add_user', [ManageUserController::class, 'showAddUserForm']);

// Route::post('/adminhome/manage-user/add_user', [ManageUserController::class, 'addUser']);

// Route::get('/adminhome/manage-user/update/{id?}', [ManageUserController::class, 'showUpdateUserForm']);
// Route::post('/adminhome/manage-user/update/{id?}', [ManageUserController::class, 'updateUser']);


// });
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


// Route::post('/forgotpass', [OTPController::class, 'resetpass']);
// Route::get('/password/reset', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
// Define other necessary routes for authentication
// Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
// Route::get('/manage/users', [AdminController::class, 'manageUsers'])->name('manage.users');
// Route::get('/manage/books', [AdminController::class, 'manageBooks'])->name('manage.books');
// Route::get('/manage/issue-books', [AdminController::class, 'manageIssueBooks'])->name('manage.issue.books');
