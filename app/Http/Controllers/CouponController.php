<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.coupons')->with('coupons', Coupon::get());
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
            'coupon_id' => 'required',
            'end_date' => 'required',
            'offer' => 'required'
        ]);

        $Coupon = new Coupon();
        $Coupon->coupon_id = $request->coupon_id;
        $Coupon->end_date = $request->end_date;
        $Coupon->offer = $request->offer;
        
        $Coupon->save();
        session()->flash('success', 'added Successfully');

        return redirect('/coupon');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'coupon_id' => 'required',
            'end_date' => 'required',
            'offer' => 'required'
        ]);

        $Coupon = Coupon::find($id);
        $Coupon->coupon_id = $request->coupon_id;
        $Coupon->end_date = $request->end_date;
        $Coupon->offer = $request->offer;
        $Coupon->save();
        session()->flash('success', 'updated Successfully');
        return redirect('coupon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Coupon = Coupon::find($id);
        $Coupon->delete();
        session()->flash('success', 'deleted Successfully');

        return redirect('coupon');
    }
}
