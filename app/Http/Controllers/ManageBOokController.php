<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageBOokController extends Controller
{
    //
    public function showbooks()
    {
        // dd("mng");
        //
        return view('managebook');
    }
}
