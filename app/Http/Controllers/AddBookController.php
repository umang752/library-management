<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class AddBookController extends Controller
{

    public function postAddBook(Request $request)
    {
        // $input = $request->all();
     $book = new Book;
                $book->name = $request->name;
                $book->author = $request->author;
                $book->description =$request->description;
                $book->status = $request->status;
                $book->price =$request->price;
                // $book->photo =$request->photo;
                if ($request->hasFile('photo')) {
                    $imageName = time().'.'.$request->photo->extension();  
                    $request->photo->move(public_path('images'), $imageName);
            
                    $book->photo = 'images/'.$imageName;
                }
            
                $book->issued_copies =$request->issued_copies;
                $book->total_inventory =$request->total_inventory ;
               $book->save();
           
            return redirect()->to('manage-book');

}


public function editBook($id)
{
$data=Book::find($id);
return view('bookedit',compact('data'));

}



public function posteditBook($id)
{
$inputs=Input::all();
$result=Book::where('id',$id)->update([
    'name' => $inputs['name'],
    'author' => $inputs['author'],
    'description' => $inputs['description'],
    'price' => $inputs['price'],
    'status' => $inputs['status'],
    'issued_copies' => $inputs['issued_copies'],
    'total_inventory' => $inputs['total_inventory'],
    'photo' => $inputs['photo']
]);



}




}