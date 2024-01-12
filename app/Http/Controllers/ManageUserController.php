<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ManageUserController extends Controller
{
    public function showAddUser()
    {
        
        return view('admin.user.add');
    }

    public function index()
    {
        $users = User::all();
       

        $data = compact('users');
        return view('admin.user.index')->with($data);
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
            'status' => 'inactive',
            'type' => 'student',
        ]);

        return redirect('admin/user');
    }

    public function showUpdateUserForm($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.update', compact('user'));
    }

    public function updateUser(Request $request)
    {   
        $id1 = $request['id'];
        $user = User::where('user_id', $id1)->first();

        $user->fname= $request['firstname'];
        $user->lname= $request['lastname'];
        if($request['password']){
            $user->password= $request['password'];
        }
        $user->phone = $request['phone'];
        // $user->role= $request['user_role'];  

        $user->save();
        return redirect('/admin/user');


    }
}
