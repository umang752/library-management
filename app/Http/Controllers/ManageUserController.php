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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'phone' => 'required|numeric', // Adjust validation rules as per your needs
        ]);

        $user = User::create([
            'fname' => $validatedData['firstname'],
            'lname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'], // Hash the password
            'phone' => $validatedData['phone'],
            'status'=>'active',
            'type'=>'student',
        ]);

        // Redirect or perform any other actions after user creation
        return redirect()->with('success', 'User added successfully');
    }

    public function showUpdateUserForm($id)
    {
        $user = User::findOrFail($id); // Fetch the user by ID
        return view('admin.update_user', compact('user')); // Assuming 'update_user.blade.php' is your update user view file
    }

    // Method to handle user update process
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id); // Fetch the user by ID

        // Update the user details
        $user->fname = $request->input('firstname');
        $user->lname = $request->input('lastname');
        $user->password = $request->input('password'); 
        $user->phone = $request->input('phone');
        $user->save();

        // Redirect or perform any action after updating user details
        return redirect()->back()->with('success', 'User details updated successfully');
    }
}
