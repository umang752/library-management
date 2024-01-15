<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
class ManageUserController extends Controller
{
    public function showAddUser()
    {
        
        return view('admin.user.add');
    }

    
        
        public function index()
        {
            
            $currentUser = Auth::user();
            
            
            $users = DB::table('users')->where('user_id', '<>', $currentUser->id)->paginate(5);

        
            return view('admin.user.index', compact('users'));
        }
   

public function changeStatus($id, Request $request)
{
    $user = User::find($id);

    if (!$user) {
        return redirect()->back()->with('alert', 'User not found');
    }

    $status = $request->input('status');

    
    if (!in_array($status, ['active', 'inactive'])) {
        return redirect()->back()->with('alert', 'Invalid status');
    }

    $user->status = $status;
    $user->save();

    return redirect()->back()->with('alert', 'User status updated successfully');
}



    public function deleteUser($id)
    {
        

        $user = User::find($id);

        if ($user) {
            if($user->email=="admin@gmail.com"){
                return redirect()->back()->with('alert', 'cant delete super user');
    
            }
            else{
                $user->delete();
                return redirect()->back()->with('alert', 'User deleted successfully');    
            }
            
        }

        return redirect()->back()->with('alert', 'User not found');
    }

    public function addUser(Request $request)
{
    $validatedData = $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed', 
        'phone' => 'required|numeric',
    ]);

    $user = User::create([
        'fname' => $validatedData['firstname'],
        'lname' => $validatedData['lastname'],
        'email' => $validatedData['email'],
        'password' => $validatedData['password'], 
        'phone' => $validatedData['phone'],
        'status' => 'inactive',
        'type' => 'student',
    ]);

    return redirect('admin/user')->with('alert', 'User added successfully');
}


    public function showUpdateUserForm($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.update', compact('user'));
    }

    
    public function updateUser(Request $request)
{    
   

$validatedData = $request->validate([
    'firstname' => 'required|alpha|max:20',
    'lastname' => 'required|alpha|max:20',
    'email' => [
        'required',
        'email',
        Rule::unique('users', 'email')->ignore($request->id, 'user_id'),
    ],
    'phone' => 'required|numeric',
]);


    $id1 = $request['id'];
    $user = User::where('user_id', $id1)->first();

    $user->fname = $request['firstname'];
    $user->lname = $request['lastname'];
    $user->email = $request['email'];
    $user->phone = $request['phone'];

    
    

    $user->save();
    
    return redirect('/admin/user')->with('alert', 'User updated');
}

}
