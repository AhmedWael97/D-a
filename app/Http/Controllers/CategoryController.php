<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.category')->with('categories', category::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_ar' => 'required',
            'image' => 'required',

        ]);

        $category = new category();
        $category->name_ar = $request->name_ar;
        $category->name_en = $request->name_en;
        $file = $request->file('image');
        if($file)
        {
            $filename = $file->getClientOriginalName();
            $path = "img/alt_images";
            $file->move($path, $filename);
            $category->image =$filename;
        }
        $category->save();
        session()->flash('success', 'added Successfully');

        return redirect('/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name_ar' => 'required',
        ]);

        $category = category::find($id);
        $category->name_ar = $request->name_ar;
        $category->name_en = $request->name_en;
        $file = $request->file('image');
        if($file)
        {
            $filename = $file->getClientOriginalName();
            $path = "img/alt_images";
            $file->move($path, $filename);
            $category->image =$filename;
        }

        $category->save();
        session()->flash('success', 'updated Successfully');
        return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = category::find($id);
        $category->delete();
                session()->flash('success', 'deleted Successfully');

        return redirect('category');
    }
}
