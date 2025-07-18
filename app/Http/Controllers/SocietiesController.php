<?php

namespace App\Http\Controllers;

use Storage;
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
        $user = auth()->user();
        $society = Society::where('head_id', $user->id)->first();
        return view("society_admin.society_profile", compact('society'));
    }

    public function updateSocietyProfile(Request $request){

        $validation = Validator::make($request->all(), [
            'description' => 'required',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:max_width=192,max_height=192',
        ]);

        $society_data = Society::find($request->society_id);
        $society_logo = $society_data->logo;

        if ($request->hasFile('logo')){
            if ($society_data->logo && Storage::disk('public')->exists($society_data->logo)){
                Storage::disk('public')->delete($society_data->logo);
            }

            $society_logo = $request->file('logo')->store('society_logo', 'public');
        }

        if ($validation->passes()){

            $society_data->update([
                'logo' => $society_logo,
                'description' => $request->description,
            ]);
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


    public function viewSocietyMemberProfile(){
        return view('society_admin.member_profile');
    }

}
