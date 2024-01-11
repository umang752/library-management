<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
 

class LoginController extends Controller
{

    public function login(Request $req){
    $email = $req->input('email');
    $password = $req->input('password');
    
    $user = User::where('email', $email)->first();
    if ($user) {

        if ($password && $password==$user->password) {
            Auth::login($user); 
            if($user->type=='admin'){
                return redirect('/adminhome');
            }
            else{return redirect('/home');}
            
        }
        else{
            return redirect()->back();
        }
    }
    else{
        return redirect('register')->with('alert', 'USER DOESNT EXIST SIGNUP!!');
    }
   }

   public function logout(Request $req)
    {
        Auth::logout();

        $req->session()->invalidate();

        $req->session()->regenerateToken();

        return redirect('/');
    }
}
