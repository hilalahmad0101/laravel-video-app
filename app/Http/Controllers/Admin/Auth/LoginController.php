<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'username' => ['required'],
                'password' => ['required'],
            ]);
            if ($validation->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validation->errors()->all(),
                ]);
            } else {
                $users = User::where('username', $request->username)->first();
                if (!$users) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Invalid username and password',
                    ]);
                } else {
                    if (!Hash::check($request->password, $users->password)) {
                        return response()->json([
                            'success' => false,
                            'message' => 'Invalid username and password',
                        ]);
                    } else {
                        $token = $users->createToken('token')->plainTextToken;
                        return response()->json([
                            'success' => true,
                            'token' => $token,
                            'message' => 'Login Successfully',
                        ]);
                    }
                }
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ]);
        }
    }


    public function updatePassword(Request $request)
    {

        $user_id = auth()->user()->id;
        $users = User::findOrFail($user_id);
        if (Hash::check($request->old_password, $users->password)) {
            if ($request->new_password != '' || $request->c_password != '') {
                if ($request->new_password  == $request->c_password) {
                    $users->password = Hash::make($request->new_password);
                    $result = $users->save();
                    if ($result) {
                        return response()->json([
                            'success' => true,
                            'message' => 'Password Update Successfully'
                        ]);
                    } else {
                        return response()->json([
                            'success' => false,
                            'message' => 'Server Problem'
                        ]);
                    }
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'New Password and Confirm password are not matched'
                    ]);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'New Password and Confirm password are not matched'
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Password is invalid'
            ]);
        }
    }
}
