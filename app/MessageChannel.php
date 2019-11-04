<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageChannel extends Model
{
    protected $guarded = [
        ''
    ];


    public function messages()
    {
        return $this->hasMany('App\Message');
    }
}
