<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use MoveMoveIo\DaData\Facades\DaDataAddress;

class OrderController extends Controller
{
    public function index()
    {
        return view('orders.index');
    }
    public function store(Request $request)
    {
        $address = DaDataAddress::standardization($request->address)[0]['result'];
        Order::create([
           'location' => $address,
           'start' => now(),
            'end' => now(),
            'status' => 1
        ]);

        return redirect()->back();
    }
    public function add()
    {
        return view('orders.add');
    }
    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        $address = $order->location;
        $location = [];
        return view('orders.show', compact('address', 'location'));
    }
}
