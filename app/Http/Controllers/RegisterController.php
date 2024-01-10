<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Models\user;
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
                'email' => 'required|email|unique:user|max:50',
                'status' => 'required|alpha|max:20',
                'password' => 'required|min:8|confirmed',
                 ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'message' => 'Invalid Details'
                ], 400);
            } else {
                $user = new user;
                $user->fname = $input['fname'];
                $user->lname = $input['lname'];
                $user->phone = $input['phone'];
                $user->status = $input['status'];
                $user->email = $input['email'];
                $user->password = md5($input['password']);
               $user->save();
                return response()->json([
                    'status' => 200,
                    'code' => 'success'
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 400,
                'code' => 'failed'
            ], 400);
        }
    }













}
