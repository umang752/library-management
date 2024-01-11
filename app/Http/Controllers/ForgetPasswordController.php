<?php

namespace App\Http\Controllers;

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

    public function sendOtp(Request $request)
    {
      
        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if ($user) {
            
            // Generate and save OTP
            // $otp = rand(100000, 999999);
            // $user->update(['otp' => $otp]);

            // // Send OTP to user's email
            // Mail::to($email)->send(new SendOtpMail($otp));

            // // Redirect to password reset page with email
            return redirect('/password-reset/'.$email)->with('success', 'OTP sent successfully.');
        }
        dd("email");
        session(['error' => [
            'message' => 'Email not found.',
            'expires' => now()->addSeconds(5),
        ]]);

        return back();
    
        // return back()->with('error', 'Email not found.');
    }
}
