<?php

namespace App\Http\Controllers;

use App\Mail\OTPMail;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\OtpAuth;

class OTPController extends Controller
{
    public function subscribe(Request $request) 
    {
        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if ($user) {
            $otp = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);

            $otp_temp = OtpAuth::create([
                'email' => $email,
                'otp' => $otp, // Save OTP to the database
            ]);

            if ($otp_temp) {
                // Send OTP via email
                Mail::to($email)->send(new OTPMail($otp));

                return new JsonResponse(
                    [
                        'success' => true, 
                        'message' => "Thank you for subscribing to our email, please check your inbox for the OTP"
                    ], 
                    200
                );
            }
        } else {
            return redirect()->back()->with('alert', 'USER ALREADY EXISTS LOGIN!!');

            // Logic if the user is not found
        }
    }
}
