<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookissued;
use App\Models\User;
use Input;
use Carbon\Carbon;
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
        $book->description = $request->description;
        $book->status = $request->status;
        $book->price = $request->price;
        // $book->photo =$request->photo;
        if ($request->hasFile('photo')) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $imageName);

            $book->photo = 'images/' . $imageName;
        }

        $book->issued_copies = $request->issued_copies;
        $book->total_inventory = $request->total_inventory;
        $book->save();

        return redirect()->to('manage-book');
    }
    public function userbookissue($id)
    {
        $data = Book::find($id);
        return view('userissuebook', compact('data'));
    }
    public function postuserbookissue($id, Request $request)
    {
        $user = Book::where('book_id', $id)->first();
        $check = User::where('user_id', $request->user_id)->first();

        if ($check) {

            $membership = new Bookissued;

            $membership->user_id = $request->user_id;
            $membership->book_id = $id;
            $membership->status = $user->status;
            $membership->reneu_date = (clone Carbon::now())->addDays(24)->format('Y-m-d H:i:s');
            $membership->save();
        }
        return redirect()->to('manage-book');
    }

    public function editBook($id)
    {
        $data = Book::find($id);
        return view('bookedit', compact('data'));
    }



    public function posteditBook($id, Request $request)
    {

        // $id = (int) $id;
        $inputs = $request->all();
        $result = Book::where('book_id', $id)->update([

            'name' => $inputs['name'],
            'author' => $inputs['author'],
            'description' => $inputs['description'],
            'price' => $inputs['price'],
            'status' => $inputs['status'],
            'issued_copies' => $inputs['issued_copies'],
            'total_inventory' => $inputs['total_inventory'],
            // 'photo' => $inputs['photo']
        ]);
        return redirect()->to('manage-book');
    }
}
