<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ManageUserController extends Controller
{
    public function showAddUserForm()
    {
        return view('admin.add_user'); 
    }

    public function index()
    {
        $users = User::all();

        return view('admin.manage_user', compact('users'));
    }
    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully');
        }

        return redirect()->back()->with('error', 'User not found');
    }

    public function addUser(Request $request)
    {
        
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'phone' => 'required|numeric',
        ]);

        $user = User::create([
            'fname' => $validatedData['firstname'],
            'lname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'], 
            'phone' => $validatedData['phone'],
            'status'=>'active',
            'type'=>'student',
        ]);

       
        return redirect('/adminhome/manageuser');
    }

    public function showUpdateUserForm($id)
    {
        $user = User::findOrFail($id); 
        return view('admin.update_user', compact('user')); 
    }

    
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id); 

        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'phone' => 'required|numeric',
        ]);
        
        $user->fname = $request->input('firstname');
        $user->lname = $request->input('lastname');
        $user->password = $request->input('password'); 
        $user->phone = $request->input('phone');
        $user->save();

        
        return redirect('/adminhome/manageuser');
    }
}
