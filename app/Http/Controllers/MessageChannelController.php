<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\MessageChannel;

class MessageChannelController extends Controller
{
    public function getChannelMessages($id){
        $data = Message::where('message_channel_id', $id)->with('user:id,name')->get();

        return $data;
    }

    public function generateChannel(Request $req){
        factory(MessageChannel::class)->create();
    }
}
