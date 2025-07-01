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
    $validator = Validator::make($request->all(), [
        'society_name' => 'required|string|max:255',
        'admin_name' => 'required|string|max:255',
        'admin_email' => 'required|email|max:255',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()]);
    }

    $society = Society::findOrFail($id);
    $society->name = $request->society_name;
    $society->description = $request->description ?? '';
    $society->save();

    $head = User::find($society->head_id);
    $head->name = $request->admin_name;
    $head->email = $request->admin_email;
    $head->save();

    return response()->json(['status' => true]);
}

}
