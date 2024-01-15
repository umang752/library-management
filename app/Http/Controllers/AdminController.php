<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function showadmin(){
        if(Auth::user()){
            return view('admin');
            
        }
        else{
            return redirect('/notfound');
        }
    }
  

public function manageUsers()
{
    return view('admin.manage_users');
}

public function manageBooks()
{
    return view('admin.manage_books');
}

public function manageIssuedBooks()
{
    return view('admin.manage_issued_books');
}

    //
}
