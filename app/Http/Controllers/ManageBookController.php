<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class ManageBookController extends Controller
{
    
    public function index()
    {
        
        $books = Book::paginate(2); 

        return view('admin.book.index', compact('books'));
    }

    public function changeStatus(Request $request, $bookId)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:available,unavailable',
        ]);

        $book = Book::findOrFail($bookId);
        $book->status = $validatedData['status'];
        $book->save();

        return redirect('/admin/book')->with('alert', 'Book status updated successfully');
    }

    public function showAddBook()
    {
        return view('admin.book.add');
    }

    
    public function addBook(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'description' => 'required',
            'status' => 'required|in:available,unavailable',
            'total_inventory' => 'required|numeric',
            'issued_copies' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $book = new Book();
        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->description = $request->input('description');
        $book->status = $request->input('status');
        $book->total_inventory = $request->input('total_inventory');
        $book->issued_copies = $request->input('issued_copies');
        $book->price = $request->input('price');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $book->photo = $imageName;
        }

        $book->save();

        return redirect('admin/book')->with('alert', 'Book added successfully');
    }        


    public function deleteBook($id)
    {
        $book = Book::find($id);

        if ($book) {
            $book->delete();
            return redirect()->back()->with('alert', 'book deleted successfully');
        }

        return redirect()->back()->with('alert', 'book not found');
    }


    public function showUpdateBookForm($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.book.update', compact('book'));
    }

    public function updateBook(Request $request)
    {
        $id = $request->input('id');
        $book = Book::where('book_id', $id)->first();
    
        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->description = $request->input('description');
        $book->status = $request->input('status');
        $book->total_inventory = $request->input('total_inventory');
        $book->issued_copies = $request->input('issued_copies');
        $book->price = $request->input('price');
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $book->image = $imageName;
        }
    
        $book->save();
        return redirect('/admin/book')->with('alert', 'Book details updated');
    }
    
}
