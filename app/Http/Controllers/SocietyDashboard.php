<?php

namespace App\Http\Controllers;

// use Log;
use App\Models\Society;
use Illuminate\Http\Request;
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
        $society = Society::where('head_id', $user->id)->first();
        
        return view('society_admin.head_profile', compact('society'));
    }

    public function updateHeadProfile(Request $request){
        $society = Society::where('head_id', auth()->user()->id)->first();
        dd($society);
        $head_image = $request->file('headImage');

        $validation = Validator::make($request->all(), [
            'contact_no' => 'required|string',
            'headImage' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'message' => 'required|min:50|max:500'
        ]);


        if ($validation->passes()){
            $path = $request->file('headImage')->store('head_images', 'public');

            $result  = $society->update([
                'head_contact' => $request->contact_no,
                'head_image' => $path,
                'head_message' => $request->message
            ]);

            \Log::info('Update result', ['success' => $result]);
        }
        else{
            return response()->json([
                'status' => false,
                'errors' => $validation->errors()
            ]);
        }
    }
}
