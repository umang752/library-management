<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function showhome(){
        if(Auth::user()){
            return view('home');
            
        }
        else{
            return redirect('/notfound');
        }
    }
    //
}
