<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ManageBOokController extends Controller
{
    //
    public function showbooks()
    {
        $query = Book::paginate(5);
        return view('managebook', compact('query'));
    }
}
