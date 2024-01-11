<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class ManageBooksController extends Controller
{
    public function giveBooks(Request $request){
        $books= Book::all();
        // echo "<pre>";
        // print_r($users->toArray());
        // echo "</pre>";
        // die;
        $data = compact('books');
        return view('/adminLayouts/manageBooks')->with($data);
    }

    public function deleteBook($name){
        // echo "Hello";
        // die;
        // $curr_id = $request->id;
        // Book::where('book_id',$id)->delete();
        // return redirect()->back();
        Book::where('name',$name)->delete();
        return redirect()->back();
    }
    

    public function addBook(){
        return view('adminLayouts/addBookForm');
    }


    public function addBookHandler(Request $request){
        
        $request->validate(
            [
                'Name'=>'required',
                'Author'=> 'required',
                'Description'=>'required',
                'Status'=> 'required',
                'Photo'=> 'required',
                'Total_Inventory'=> 'required | min:1',
                'Issued_Copies'=> 'required',
                'Price'=> 'required'
            ]
            );
        $book = new Book;
        $book->name= $request['Name'];
        $book->author= $request['Author'];
        $book->description= $request['Description'];
        $book->status=$request['Status'];
        $book->photo = $request['Photo'];
        $book->total_inventory = $request["Total_Inventory"];
        $book->issued_copies = $request["Issued_Copies"];
        $book->price = $request["Price"];

        // $user->role= $request['user_role'];
        $book->save();

        return redirect("/manage-books");
    }

}
