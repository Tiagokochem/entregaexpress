<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
        return Delivery::with('company')->latest()->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'pickup_location' => 'required|string',
            'delivery_location' => 'required|string',
        ]);

        return Delivery::create([
            'company_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'pickup_location' => $request->pickup_location,
            'delivery_location' => $request->delivery_location,
        ]);
    }

    public function update(Request $request, Delivery $delivery)
    {
        $delivery->update($request->only('status'));
        return $delivery;
    }

    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        return response()->noContent();
    }
}

