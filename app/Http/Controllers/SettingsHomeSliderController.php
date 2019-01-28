<?php

namespace App\Http\Controllers;

use App\settings_home_slider;
use Illuminate\Http\Request;

class SettingsHomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.settings_home_slider')->with('settings_home_slider', settings_home_slider::get());
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
            'image_slider'=>'required'
        ]);

        
        $file2 = $request->file('image_slider');
        if($file2) {
            foreach ($file2 as $image) {
                $destinationPath = "img/alt_images";
                $filename = $image->getClientOriginalName();
                $image->move($destinationPath, $filename);

                $settings_home_slider = new settings_home_slider();
                $settings_home_slider->image_slider = $filename;
                $settings_home_slider->save();
            }
        }
        session()->flash('success', 'added Successfully');

        return redirect('/settings_home_slider');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\settings_home_slider  $settings_home_slider
     * @return \Illuminate\Http\Response
     */
    public function show(settings_home_slider $settings_home_slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\settings_home_slider  $settings_home_slider
     * @return \Illuminate\Http\Response
     */
    public function edit(settings_home_slider $settings_home_slider)
    {
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\settings_home_slider  $settings_home_slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image_slider'=>'required'

        ]);

        
        $file2 = $request->file('image_slider');
        if($file2) {
            
                $destinationPath = "img/alt_images";
                $filename = $file2->getClientOriginalName();
                $file2->move($destinationPath, $filename);

                $settings_home_slider = settings_home_slider::where('id',$id)->first();
                $settings_home_slider->image_slider = $filename;
                $settings_home_slider->save();
            
        }
        session()->flash('success', 'updated Successfully');

        return redirect('/settings_home_slider');      

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\settings_home_slider  $settings_home_slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        settings_home_slider::where('id',$id)->delete();
         return redirect('/settings_home_slider');      

    }
}
