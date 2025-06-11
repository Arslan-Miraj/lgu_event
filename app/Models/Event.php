<?php

namespace App\Models;

use App\Models\Society;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 
        'description', 
        'organized_by', 
        'location', 
        'event_date', 
        'start_time', 
        'end_time', 
        'duration', 
        'poster', 
        'created_by', 
        'status'
    ];

    public function society(){
        return $this->belongsTo(Society::class, 'organized_by');
    }
}
