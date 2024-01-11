<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class ManageBOokController extends Controller
{
    //
    public function showbooks()
    {
        // dd("mng");
        //
    $query=Book::all();

        return view('managebook',compact('query'));
    }
    public function shoebooksdata(Request $request) {
        $query = ($request->query('query'));
$query=Book::paginate(5);
        // Use $param as needed
        return view('managebook',compact('query'));
    }
    
}
