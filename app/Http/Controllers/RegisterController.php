<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showregister()
    {
        $user=Auth::user();
        if($user && $user->type=='admin'){
            return redirect('/admin');
        }
        elseif($user && $user->type=='student'){
            return redirect('/home');
        }
        else{
            return view('register');
        }
        
    }


    public function register(Request $request)
    {
        
        $check = $request->input('email');
        $check2 = User::where('email', $check)->first();
        
        if ($check2) {
            return redirect('login')->with('alert', 'USER ALREADY EXISTS. PLEASE LOGIN!');
        }

        
        $validatedData = $request->validate([
            'firstname' => 'bail|required|alpha',
            'lastname' => 'bail|required|alpha',
            'email' => 'bail|required|email',
            'password' => 'bail|required',
            'confirm_password' => 'bail|required|same:password',
            'phone' => 'bail|required|numeric|min:10'
        ]);

        
        $user = new User;
        $user->fname = $validatedData['firstname'];
        $user->lname = $validatedData['lastname'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];
        $user->phone = $validatedData['phone'];
        $user->status = "active";
        $user->type = "admin";
        $user->save();

        
        Auth::login($user);


        if ($user->type == 'admin') {
            return redirect('/admin');
        } else {
            return redirect('/home');
        }
    }
}
