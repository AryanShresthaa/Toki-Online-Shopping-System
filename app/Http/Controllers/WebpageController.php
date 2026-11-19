<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class WebpageController extends Controller
{
    public function home()
{
    $banner = Banner::all();
    $category = Category::all();

    $comboCategory = Category::where('name', 'Combo Pack')->first();

    return view('pages.home', compact('banner',
        'category',
        'comboCategory'
    ));
}
  public function shop(Request $request)
{
    $categories = Category::all();

    $products = Products::with('category');

    if ($request->has('category')) {
        $products->where('category_id', $request->category);
    }

    $products = $products->get();

    return view('pages.shop', compact('products', 'categories'));
}
public function showProduct($id)
{
    $product = Products::with('category')->findOrFail($id);

    return view('pages.productdetail', compact('product'));
}

}