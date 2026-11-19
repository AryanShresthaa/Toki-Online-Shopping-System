<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Orders;
use App\Models\OrderItem;
use App\Models\Products;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
{
    $cartItems = Carts::with('product')
                    ->where('user_id', auth()->id())
                    ->get();

        if ($cartItems->isEmpty()) {
        return redirect()->route('cart.index') ->with('error', 'Add some products before checking out.');
    }

    $total = 0;

    foreach($cartItems as $item){
        $total += $item->product->price * $item->quantity;
    }

    return view('pages.checkout', compact('cartItems','total'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required',
        'address' => 'required',
    ]);

    $cartItems = Carts::with('product')
            ->where('user_id', auth()->id())
            ->get();

    $total = 0;

foreach ($cartItems as $item) {

    $total += $item->product->price * $item->quantity;

}

$order = Orders::create([

    'user_id' => auth()->id(),
    'name' => $request->name,
    'phone' => $request->phone,
    'address' => $request->address,
    'total' => $total,
    'payment_method' => 'Cash on Delivery',
    'status' => 'Pending',

]);

foreach ($cartItems as $item) {

    OrderItem::create([

        'order_id' => $order->id,
        'product_id' => $item->product_id,
        'quantity' => $item->quantity,
        'price' => $item->product->price,

    ]);

}

foreach ($cartItems as $item) {

    $product = $item->product;
    $product->quantity -= $item->quantity;
    $product->save();

}

Carts::where('user_id', auth()->id())->delete();

return redirect()  ->route('home')  ->with('success', 'Order placed successfully.');
}
}
