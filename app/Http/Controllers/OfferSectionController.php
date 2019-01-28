<?php

namespace App\Http\Controllers;

use App\OfferSection;
use App\products;
use Illuminate\Http\Request;

class OfferSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.offer.index')->with(
            [
                'OfferSection'=> OfferSection::get(),
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
        $this->validate($request, [
            'title_ar'=>'required',
            'description_ar'=>'required',
            'product_id'=>'required',
            'image'=>'required'
        ]);
        $OfferSection = new OfferSection();

        $OfferSection->title_ar = $request->title_ar;
        $OfferSection->title_en = $request->title_en;
        $OfferSection->description_ar = $request->description_ar;
        $OfferSection->description_en = $request->description_en;
        $OfferSection->product_id = $request->product_id;

        $file2 = $request->file('image');
        if($file2) {
            
                $destinationPath = "img/alt_images";
                $filename = $file2->getClientOriginalName();
                $file2->move($destinationPath, $filename);

                
                $OfferSection->image = $filename;
                
            
        }
        $OfferSection->save();
        session()->flash('success', 'added Successfully');

        return redirect('/OfferSection');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OfferSection  $offerSection
     * @return \Illuminate\Http\Response
     */
    public function show(OfferSection $offerSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OfferSection  $offerSection
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $OfferSection = OfferSection::where('id',$id)->first();
        return view('dashboard.pages.offer.update')->with([
            'OfferSection'=>$OfferSection,
            'products'=>products::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OfferSection  $offerSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title_ar'=>'required',
            'description_ar'=>'required',
            'product_id'=>'required'
        ]);
        $OfferSection = OfferSection::where('id',$id)->first();

        $OfferSection->title_ar = $request->title_ar;
        $OfferSection->title_en = $request->title_en;
        $OfferSection->description_ar = $request->description_ar;
        $OfferSection->description_en = $request->description_en;
        $OfferSection->product_id = $request->product_id;

        $file2 = $request->file('image');
        if($file2) {
            
                $destinationPath = "img/alt_images";
                $filename = $file2->getClientOriginalName();
                $file2->move($destinationPath, $filename);

                
                $OfferSection->image = $filename;
                
            
        }
        $OfferSection->save();
        session()->flash('success', 'Updated Successfully');

        return redirect('/OfferSection');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OfferSection  $offerSection
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $OfferSection = OfferSection::where('id',$id)->delete();
        session()->flash('success', 'Deleted Successfully');
        return redirect('product');
    }
}
