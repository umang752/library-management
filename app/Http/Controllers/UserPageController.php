<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPageController extends Controller
{
    public function showUserPage(Request $request){

        if ($request->session()->has("User_Role")) {
            $userRole = $request->session()->get("User_Role");
            $userinfo = [
                'fname' => $request->session()->get('fname'),
                'lname' => $request->session()->get('lname'),
                'email' => $request->session()->get('email'),
                'phone' => $request->session()->get('phone'),
                'status' => $request->session()->get('status'),
                'User_Role' => $request->session()->get('User_Role'),
            ];
            
            if ($userRole == "User") {
                return view("userPage")->with($userinfo);
            }
        }
        return redirect("/login");
    
    }
}
