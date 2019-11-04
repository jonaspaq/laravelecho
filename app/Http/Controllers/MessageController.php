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
        $request = $request->only('message_channel_id', 'user_id', 'message');
        // $request['user_id'] = Auth::id();

        $data = Message::create($request);

        broadcast(new NewMessage($data))->toOthers();

        // $data = Message::with('user:id,name')->find($data)->first();
        return $data;
    }
}
