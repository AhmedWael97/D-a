<?php

namespace App\Http\Controllers;

use App\Orders;
use App\order_products;
use Auth;
use Illuminate\Http\Request;
use Cookie;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.orders')->with('Orders', Orders::get());
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
        
        $Orders = new Orders();
        $Orders->name = $request->first_name;
        $Orders->email = $request->email;
        $Orders->address = 'city '. $request->city . ' country code '. $request->country_code
        . ' line '. $request->line1;
        $Orders->type = 1;
        $Orders->statuse = 'pendding';

        //$Orders->product_id =rtrim($request->product_id,",");
        $Orders->save();
        //session()->flash('success', 'added Successfully');


        $produsct_ids =rtrim($request->product_id,",");
        $orders_products = explode(",",$produsct_ids);
        foreach($orders_products as $products_orders_id){

            $order_products = new order_products();
            $order_products->product_id = $products_orders_id;
            $order_products->order_id = $Orders->id;
            $order_products->save();
        }

        return response(array('msg' => 'Successfull'), 200);
    }

    

    public function cash_on_delevery(Request $request)
    {
        
        $Orders = new Orders();
        $Orders->name = Auth::user()->name;
        $Orders->email = Auth::user()->email;
        $Orders->address = Auth::user()->address;
        $Orders->phone = Auth::user()->phone;
        $Orders->type = 0;
        $Orders->statuse = 'pendding';
        //$Orders->product_id =rtrim($request->product_id,",");
        $Orders->save();

        $produsct_ids =rtrim($request->product_id,",");
        $quantitys =rtrim($request->quantity,",");
        $colors =rtrim($request->color,",");
        $sizes =rtrim($request->size,",");


        $orders_products = explode(",",$produsct_ids);
        $orders_quantitys = explode(",",$quantitys);
        $orders_colors = explode(",",$colors);
        $orders_sizes = explode(",",$sizes);
        foreach($orders_products as $key=>$products_orders_id){

            $order_products = new order_products();
            $order_products->product_id = $products_orders_id;
            $order_products->order_id = $Orders->id;
            $order_products->quantity = $orders_quantitys[$key];
            $order_products->color = $orders_colors[$key];
            $order_products->size = $orders_sizes[$key];
            $order_products->save();
        }
        //session()->flash('success', 'added Successfully');
        Cookie::queue(Cookie::forget('quantity'));
        Cookie::queue(Cookie::forget('products'));
        Cookie::queue(Cookie::forget('color'));
        Cookie::queue(Cookie::forget('size'));
        session()->flash('success', 'Order Submitted Successfully');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Orders = Orders::find($id);
        $Orders->delete();
        session()->flash('success', 'deleted Successfully');

        return redirect('Orders');
    }

    public function updatestatuse(Request $request, $id)
    {
                $Orders = Orders::where('id' , $id)->first();
                $Orders->statuse = $request->statuse;
                $Orders->save();
                session()->flash('success', 'updated Successfully');

                return redirect('Orders');

    }
}
