<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Society;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SocietiesController extends Controller
{
    public function registerSociety(Request $request){
        $validation = Validator::make($request->all(), [
            'society_name' => 'required|string|unique:societies,name',
            'admin_name' => 'required|string',
            'admin_email' => 'required|email'
        ]);

        if ($validation->passes()){

            // Checking if user already registered as student and updating to admin
            $user = User::where('email', $request->admin_email)->first();
            if ($user){
                $user->update([
                    'name' => $request->admin_name,
                    'role' => 'admin'
                ]);

                $society = Society::create([
                    'name' => $request->society_name
                ]);
                $society->save();

            }
            else{
                $society = Society::create([
                    'name' => $request->society_name
                ]);
                $society->save();

                $admin = User::create([
                    'name' => $request->admin_name,
                    'role' => 'admin',
                    'email' => $request->admin_email,
                    'password' => Hash::make('123456')
                ]);
                $admin->save();
            }

            return response()->json([
                'status' => true,
            ]);
        }
        else{
            return response()->json([
                'status' => false,
                'errors' => $validation->errors()
            ]);
        }
    }
}
