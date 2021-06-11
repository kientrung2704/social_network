<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserImage as UserImageResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required|regex:/(0)[0-9]{9}/|unique:users',
            'email' => 'email|required|unique:users',
            'password' => 'required'
        ]);
        $validatedData['password'] = bcrypt($request->password);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json(
            [
                'code' => 1000,
                'message' => 'Đăng ký tài khoản thành công',
                'data' => [
                    'id' => auth()->user()->id,
                    'user' => $user,
                    'cover_image' => new UserImageResource($user),
                    'profile_image' => new UserImageResource($user)
                ]
            ], 200
        );

    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'phone' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt($loginData)) {
            $user  = auth()->user();
            $token = $user->createToken('Token')->accessToken;
            return response()->json(
                [
                    'code' => 1000,
                    'data' => [
                        'user' => $user,
                        'cover_image' => new UserImageResource($user),
                        'profile_image' => new UserImageResource($user)
                    ],
                    'token' => $token,
                    'message' => 'Đăng nhập thành công'
                ], 200
            );
        } else {
            return response()->json(
                [
                    'code' => 1004,
                    'message' => 'Invalid credentials'
                ]
            );
        }

    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return response()->json([
            'code' => 1000,
            'message' => 'Logout Thành Công'
        ], 200);
    }

    public function changePassword(Request $request)
    {
        $loginData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $isUpdate = User::where('id', auth()->user()->id)
            ->update(["password" => bcrypt($loginData["password"])]);
        if ($isUpdate) {
            return response()->json(
                [
                    'code' => 1000,
                    'message' => "Đổi mật khẩu thành công"
                ], 200);
        } else {
            return response()->json(['message' => "Đổi mật khẩu thất bại"], 211);
        }
    }
}