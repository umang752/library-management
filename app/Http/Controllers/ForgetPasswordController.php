<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Mail\SendOtpMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    //
    public function showForgotPasswordForm()
    {
        return view('forgot-password');
    }

    public function resetPassword(Request $request)
    {
      
       dd("hiiii");
        $input = $request->all();
     
        $rules =[
                
                'email' => 'required|email|unique:users|max:50',
                'newpassword' => 'required|min:8',
                 ];
                 $validator = Validator::make($request->all(), $rules);
             if ($validator->fails()) {
               return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());

            } else {
                $email = $request->input('email');
                $newPassword = $request->input('newpassword');
        
            $user = User::where('email', $email)->first();

 
    if ($user) {
  
    $hashedPassword = Hash::make($newPassword);

    
    $user->password = $hashedPassword;
    $user->save();

    return redirect('/login');
} else {
    echo "User not found";
}
       
    }
}
    }
