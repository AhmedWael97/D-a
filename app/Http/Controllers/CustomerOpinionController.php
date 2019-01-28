<?php

namespace App\Http\Controllers;

use App\CustomerOpinion;
use Illuminate\Http\Request;

class CustomerOpinionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.customerOpinion')->with('CustomerOpinions', CustomerOpinion::get());
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
            'opinion_ar' => 'required',
            
        ]);

        $CustomerOpinion = new CustomerOpinion();
        $CustomerOpinion->opinion_ar = $request->opinion_ar;
        $CustomerOpinion->opinion_en = $request->opinion_en;
        
        $CustomerOpinion->save();
        session()->flash('success', 'added Successfully');

        return redirect('/CustomerOpinion');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CustomerOpinion  $customerOpinion
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerOpinion $customerOpinion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerOpinion  $customerOpinion
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerOpinion $customerOpinion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomerOpinion  $customerOpinion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'opinion_ar' => 'required',
            
        ]);

        $CustomerOpinion = CustomerOpinion::find($id);
        $CustomerOpinion->opinion_ar = $request->opinion_ar;
        $CustomerOpinion->opinion_en = $request->opinion_en;

        $CustomerOpinion->save();
        session()->flash('success', 'Updated Successfully');

        return redirect('/CustomerOpinion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomerOpinion  $customerOpinion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $CustomerOpinion = CustomerOpinion::find($id);
        $CustomerOpinion->delete();
                session()->flash('success', 'deleted Successfully');

        return redirect('CustomerOpinion');
    }
}
