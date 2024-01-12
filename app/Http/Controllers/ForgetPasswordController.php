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

        $input = $request->all();

        $rules = [

            'email' => 'required|exists:users,email|max:50',
            'password' => 'required|min:8',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {

            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        } else {

            $email = $request->input('email');
            $newPassword = $request->input('password');
            $user = User::where('email', $email)->first();


            if ($user) {

                $hashedPassword = Hash::make($newPassword);


                $user->password = $hashedPassword;
                $user->save();
                return redirect()->to('login')->with('message', 'Password Reset Successfully');;
            } else
                echo "User not found";
        }
    }
}
