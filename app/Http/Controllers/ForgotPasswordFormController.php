<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordFormController extends Controller
{
    public function showForm()
    {
        return view('forgotPasswordForm');
    }

    public function sendOTP(Request $request)
{
    $user = User::where('email', $request['email'])->first();

    if (!is_null($user)) {
        $user->password = $request['password'];
        $user->save();

        return redirect('/login');
    } else {
        return redirect()->back()->withErrors(['email' => 'User email does not exist']);
    }
}


    private function sendEmailOTP($email, $otp)
    {
        // Code to send email with OTP using Laravel's mail functionality
        // Replace this with your mail sending logic using a service like SMTP

        Mail::raw("Your OTP is: $otp", function ($message) use ($email) {
            $message->to($email)->subject('Forgot Password OTP');
        });
    }
}
