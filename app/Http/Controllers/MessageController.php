<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Events\NewMessage;
use Auth;

class MessageController extends Controller
{
    public function send(Request $request)
    {
        $completeDetails = $request->all();
        $request = $request->only('message_channel_id', 'user_id', 'message');
    
        $data = Message::create($request);

        broadcast(new NewMessage($completeDetails))->toOthers();

        return $data;
    }
}
