<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $banner=Banner::all();
         return view('pages.admin.Banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.Banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string',
            'image'=>'nullable|image|mimes:jpg,png,jpeg|max:2048',
             'subtitle'=>'required|string',
        ]);

        $imagePath=null;
        if($request->hasFile('image')){
            $imagePath=$request->file('image')->store('banner_images','public');
        }

        Banner::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'subtitle'=>$request->subtitle,
            'image'=>$imagePath,
        ]);

        return redirect()->route('banner.index')->with('success','Banner created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $banner=Banner:: findOrFail($id);
        return view('pages.admin.Banner.edit', compact('banner'));
     }

       public function update(Request $request, $id){
         $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string',
            'image'=>'nullable|image|mimes:jpg,png,jpeg|max:2048',
             'subtitle'=>'required|string',
        ]);

    $imagePath=$request->image;
    $banner = Banner::findOrFail($id);
    $imagePath = $banner->image;
    if($request->hasFile('image')){
        $imagePath = $request->file('image')->store('banner_image','public');
    }

    $banner->update([
           'title'=>$request->title,
            'description'=>$request->description,
            'subtitle'=>$request->subtitle,
            'image'=>$imagePath,
        ]);
    return redirect()->route('banner.index')->with('success','banner updated successfully');
}
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
