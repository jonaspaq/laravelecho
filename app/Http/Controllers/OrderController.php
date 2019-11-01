<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Events\OrderShipped;

class OrderController extends Controller
{
    public function index()
    {
        $data = Order::first();

        return response()->json($data, 200);
    }

    public function updateStatus($id)
    {
        $data = Order::find($id);
        $data['order_shipped'] = !$data['order_shipped'];
        $data->save();

        event(new OrderShipped($data));

        return response()->json($data, 200);
    }
}
