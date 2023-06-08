<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::latest()->paginate(5);

        return view('pages.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = Order::create($request->all());

        return redirect()->route('rooms.show', $order->room->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function checkout(Request $request, Order $order)
    {
        $order->update($request->all());

        return redirect()->route('index');
    }

    public function service(Request $request, Order $order)
    {
        $order_detail = $order->order_details->where('service_id', $request->service_id)->first();
        if ($order_detail) {
            $order_detail->update(['quantity' => $order_detail->quantity + $request->quantity]);
        } else {
            OrderDetail::create([
                'order_id' => $order->id,
                'service_id' => $request->service_id,
                'quantity' => $request->quantity
            ]);
        }

        return redirect()->route('rooms.show', $order->room->id);
    }
}
