<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class RegisterController extends Controller
{
    public function register(Request $request){
        $check=$request->input('email');
        $check2 = User::where('email', $check)->first();
        if($check2){
            
            return redirect()->back()->with('alert', 'USER ALREADY EXISTS LOGIN!!');

        }
        else{

        
        $request->validate(
            [
                'firstname'=>'required',
                'lastname'=> 'required',
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
        $user->status = "Inactive";
        $user->type = "student";
        $user->save();
        return redirect('home');
        }
    }
    //
}
