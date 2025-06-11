<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $today = Carbon::today();
        $maxDate = Carbon::today()->addDays(6);

        $events = Event::where('event_date', '>=', $today)->where('event_date', '<=', $maxDate)
        ->orderBy('event_date', 'asc')->orderBy('start_time', 'asc')->take(6)->get();
        return view('welcome', compact('events'));
    }

}
