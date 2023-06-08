<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Room;
use App\Models\Service;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::paginate(5);

        return view('pages.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();

        return view('pages.rooms.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Room::create($request->all());

        return redirect()->route('rooms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        $customers = Customer::all();
        $order = $room->orders()->where(['checkout_at' => null])->first();
        if ($order) {
            $rent_hours = now()->diffInHours($order->created_at) + 1;
            $total = $rent_hours * $room->price;
            $total_service = 0;
            foreach ($order->order_details as $order_detail) {
                $total_service += $order_detail->service->price * $order_detail->quantity;
            }
            $total_payment = $total + $total_service;
            $services = Service::all();
            return view('pages.rooms.show', compact('room', 'customers', 'total', 'rent_hours', 'services', 'total_payment'));
        }
        return view('pages.rooms.show', compact('room', 'customers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $types = Type::all();

        return view('pages.rooms.edit', compact('room', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $room->update($request->all());

        return redirect()->route('rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('rooms.index');
    }
}
