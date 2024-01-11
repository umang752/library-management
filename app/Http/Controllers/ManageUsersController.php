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

    public function updateUser($id){
        $user = User::find($id);
        if(is_null($user)){
            return redirect('/manage-users');
        }
        else{
            $data = compact('user','id');
            return view('adminLayouts/updateUserForm')->with($data);
        }
    }
    public function updateUserHandler( Request $request){
        $id1 = $request['id'];
        $user = User::where('user_id', $id1)->first();
        $user->fname= $request['First_Name'];
        $user->lname= $request['Last_Name'];
        $user->email= $request['Email'];
        $user->phone = $request['Phone_Number'];
        // $user->role= $request['user_role'];
        $user->save();
        return redirect('/manage-users');
    }
    public function addUser(){
        return view('adminLayouts/addUserForm'); //->with($data);
    }

    public function addUserHandler(Request $request){
        
        $request->validate(
            [
                'First_Name'=>'required',
                'Last_Name'=> 'required',
                'Email'=>'required | email',
                'Password'=> 'required',
                'Phone_Number'=> 'required | min:10| numeric'

            ]
            );
        $user = new User;
        $user->fname= $request['First_Name'];
        $user->lname= $request['Last_Name'];
        $user->email= $request['Email'];
        $user->password=$request['Password'];
        $user->phone = $request['Phone_Number'];
        $user->status = "Inactive";
        // $user->role= $request['user_role'];
        $user->save();

        return redirect("/manage-users");
    }


}
