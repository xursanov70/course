<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request){
        $user = User::create([
            'username' => $request->username,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        $token = $user->createToken('auth-token')->plainTextToken;
        return response()->json(["message" => "Ro'yxatdan muvaffaqqiyatli o'tdingiz!", "token" => $token], 201);
    }

    public function login(LoginRequest $request){
        $login = [
            'username' => $request->username,
            'password' => $request->password
        ];
        if (Auth::attempt($login)){
            $user = $request->user();
            $token = $user->createToken('auth-token')->plainTextToken;
            return response()->json(['token' => $token, 'success' => true], 200);
        }else{
            return response()->json(["error" => "Noto'g'ri ma'lumot kiritdingiz!"], 401);
        }
    }

    public function profile(){
        return auth()->user();
    }

    public function searchUser(){
        $search = request('search');

          return  User::whereAny([
              'username',
              'full_name',
              'email',
              'phone',
          ], 'LIKE', "%$search%")
          ->paginate(15);

    }
}
