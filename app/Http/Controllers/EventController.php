<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Society;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index(){
        $society = Society::where('head_id', auth()->user()->id)->first();
        return view('society_admin.event', compact('society'));
    }

    public function create_event(Request $request){
        // $poster = $request->file('poster');
        $validation = Validator::make($request->all(), [
            'title' => 'required', 
            'description' => 'required', 
            'location' => 'required',
            'event_date' => 'required', 
            'start_time' => 'required', 
            'end_time' => 'required|after_or_equal:start_time', 
            'poster' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'end_time.after_or_equal' => 'The end time must be after or equal to the start time.',
        ]);

        $start = Carbon::createFromFormat('H:i', $request->start_time);
        $end = Carbon::createFromFormat('H:i', $request->end_time);
        $durationInMinutes = $end->diffInMinutes($start); // Optional: use diffForHumans() for string
        $formattedDuration = floor($durationInMinutes / 60) . ' hrs ' . ($durationInMinutes % 60) . ' mins';
        
        $posterPath = null;
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
        }
        if($validation->passes()){
            $user = auth()->user();
            $society = Society::where('head_id', $user->id)->first();
            $event = Event::create([
                'title' => $request->title, 
                'description' => $request->description, 
                'location' => $request->location,
                'event_date' => $request->event_date, 
                'start_time' => $request->start_time, 
                'end_time' => $request->end_time,
                'organized_by' => $society->id,
                'created_by' => $user->id,
                'poster' => $posterPath,
                'duration' => $formattedDuration
            ]);
            $event->save();
            return  response()->json([
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
