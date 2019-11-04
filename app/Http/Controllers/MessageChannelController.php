<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageChannelController extends Controller
{
    public function getChannelMessages($id){
        $data = Message::where('message_channel_id', $id)->with('user:id,name')->get();

        return $data;
    }
}
