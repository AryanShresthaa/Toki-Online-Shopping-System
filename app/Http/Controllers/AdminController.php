<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\Category;
use App\Models\Orders;
use App\Models\User;
use App\Models\OrderItem;

class AdminController extends Controller
{
    public function index()
    {

    $topProducts = OrderItem::select(
        'product_id',
        DB::raw('SUM(quantity) as total_sold')
    ) ->with('product') ->groupBy('product_id') ->orderByDesc('total_sold') ->take(5) ->get();


        $productNames = [];
        $productSales = [];

    foreach ($topProducts as $item) {
     $productNames[] = $item->product->name;
    $productSales[] = $item->total_sold;
}

$recentOrders = Orders::with('user')->latest() ->take(5) ->get();

        $products = Products::count();
        $categories = Category::count();
        $orders = Orders::count();
        $users = User::count();
        $pendingOrders = Orders::where('status','Pending')->count();
        $shippedOrders = Orders::where('status','Shipped')->count();
        $deliveredOrders = Orders::where('status','Delivered')->count();
        $revenue = Orders::where('status','Delivered')->sum('total');
        return view('pages.admin.adminpage', compact(
            'products',
            'categories',
            'orders',
            'users',
            'pendingOrders',
            'shippedOrders',
            'deliveredOrders',
            'revenue',
            'productNames',
            'productSales',
            'recentOrders',
        ));
    }
}
