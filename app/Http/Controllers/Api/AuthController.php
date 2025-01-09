<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $credentials = $request->only('username', 'password');
        $admin = Admin::where('username', $credentials['username'])->first();

        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            $token = $admin->createToken('auth_token')->plainTextToken;
            return response()->json([
                'status' => 'success',
                'message' => 'Login Successful',
                'data' => [
                    'token' => $token,
                    'admin' => $admin,
                ],
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Login Failed',
        ], 401);
    }

    public function logout(Request $request) {
        $request->user()->tokens->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Logout Success',
        ], 200);
    }
}
