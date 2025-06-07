<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Returns register view
    public function register(){
        return view('auth.register');
    }

    // Handles registration process
    public function registerProcess(Request $request){
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        if ($validation->passes()){
            $data = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);
            $data->save();

            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        }
        else{
            return response()->json([
                'status' => false,
                'errors' => $validation->errors()
            ]);
        }
    }

    // Returns login view
    public function login(){
        return view('auth.login');
    }

    // Handles login process
    public function loginProcess(Request $request){
        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validation->passes()){
            if (Auth::attempt($request->only('email', 'password'))){
                $user = Auth::user();
                return response()->json([
                    'status' => true,
                    // 'errors' => []
                    'role' => $user->role,
                ]);
            }
            return response()->json([
            'status' => false,
            'errors' => [
                'email' => ['Invalid email or password.']
            ]
        ]);
        }
        else{
            return response()->json([
                'status' => false,
                'errors' => $validation->errors()
            ]);
        }
    }

    // Handles Logout
    public function logout(){
        Auth::logout();
        return redirect()->route('account.login');
    }
}
