<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class AddBookController extends Controller
{
    //

    public function postAddBook(Request $request)
    {
        // $input = $request->all();
     $book = new Book;
                $book->name = $request->name;
                $book->author = $request->author;
                $book->description =$request->description;
                $book->status = $request->status;
                $book->price =$request->price;
                $book->photo =$request->photo;
                $book->issued_copies =$request->issued_copies;
                $book->total_inventory =$request->total_inventory ;
               $book->save();
              return redirect('/managebook');
              
}
}