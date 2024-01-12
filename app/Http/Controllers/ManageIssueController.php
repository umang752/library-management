<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookIssued;

class ManageIssueController extends Controller
{
    public function index()
    {
        $issued = BookIssued::all();

        return view('admin.issue.index', compact('issued'));
    }
    //
}
