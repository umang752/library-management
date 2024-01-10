<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ForgotPasswordFormController extends Controller
{
    public function showForm(){
        return view('forgotPasswordForm');
    }


    public function sendOTP(Request $request)
    {
        // Validate the email input
        $request->validate([
            'email' => 'required|email', // |exists:users,email',
        ]);

        // Generate a random 4-digit OTP
        $otp = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

        // Update the user's OTP field in the database
        $user = User::where('email', $request->email)->first();
        if(! $user){
            echo "User does not exist";
        }
        $request->session()->put('otp', $otp);
        $request->session()->put('email', $request->email);

        // Send OTP to the user's email
        $this->sendEmailOTP($request->email, $otp);

        return redirect()->back()->with('success', 'OTP has been sent to your email.');
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
