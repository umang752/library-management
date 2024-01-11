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
   public function getlogin() {
            if (Auth::check()) {
                
                return redirect()->intended('/example-page');
            }
        
            return view('login');
        }
    public function postLogin(Request $request)
{
//    dd($request);
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);
    $user = User::where('email',  $credentials['email'])->first();

    $credentials['status'] = 'active';
    // $credentials['user_role'] = 'admin';
    if (Auth::attempt($credentials)) {
if($user->role==="Admin"){
        return redirect()->intended('/example-page');
}else{
    return redirect()->intended('/dashboard');
}
    }

   return back()->withErrors([
        'email' => 'The provided credentials do not match our records or the account is not active.',
    ])->onlyInput('email');
}

}
