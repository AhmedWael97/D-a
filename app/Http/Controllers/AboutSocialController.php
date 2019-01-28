<?php

namespace App\Http\Controllers;

use App\about_social;
use Illuminate\Http\Request;

class AboutSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.about')->with('about', about_social::first());
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\about_social  $about_social
     * @return \Illuminate\Http\Response
     */
    public function show(about_social $about_social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\about_social  $about_social
     * @return \Illuminate\Http\Response
     */
    public function edit(about_social $about_social)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\about_social  $about_social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'about_ar' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'google' => 'required',
            
        ]);

        $about_social = about_social::find($id);
        $about_social->about_ar = $request->about_ar;
        $about_social->about_en = $request->about_en;
        $about_social->facebook = $request->facebook;
        $about_social->twitter = $request->twitter;
        $about_social->google = $request->google;

        $about_social->save();
        session()->flash('success', 'Updated Successfully');
        return redirect('/about');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\about_social  $about_social
     * @return \Illuminate\Http\Response
     */
    public function destroy(about_social $about_social)
    {
        //
    }
}
