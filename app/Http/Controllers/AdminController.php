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
    //
}
