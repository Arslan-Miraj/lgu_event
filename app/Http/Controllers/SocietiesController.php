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
                if ($user->role !== 'admin'){
                        $user->update([
                        'name' => $request->admin_name,
                        'role' => 'admin'
                    ]);
                }
                else{
                    $user->update([
                        'name' => $request->admin_name,
                    ]);
                }
                

                $society = Society::create([
                    'name' => $request->society_name,
                    'head_id' => $user->id
                ]);
                $society->save();

            }
            else{
                $admin = User::create([
                    'name' => $request->admin_name,
                    'role' => 'admin',
                    'email' => $request->admin_email,
                    'password' => Hash::make('123456')
                ]);
                $admin->save();

                $society = Society::create([
                    'name' => $request->society_name,
                    'head_id' => $admin->id
                ]);
                $society->save();
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

    public function viewSocietyProfile(){
        return view("society_admin.society_profile");
    }
}
