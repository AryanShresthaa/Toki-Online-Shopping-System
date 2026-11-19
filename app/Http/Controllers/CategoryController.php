<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           $category = Category::take(5)->get();
         return view('pages.admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name'=>'required|string|max:255',
            'image'=>'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $imagePath=null;
        if($request->hasFile('image')){
            $imagePath=$request->file('image')->store('category_images','public');
        }

        Category::create([
            'name'=>$request->name,
            'image'=>$imagePath,
        ]);

        return redirect()->route('cat.index')->with('success','Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
  public function edit($id){
        $category=Category:: findOrFail($id);
        return view('pages.admin.category.edit', compact('category'));
     }

       public function update(Request $request, $id){
         $request->validate([
            'name'=>'required|string|max:255',
            'image'=>'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

    $imagePath=$request->image;
    $category = Category::findOrFail($id);
    $imagePath = $category->image;
    if($request->hasFile('image')){
        $imagePath = $request->file('image')->store('category_image','public');
    }

    $category->update([
            'name'=>$request->name,
            'image'=>$imagePath,
        ]);
    return redirect()->route('cat.index')->with('success','Category updated successfully');
}
    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $category=Category::findOrFail($id);
        if($category){
            $category->delete();
        }
        return redirect()->route('cat.index')->with('success','Category delete successfully');
    }
    }

