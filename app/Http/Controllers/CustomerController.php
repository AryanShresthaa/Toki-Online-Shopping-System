<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
   public function index()
{
    $customers = User::where('role', 'user')  ->latest()->get();

    return view('pages.admin.Customer.index', compact('customers'));
}
public function show($id)
{
    $customer = User::with('orders') ->where('role', 'user') ->findOrFail($id);

    $totalSpent = $customer->orders->sum('total');

    return view('pages.admin.customer.show', compact('customer', 'totalSpent'));
}
}
