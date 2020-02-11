<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MessageChannel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $check = MessageChannel::where('id', '<>', 0)->first();

        if(!$check)
            factory(MessageChannel::class)->create();

        return view('chat');
    }
}
