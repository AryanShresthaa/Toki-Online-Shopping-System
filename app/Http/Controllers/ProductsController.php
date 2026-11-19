<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Category;
use App\Models\Carts;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::with('category')->get();

        return view('pages.admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('pages.admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        }

        Products::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('product.index')
            ->with('success', 'Product created successfully');
    }

    public function show(Products $products)
    {
        //
    }


public function edit($id)
{
    $products = Products::findOrFail($id);
    $categories = Category::all();

    return view('pages.admin.product.edit', compact('products', 'categories'));
}

       public function update(Request $request, $id){
         $request->validate([
             'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

    $imagePath=$request->image;
    $products = Products::findOrFail($id);
    $imagePath = $products->image;
    if($request->hasFile('image')){
        $imagePath = $request->file('image')->store('product_image','public');
    }

    $products->update([
             'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $imagePath,
        ]);
    return redirect()->route('product.index')->with('success','Product updated successfully');
}

   public function delete($id)
{
    $product = Products::findOrFail($id);

    Carts::where('product_id', $id)->delete();

    $product->delete();

    return redirect()->route('product.index') ->with('success', 'Product deleted successfully');
}
}