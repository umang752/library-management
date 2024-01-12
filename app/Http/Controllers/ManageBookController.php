<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class ManageBookController extends Controller
{
    // public function index()
    // {
    //     $book = Book::all();

    //     $data = compact('book');
    //     return view('admin.book.index')->with($data);
    // }
    public function index()
    {
        $books = Book::all();

        return view('admin.book.index', compact('books'));
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
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation as needed
        ]);

        // Create a new Book instance
        $book = new Book();
        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->description = $request->input('description');
        $book->status = $request->input('status');
        $book->total_inventory = $request->input('total_inventory');
        $book->issued_copies = $request->input('issued_copies');
        $book->price = $request->input('price');

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $book->photo = $imageName;
        }

        // Save the book
        $book->save();

        return redirect('admin/book')->with('success', 'Book added successfully');
    }        


    public function deleteBook($id)
    {
        $book = Book::find($id);

        if ($book) {
            $book->delete();
            return redirect()->back()->with('success', 'book deleted successfully');
        }

        return redirect()->back()->with('error', 'book not found');
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

        $book->save();
        return redirect('/admin/book');
    }
}
