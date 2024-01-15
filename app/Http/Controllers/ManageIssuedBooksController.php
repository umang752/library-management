<?php

namespace App\Http\Controllers;

use App\Models\Bookissued;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class ManageIssuedBooksController extends Controller
{
    //
    public function showissuebooks()
    {
        $query = Bookissued::paginate(5);
        return view('manageissuebook', compact('query'));
    }
    public function getuserbookissue()
    {
        dd("hii");
        return view('addissuebook');
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
        return redirect()->to('manage-issue-books')->with('success', 'Book Issued successfully');
    }
    else {
        return redirect()->to('manage-issue-books')->with('error', 'user not registered');
    }
    }
}
