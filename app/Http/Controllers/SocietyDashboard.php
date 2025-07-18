<?php

namespace App\Http\Controllers;

// use Log;
use Storage;
use App\Models\Society;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SocietyDashboard extends Controller
{
    public function index(){
        $user = auth()->user();
        $society = Society::where('head_id', $user->id)->first();
        // dd($society);

        // $events = Event::where('society_id', $society->id)->get(); // Example

        return view('society_admin.dashboard', compact('society'));
    }


    // Head profile view
    public function viewHeadProfile(){

        $user = auth()->user(); 
        return view('society_admin.head_profile', compact('user'));
    }

    public function updateHeadProfile(Request $request){

        $validation = Validator::make($request->all(), [
            'contact_no' => ['required', 'regex:/^03[0-9]{9}$/'],
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = auth()->user();
        $headImagePath = $user->image;

        if ($request->hasFile('headImage')){
            if ($user->image && Storage::disk('public')->exists($user->image)){
                Storage::disk('public')->delete($user->image);
            }

            $headImagePath = $request->file('headImage')->store('head_images', 'public');
        }

        if ($validation->passes()){

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'contact_no' => $request->contact_no,
                'plain_password' => $request->password,
                'image' => $headImagePath,
                'message' => $request->message
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
}
