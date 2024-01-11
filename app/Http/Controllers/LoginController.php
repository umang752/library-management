<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
   
    public function postLogin(Request $request)
{
   
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);
    $credentials['status'] = 'active';
    if (Auth::attempt($credentials)) {
        return redirect()->intended('/dashboard');
    }

   return back()->withErrors([
        'email' => 'The provided credentials do not match our records or the account is not active.',
    ])->onlyInput('email');
}

}
