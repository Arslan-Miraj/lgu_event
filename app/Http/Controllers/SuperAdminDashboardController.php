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

    public function edit($id)
    {
        $society = Society::with('head')->findOrFail($id);
        // dd($society);
        return response()->json([
            'status' => true,
            'data' => $society
        ]);
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'society_name' => 'required|string|max:255',
        'admin_name' => 'required|string|max:255',
        'admin_email' => 'required|email|max:255',
    ]);

    $society = Society::findOrFail($id);
    $oldHead = User::findOrFail($society->head_id);

    // Check if email is unchanged (same admin)
    if ($oldHead->email === $request->admin_email) {
        // Same admin, just update society details
        $society->name = $request->society_name;
        $society->description = $request->description ?? '';
        $society->save();

        // Also update admin name if needed
        $oldHead->name = $request->admin_name;
        $oldHead->save();

        return response()->json(['status' => true, 'message' => 'Society updated.']);
    }

    // Admin email has changed, check if new email already exists
    $newAdmin = User::where('email', $request->admin_email)->first();

    if ($newAdmin) {
        // Check if this user is already a society head
        $isAlreadyHead = Society::where('head_id', $newAdmin->id)->exists();

        if ($isAlreadyHead) {
            return response()->json([
                'status' => false,
                'message' => 'The selected admin is already a head of another society.'
            ]);
        }

        // Assign new head
        $society->head_id = $newAdmin->id;
    } else {
        // Create new user and assign role as head (optional: assign role_id = 2 or 'head')
        $newAdmin = User::create([
            'name' => $request->admin_name,
            'email' => $request->admin_email,
            'password' => bcrypt('password'), // or send invite email
        ]);

        $society->head_id = $newAdmin->id;

    }

    // Update society info
    $society->name = $request->society_name;
    $society->description = $request->description ?? '';
    $society->save();
    $society->load('head');
    return response()->json(['status' => true, 'message' => 'Society and head updated.']);
}


    public function delete($id)
    {
        $society = Society::findOrFail($id);
        $society->delete();

        return redirect()->back()->with('success', 'Society deleted successfully.');
    }


}
