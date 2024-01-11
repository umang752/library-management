<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistrationFormController extends Controller
{
    public function doSignUp(Request $request){
        // if ($request->has('title')) {
        //     $title = $request->title;
        // } else {
        //     $title = "Sign Up Page";
        // }
    
        // $data = compact('title');
        return view('registrationForm'); //->with($data);
    }
    public function saveFormData(Request $request){
        $request->validate(
            [
                'First_Name'=>'required',
                'Last_Name'=> 'required',
                'Email'=>'required | email',
                'Password'=> 'required',
                'Confirm_Password'=>'required | same:Password',
                'Phone_Number'=> 'required | min:10| numeric'

            ]
            );
        // echo "Hello saving data";
        // echo "<pre>";
        // print_r($request->all());
        
        $user = new User;
        $user->fname= $request['First_Name'];
        $user->lname= $request['Last_Name'];
        $user->email= $request['Email'];
        $user->password=$request['Password'];
        $user->phone = $request['Phone_Number'];
        $user->status = "Inactive";
        $user->save();

        return redirect('/login'); 
    }
}
