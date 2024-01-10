<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function showPage(Request $request){
        // echo "Hello Admin"
        if($request->session()->has("user_id")){
            return view("adminPage");
        }
        else{
            return redirect("/login");
        }
    }
}
