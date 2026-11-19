<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;

class AdminorderController extends Controller
{
    public function index(){
        $orders=Orders::with('user')->latest()->get();

        return view ('pages.admin.Order.index', compact('orders'));
    }

    public function show($id)
{
    $orders = Orders::with(['user', 'orderItems.product'])
                ->findOrFail($id);

    return view('pages.admin.Order.show', compact('orders'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:Pending,Processing,Shipped,Delivered,Cancelled',
    ]);

    $orders = Orders::findOrFail($id);

    $orders->status = $request->status;
    $orders->save();

    return redirect()->back()->with('success', 'Order status updated successfully.');
}
}
