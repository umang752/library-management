<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function postRegister(Request $request)
    {
        $input = $request->all();
       try {
            $validator = Validator::make($request->all(), [
                'fname' => 'required|alpha|max:30',
                'lname' => 'required|alpha|max:20',
                'phone' => 'required|numeric|digits:10',
                'email' => 'required|email|unique:users|max:50',
                'status' => 'required|alpha|max:20',
                'password' => 'required|min:8',
                 ]);
                 
            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'message' => 'Invalid Details'
                ], 400);
            } else {
                $user = new User;
                $user->first_name = $input['fname'];
                $user->last_name = $input['lname'];
                $user->phone_number = $input['phone'];
                $user->status = $input['status'];
                $user->email = $input['email'];
                // $user->password =$input['password'];
                $user->password =Hash::make($request->password);
                $user->save();
            //    dd(".......999");
        
              return redirect('/login');
                // return response()->json([
                //     'status' => 200,
                //     'code' => 'success'
                // ], 200);
            }
            // return redirect('login');
        } catch (Exception $e) {
            return response()->json([
                'status' => 400,
                'code' => 'failed'
            ], 400);
        }

    }













}
