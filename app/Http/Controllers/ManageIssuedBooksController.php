<?php

namespace App\Http\Controllers;

use App\Models\Bookissued;
use Illuminate\Http\Request;

class ManageIssuedBooksController extends Controller
{
    //
    public function showissuebooks()
    {
        $query = Bookissued::paginate(5);
        return view('manageissuebook', compact('query'));
    }
}
