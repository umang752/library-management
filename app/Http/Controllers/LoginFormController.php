<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
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
            // $request->session()->put("User_Role",$user->User_Role);
            $request->session()->put("User_Role", $user->User_Role);
            $request->session()->put("expires_at", Carbon::now()->addMinutes(0.5));
            if($user->User_Role ==='User'){
                return redirect('/user');
            }
            return redirect('/admin');
            // return view('adminPage');
        }
        else{
            echo "Incorrect email or password";
            // return redirect('/login');
        }



    }
}
