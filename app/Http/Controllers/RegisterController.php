<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Check if the email already exists
        $check = $request->input('email');
        $check2 = User::where('email', $check)->first();
        
        if ($check2) {
            return redirect('login')->with('alert', 'USER ALREADY EXISTS. PLEASE LOGIN!');
        }

        // Validate the user input
        $validatedData = $request->validate([
            'firstname' => 'bail|required|alpha',
            'lastname' => 'bail|required|alpha',
            'email' => 'bail|required|email',
            'password' => 'bail|required',
            'confirm_password' => 'bail|required|same:password',
            'phone' => 'bail|required|numeric|min:10'
        ]);

        // Create a new user only if validation passes
        $user = new User;
        $user->fname = $validatedData['firstname'];
        $user->lname = $validatedData['lastname'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password']; // Ensure to hash the password
        $user->phone = $validatedData['phone'];
        $user->status = "active";
        $user->type = "student";
        $user->save();

        // Log in the user after successful registration
        Auth::login($user);

        // Redirect based on user type
        if ($user->type == 'admin') {
            return redirect('/admin');
        } else {
            return redirect('/home');
        }
    }
}
