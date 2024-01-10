<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginFormController extends Controller
{
    public function giveLoginForm(){
        return view("loginForm");
    }

    public function validateLoginData(Request $request){
        $request->validate(
            [
                // 'Name'=>'required',
                'Email'=>'required | email',
                'Password'=> 'required'
            ]
            );
        $user = User::where('email', $request['Email'])
                ->where('password', $request['Password'])
                ->first();
            
        if($user){
            return redirect('/admin');
            // return view('adminPage');
        }
        else{
            echo "Incorrect email or password";
            // return redirect('/login');
        }



    }
}
