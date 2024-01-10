<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ManageUsersController extends Controller
{
    
    public function giveUsers(Request $request){
        $users = User::all();
        // echo "<pre>";
        // print_r($users->toArray());
        // echo "</pre>";
        // die;
        $data = compact('users');
        return view('/adminLayouts/manageUsers')->with($data);
    }

    public function deleteUser($id){
        // $curr_id = $request->id;
        User::find($id)->delete();
        return redirect()->back();
    }

    public function editUser($id){
        $user = User::find($id);
        if(is_null($user)){
            return redirect('/manage-users');
        }
        else{
            
        }
    }

}
