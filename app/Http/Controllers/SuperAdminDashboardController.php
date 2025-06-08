<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Society;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SuperAdminDashboardController extends Controller
{
    // Show total societies in dashboard
    public function index(){
        $totalSocieties = Society::where('deleted', 0)->count();
        return view('admin.dashboard', compact('totalSocieties'));
    }

    // Shows list of societies in societies_list page
    public function societies_list(){
        $societies = Society::with('head')->where('deleted', 0)->get();
        return view('admin.society_lists', compact('societies'));
    }

    public function edit(Request $request, $id){
        $data = Society::find($id);
        dd($data);
        $validation = Validator::make($request->all(), [
            'society_name' => 'required|string',
            'admin_name' => 'required|string',
            'admin_email' => 'required|email'
        ]);

         // $user = User::where('email', $request)
         
        if ($validation->passes()) {
    $society = Society::find($request->id);

    if ($society) {
        $currentAdmin = User::find($society->head_id);

        if ($currentAdmin && $currentAdmin->email === $request->admin_email) {
            // ✅ Same admin, just update name
            $currentAdmin->update([
                'name' => $request->admin_name
            ]);
        } else {
            // 🆕 New email provided, either change admin or create new one
            $newAdmin = User::where('email', $request->admin_email)->first();

            if (!$newAdmin) {
                $newAdmin = User::create([
                    'name' => $request->admin_name,
                    'email' => $request->admin_email,
                    'role' => 'admin',
                    'password' => Hash::make('123456') // default password
                ]);
            } else {
                // Optional: update the new admin name if you want
                $newAdmin->update([
                    'name' => $request->admin_name,
                    'role' => 'admin'
                ]);
            }

            // 🔁 Update the society's head to the new admin
            $society->head_id = $newAdmin->id;
        }

        // 🎯 Update society name regardless
        $society->name = $request->society_name;
        $society->save();

        return response()->json(['status' => true]);
    }
}

        else{
            return response()->json([
                'status' => false,
                'errors' => $validation->errors(),
            ]);
        }
    }
}
