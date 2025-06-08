<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    protected $fillable = ['id', 'name', 'head_id', 'head_image', 'head_message', 'head_contact', 'logo', 'description'];

    public function head() {
    return $this->belongsTo(User::class, 'head_id');
}
}
