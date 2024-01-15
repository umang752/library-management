<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ResetPassController extends Controller
{
    public function showforgotpass()
    {
        $user=Auth::user();
        if($user && $user->type=='admin'){
            return redirect('/admin');
        }
        elseif($user && $user->type=='student'){
            return redirect('/home');
        }
        else{
            return view('forgotpass');
        }
        
    }
}
