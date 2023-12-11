<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    //

    public function register()
    {

        return view('register');
    }


    public function regisProses(Request $request)
    {

      
        $validatedData = $request->validate([
            'name'      => 'required',
            'email'     => 'required|email:dns',
            'password'  => 'required',
            'image'    =>  'image|file|max:1024'
        ]);


        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('avatar-images');
        }

        $validatedData['password'] = bcrypt($validatedData['password']);

        if (User::create($validatedData)) {
            return response()->json(
                [
                    "status" => "success",
                    "message" => "Berhasil registrasi"
                ],
                200
            );
        }
    }



    public function login()
    {

        return view('login');
    }


    public function loginProses(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);


        $user = DB::table('users')->where('email', $request->email)->first();

        if (Auth::attempt($validatedData)) {
            return response()->json([
                "status" => true,
                "data" => [
                    "users" => $user,
                    "message" => "Login sukses"
                ]
            ], 200);
        } else {
            return response()->json([
                "success" => false,
                "message" => "Login gagal"
            ], 422);
        }
    }


    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return response()->json([
            'status' => true,
            'data' => [
                'message' => 'Logout Berhasil'
            ]
        ], 200);
    }
}
