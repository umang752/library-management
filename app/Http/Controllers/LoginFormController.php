<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;

class LoginFormController extends Controller
{
    public function giveLoginForm(Request $request){
        if($request->session()->has("User_Role")){
            $userRole = $request->session()->get("User_Role");
            if($userRole=="Admin"){
                return redirect('/admin');
            }
            else{
                return redirect('/user');
            }
        }
        return view("loginForm");
    }

    // public function validateLoginData(Request $request){
    //     $request->validate(
    //         [
    //             'Email'=>'required | email',
    //             'Password'=> 'required'
    //         ]
    //         );
    //     $user = User::where('email', $request['Email'])
    //             ->where('password', $request['Password'])
    //             ->first();
    //     $data = compact('user');
    //     if($user){
    //         // $request->session()->put("User_Role",$user->User_Role);
    //         $request->session()->put([
    //             'fname' => $user->fname,
    //             'lname' => $user->lname,
    //             'email' => $user->email,
    //             'phone' => $user->phone,
    //             'status' => $user->status,
    //             'User_Role' => $user->User_Role,
    //         ]);
            
    //         // $request->session()->put("expires_at", Carbon::now()->addMinutes(1));
    //         if($user->User_Role ==='User'){
    //             return redirect('/user');
    //         }
    //         return redirect('/admin');
    //         // return view('adminPage');
    //     }
    //     else{
    //         // echo '<script>alert("Wrong login credentials");</script>';
    //         $request->session()->flash('error', 'Invalid Email or Password! Try Again!');
    //         return redirect()->back();
    //     }



    // }

    public function validateLoginData(Request $request)
    {
        $request->validate([
            'Email' => 'required|email',
            'Password' => 'required',
        ]);
    
        $user = User::where('email', $request->input('Email'))->first();
    
        if ($user) {
            if ($user->password == $request->input('Password')) {
                // Authentication successful, set session data
                $request->session()->put([
                    'fname' => $user->fname,
                    'lname' => $user->lname,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'status' => $user->status,
                    'User_Role' => $user->User_Role,
                ]);
    
                if ($user->User_Role === 'User') {
                    return redirect('/user');
                }
    
                return redirect('/admin');
            } else {
                // Wrong password
                return redirect()->back()->withErrors(['Password' => 'Wrong password.']);
            }
        } else {
            // User email does not exist
            return redirect()->back()->withErrors(['Email' => 'User email does not exist.']);
        }
    }
    

}
