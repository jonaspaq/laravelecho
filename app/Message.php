<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [
        
    ];

    public function channel()
    {
        return $this->belongsTo('App\MessageChannel');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
