<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\products;
use App\TrackViewProducts;
class SearchController extends Controller
{
    public function category($id){
    	$products = products::where('category_id' , $id)->get();
    	return view('front-end/categories')->with(
    		[
				'products' => $products,
    		]
    	);
    }

    public function product($id){
    	$product = products::where('id' , $id)->first();

        $TrackViewProducts = TrackViewProducts::where([
            'ip' => $_SERVER['REMOTE_ADDR'],
            'date' => date("Y-m-d"),
            'product_id' => $id
        ])->first();

    if($TrackViewProducts == null){

        $TrackViewProducts = new TrackViewProducts();
        $TrackViewProducts->ip = $_SERVER['REMOTE_ADDR'];
        $TrackViewProducts->date = date("Y-m-d");
        $TrackViewProducts->product_id = $id;
        $TrackViewProducts->save();

    }
    	return view('front-end/product')->with(
    		[
				'product' => $product,
    		]
    	);
    }

    public function filter_price(Request $request)
    {
        if($request->sort == 'low'){
            $products = products::orderBy('price', 'desc')->get();
        }else{
            $products = products::orderBy('price')->get();
        }
        return view('front-end/categories')->with(
            [
                'products' => $products,
            ]
        );
    }

    public function between_price(Request $request)
    {
        
            $products = products::whereBetween('price', [$request->min, $request->max])->get();
       
        return view('front-end/categories')->with(
            [
                'products' => $products,
            ]
        );
    }

    public function search_product(Request $request)
    {
        
            $products = products::where('name_ar', 'like', '%' . $request->search . '%')->get();
       
        return view('front-end/categories')->with(
            [
                'products' => $products,
            ]
        );
    }


    

}
