<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Cookie\CookieJar;
use Cookie;

class coockieController extends Controller
{
    public function wishlist($id  ,CookieJar $cookieJar,Request $request){
        $data = array($id);
        $old = $request->cookie('wishlist');
        
        if($old!=null){
            $arr_json = json_encode(array_merge($data,json_decode($old, true)));
        }else{
            $arr_json = json_encode($data, true);
        }
        $cookieJar->queue(cookie('wishlist', $arr_json, 0));

        return back();
    }

    public function deletewishlist(CookieJar $cookieJar,$id,Request $request){
        $vv = $request->cookie('wishlist');
        $vv2= json_decode($vv,true);
         //dd($vv2);
        unset($vv2[$id]);
        $foo2 = array_values($vv2); 
        $dataencoded =  json_encode($foo2);
        $cookieJar->queue(cookie('wishlist', $dataencoded, 0));


        return back();
    }



    public function add($id  ,CookieJar $cookieJar,Request $request){
    	
        	$data = array($id);
		
        $old = $request->cookie('products');
        
        if($old!=null){
            $arr_json = json_encode(array_merge($data,json_decode($old, true)));
        }else{
            $arr_json = json_encode($data, true);
        }
        $cookieJar->queue(cookie('products', $arr_json, 0));

// color
        $data3 = array($request->color);
        
        $old3 = $request->cookie('color');
        
        if($old3!=null){
            $arr_json3 = json_encode(array_merge($data3,json_decode($old3, true)));
        }else{
            $arr_json3 = json_encode($data3, true);
        }
        $cookieJar->queue(cookie('color', $arr_json3, 0));

// quantity
        $data2 = array($request->quantity);
        
        $old2 = $request->cookie('quantity');
        
        if($old2!=null){
            $arr_json2 = json_encode(array_merge($data2,json_decode($old2, true)));
        }else{
            $arr_json2 = json_encode($data2, true);
        }
        $cookieJar->queue(cookie('quantity', $arr_json2, 0));

// size
        $data4 = array($request->size);
        
        $old4 = $request->cookie('size');
        
        if($old4!=null){
            $arr_json4 = json_encode(array_merge($data4,json_decode($old4, true)));
        }else{
            $arr_json4 = json_encode($data4, true);
        }
        $cookieJar->queue(cookie('size', $arr_json4, 0));

        return back();
    }

    public function delete(CookieJar $cookieJar,$id,Request $request){
        $vv = $request->cookie('products');
        $vv2= json_decode($vv,true);
        // dd($vv2);
        unset($vv2[$id]);
        $foo2 = array_values($vv2); 
        $dataencoded =  json_encode($foo2);
        $cookieJar->queue(cookie('products', $dataencoded, 0));



        $vd = $request->cookie('quantity');
        $vd22= json_decode($vd,true);
        // dd($vv2);
        unset($vd22[$id]);
        $foo22 = array_values($vd22); 
        $dataencoded2 =  json_encode($foo22);
        $cookieJar->queue(cookie('quantity', $dataencoded2, 0));


    $sizeCookie = $request->cookie('size');
    $sizeCookieDecodeed= json_decode($sizeCookie,true);
        // dd($vv2);
    unset($sizeCookieDecodeed[$id]);
    $sizeCookieDecodeedArrayValues = array_values($sizeCookieDecodeed); 
    $sizeCookieDecodeedArrayValuesDecoded =  json_encode($sizeCookieDecodeedArrayValues);
    $cookieJar->queue(cookie('size', $sizeCookieDecodeedArrayValuesDecoded, 0));


    $colorCookie = $request->cookie('color');
    $colorCookieDecodeed= json_decode($colorCookie,true);
        // dd($vv2);
    unset($colorCookieDecodeed[$id]);
    $colorCookieDecodeedArrayValues = array_values($colorCookieDecodeed); 
    $colorCookieDecodeedArrayValuesDecoded =  json_encode($colorCookieDecodeedArrayValues);
    $cookieJar->queue(cookie('color', $colorCookieDecodeedArrayValuesDecoded, 0));

    
        return back();
    }

    public function DeleteAllCookie(CookieJar $cookieJar,Request $request){
         
        Cookie::queue(Cookie::forget('quantity'));
        Cookie::queue(Cookie::forget('products'));
        Cookie::queue(Cookie::forget('color'));
        Cookie::queue(Cookie::forget('size'));

        return redirect('cart');
    }

    public function deleteallwishlist(CookieJar $cookieJar,Request $request){
         
        Cookie::queue(Cookie::forget('wishlist'));

        return back();
    }

    

}
