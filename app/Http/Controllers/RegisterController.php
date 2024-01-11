<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function register(Request $request){
        $check=$request->input('email');
        $check2 = User::where('email', $check)->first();
        if($check2){
            
            return redirect('login')->with('alert', 'USER ALREADY EXISTS LOGIN!!');

        }
        else{

        
        $request->validate(
            [
                'firstname'=>'required | alpha',
                'lastname'=> 'required | alpha',
                'email'=>'required | email',
                'password'=> 'required',
                'confirm_password'=>'required | same:password',
                'phone'=> 'required | min:10| numeric'

            ]
            );


        $user = new User;
        $user->fname= $request['firstname'];
        $user->lname= $request['lastname'];
        $user->email= $request['email'];
        $user->password=$request['password'];
        $user->phone = $request['phone'];
        $user->status = "active";
        $user->type = "student";
        $user->save();

        Auth::login($user); 
        if($user->type=='admin'){
            return redirect('/adminhome');
        }
        else{return redirect('/home');}
        
        }
    }
    //
}
