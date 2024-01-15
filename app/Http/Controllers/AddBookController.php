<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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
        $rules = [
            'name' => 'required|alpha|max:30',
            'author' => 'required|alpha|max:20',
            // 'phone' => 'required|numeric|digits:10',
            
            'description' => 'required',
            'status' => 'required|alpha|max:20',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|min:0',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'issued_copies' => 'required|numeric|lte:total_inventory',
            'total_inventory' => 'required|numeric',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        } else {
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

        return redirect()->to('manage-book')->with('success', 'Book Added successfully');
    }
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
            Book::where('book_id', $id)->update([
                'issued_copies' =>DB::raw('issued_copies + 1'),
                'total_inventory' =>DB::raw('total_inventory - 1'),
            ]);
        return redirect()->to('manage-book')->with('success', 'Book Issued successfully');
    }
    else {
        return redirect()->to('manage-book')->with('error', 'user not registered');
    }
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
        $rules = [
            'name' => 'required|alpha|max:30',
            'author' => 'required|alpha|max:20',
            // 'phone' => 'required|numeric|digits:10',
            
            'description' => 'required',
            'status' => 'required|alpha|max:20',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|min:0',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'issued_copies' => 'required|numeric|lte:total_inventory',
            'total_inventory' => 'required|numeric',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        } 
        if ($request->hasFile('photo')) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $imageName);
// dd("hiiii");
            $photo = 'images/' . $imageName;
        }
        $result = Book::where('book_id', $id)->update([

            'name' => $inputs['name'],
            'author' => $inputs['author'],
            'description' => $inputs['description'],
            'price' => $inputs['price'],
            'status' => $inputs['status'],
            'issued_copies' => $inputs['issued_copies'],
            'total_inventory' => $inputs['total_inventory'],
            'photo' => $photo
          
        ]);
        return redirect()->to('manage-book')->with('success', 'Book edited successfully');
    }
}
