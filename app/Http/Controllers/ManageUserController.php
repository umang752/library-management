<?php

namespace App\Http\Controllers;

use App\Models\Bookissued;
use App\Models\User;
use App\Models\Membership;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ManageUserController extends Controller
{
    //
    public function showusers()
    {
        if(Auth::check()){
        $query = User::paginate(5);
        return view('manageuser', compact('query'));}
        return view('login');
    }
    public function AddUser()
    {
        return view('adduser');
    }
    public function edituser($id)
    {
        $data = User::find($id);
        return view('useredit', compact('data'));
    }

    public function deleteuser($id)
    {
        $data = User::find($id);
        return view('deleteuser', compact('data'));
    }
    public function postAddUser(Request $request)
    {
        $input = $request->all();
        try {
            $rules = [
                'fname' => 'required|alpha|max:30',
                'lname' => 'required|alpha|max:20',
                // 'phone' => 'required|numeric|digits:10',
                'phone' => [
                    'required',
                    'regex:/^[9876](?!.*(.)\1{4})[0-9]{9}$/',
                ],
                'email' => 'required|email|unique:users|max:50',
                'status' => 'required|alpha|max:20',
                'role' => 'required|alpha|max:20',
                'password' => 'required|min:8',
                'confirm_password' => 'required|min:8|same:password',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput($request->input());
            } else {
                $user = new User;
                $user->first_name = $input['fname'];
                $user->last_name = $input['lname'];
                $user->phone_number = $input['phone'];
                $user->status = $input['status'];
                $user->role = $input['role'];
                $user->email = $input['email'];
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->to('manage-user')->with('success', 'User Added Successfully');
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 400,
                'code' => 'failed'
            ], 400);
        }
    }

    public function postedituser($id, Request $request)
    {

        
        $rules = [
            'fname' => 'required|alpha|max:30',
            'lname' => 'required|alpha|max:20',
            // 'phone' => 'required|numeric|digits:10',
            'phone' => [
                'required',
                'regex:/^[9876](?!.*(.)\1{4})[0-9]{9}$/',
            ],
            'email' => 'required|email|unique:users|max:50',
            'status' => 'required|alpha|max:20',
            'role' => 'required|alpha|max:20',
            
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            // dd("hiii");
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        } 
        $inputs = $request->all();
        $result = User::where('user_id', $id)->update([
            'first_name' => $inputs['fname'],
            'last_name' => $inputs['lname'],
            'phone_number' => $inputs['phone'],
            'role' => $inputs['role'],
            'status' => $inputs['status'],
            'email' => $inputs['email'],
            // 'password' => Hash::make($inputs['password'])
        ]);
        return redirect()->to('manage-user')->with('success', 'User Edited Successfully');
    }
    public function postdeleteuser()
    {
        $request = request()->all();
        $id = $request['itemId'];

        Membership::where('user_id', $id)->delete();
        Bookissued::where('user_id', $id)->delete();
        $result = User::where('user_id', $id)->delete();

        if ($result) {
            // dd("success");
            return redirect()->back()->with('success', 'User deleted successfully.');
        } else {
            return redirect()->to('manage-user')->with('error', 'Failed to delete user.');
        }
    }
    public function AddMembership($id)
    {
        $data = User::find($id);
        return view('membership', compact('data'));
    }
    public function postAddMembership($id, Request $request)
    {

        $user = User::where('user_id', $id)->first();
        $check = Membership::where('user_id', $id)->first();
        if (!$check) {
            $membership = new Membership;

            $membership->user_id = $request->id;
            $membership->status = $user->status;
            $membership->started_date = Carbon::now()->format('Y-m-d H:i:s');
            $membership->description = "membership granted";
            $membership->end_date = (clone Carbon::now())->addDays(24)->format('Y-m-d H:i:s');
            $membership->save();
        }
        return redirect()->to('manage-user')->with('success', 'Membership Provided');
    }
}
