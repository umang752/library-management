<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function showPage(){
        // echo "Hello Admin";
        return view("adminPage");
    }
}
