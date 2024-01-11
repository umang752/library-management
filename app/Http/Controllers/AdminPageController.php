<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function showPage(Request $request){
        // echo "Hello Admin"
        if ($request->session()->has("User_Role")) {
            $userRole = $request->session()->get("User_Role");
        
            if ($userRole == "Admin") {
                return view("adminPage");
            }
        }
        // else{
            return redirect("/login");
        // }
    }
}
