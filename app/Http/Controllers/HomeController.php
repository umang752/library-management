<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function showhome()
    {
        $user=Auth::user();
        if($user && $user->type=='admin'){
            return redirect('/admin');
        }
        elseif($user && $user->type=='student'){
            return view('home');
        }
        else{
            return redirect('/');
        }
        
    }
   
}
