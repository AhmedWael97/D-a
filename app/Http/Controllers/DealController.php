<?php

namespace App\Http\Controllers;

use App\deal;
use Illuminate\Http\Request;
use App\products;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.deal')->with(
            [
                'deal'=> deal::first(),
                'product'=> products::get(),
        ]);
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function show(deal $deal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function edit(deal $deal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title_ar'=>'required',
            'product_id'=>'required'
        ]);
        $deal = deal::where('id',$id)->first();

        $deal->title_ar = $request->title_ar;
        $deal->title_en = $request->title_en;
        $deal->product_id = $request->product_id;

        $file2 = $request->file('image');
        if($file2) {
            
                $destinationPath = "img/alt_images";
                $filename = $file2->getClientOriginalName();
                $file2->move($destinationPath, $filename);

                
                $deal->image = $filename;
                
            
        }
        $deal->save();
        session()->flash('success', 'added Successfully');

        return redirect('/deal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function destroy(deal $deal)
    {
        //
    }
}
