<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
 

class LoginController extends Controller
{

    public function showlogin()
    {
        $user=Auth::user();
        if($user && $user->type=='admin'){
            return redirect('/admin');
        }
        elseif($user && $user->type=='student'){
            return redirect('/home');
        }
        else{
            return view('login');
        }
        
    }


    public function login(Request $req){
    $email = $req->input('email');
    $password = $req->input('password');
    
    $user = User::where('email', $email)->first();
    if ($user) {

        if ($password && $password==$user->password) {
            Auth::login($user); 
            if($user->type=='admin'){
                return redirect('/admin')->with('alert', 'admin login successful !!');
            }
            else{return redirect('/home')->with('alert', 'student login successful !!');}
            
        }
        else{
            return redirect()->back()->with('alert', 'credentials wrong!!');
        }
    }
    else{
        return redirect('/register')->with('alert', 'USER DOESNT EXIST SIGNUP!!');
    }
   }

   public function logout(Request $req)
    {
        Auth::logout();

        $req->session()->invalidate();

        $req->session()->regenerateToken();

        return redirect('/')->with('alert', 'user logged out!!');
    }
}
