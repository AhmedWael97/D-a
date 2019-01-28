<?php

namespace App\Http\Controllers;

use App\inbox;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.inbox')->with(
            [
                'inbox'=> inbox::get(),
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
        
        $inbox = new inbox();

        $inbox->name = $request->name;
        $inbox->email = $request->email;
        $inbox->message = $request->message;
        
        $inbox->save();
        session()->flash('success', 'added Successfully');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function edit(inbox $inbox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, inbox $inbox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inbox = inbox::where('id',$id)->delete();
        return redirect('/inbox');
    }
}
