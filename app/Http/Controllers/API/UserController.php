<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
            ]);
            if ($validateUser->fails()) {
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'validation error',
                        'errors' => $validateUser->errors(),
                    ],
                    401,
                );
            }
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            return response()->json(
                [
                    'status' => true,
                    'message' => 'validation create success',
                    'token' => $user->createToken('API Token')->plainTextToken,
                ],
                200,
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $th->getMessage(),
                ],
                500,
            );
        }
    }
    public function login(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);
            if ($validateUser->fails()) {
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'validation error',
                        'errors' => $validateUser->errors(),
                    ],
                    401,
                );
            }
            if(!Auth::attempt($request->only(['email', 'password']))){
                
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'Email or Password is not valid',
                       
                    ],
                    401,
                );
            }
            $user = User::where('email', $request->email)->first();
            return response()->json(
                [
                    'status' => true,
                    'message' => 'User Login in successfully',
                    'token' => $user->createToken('API Token')->plainTextToken,
                ],
                200,
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $th->getMessage(),
                ],
                500,
            );
        }

    }
    public function profile (){
        $userData = auth()->user();
        return response()->json(
            [
                'status' => true,
                'message' => 'Profile get successfully',
                'data' => $userData,
                'id' => $userData->id
            ],
            200,
        );
    }
    public function logout (){
        auth()->user()->tokens()->delete();
        return response()->json(
            [
                'status' => true,
                'message' => 'Logout successfully',
                'data' => [],
               
            ],
            200,
        );
    }
}
