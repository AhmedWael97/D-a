<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use App\category;
use App\settings_home_slider;
use App\about_social;
use App\deal;
use App\OfferSection;
use Response;
use App\Orders;
use App\order_products;
use Illuminate\Support\Facades\Hash;

use App\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth; 
class apiController extends Controller
{
    public function getProducts()
    {
        $product = products::with('product_images')->get();
        if ($product) {
            return Response::json($product);
        } else {
            return Response::json(null, ' we not found products', 404);

        }
    }

    public function getCategories()
    {
        $category = category::get();
        if ($category) {
            return Response::json($category);
        } else {
            return Response::json(null, ' we not found products', 404);

        }
    }
    public function getSliders()
    {
        $settings_home_slider = settings_home_slider::get();
        if ($settings_home_slider) {
            return Response::json($settings_home_slider);
        } else {
            return Response::json(null, ' we not found products', 404);

        }
    }

    public function getSocial()
    {
        $about_social = about_social::get();
        if ($about_social) {
            return Response::json($about_social);
        } else {
            return Response::json(null, ' we not found products', 404);
        }
    }

    public function getDeal()
    {
        $deal = deal::with('products')->get();
        if ($deal) {
            return Response::json($deal);
        } else {
            return Response::json(null, ' we not found products', 404);
        }
    }

    public function getOffer()
    {
        $OfferSection = OfferSection::with('products')->get();
        if ($OfferSection) {
            return Response::json($OfferSection);
        } else {
            return Response::json(null, ' we not found products', 404);
        }
    }


    public function pay_api(Request $request)
    {
        $Orders = new Orders();
        $User = User::find($request['id'])->first();
        
        $Orders->name = $User->name;
        $Orders->email = $User->email;
        $Orders->address = $User->address;
        $Orders->type = $request['paymentType'];
        $Orders->statuse = 'pendding';
        
        $Orders->save();
        
        $pro = '';
        $Rcolors='';
        $Rsizes='';
        $Rquntity='';
        foreach($request['products'] as $product){
           $pro  .= $product['id'] .',';
           $Rcolors .= $product['requestColors'].',';
           $Rsizes .= $product['requestSizes'].',';
           $Rquntity .= $product['quntity'].',';
        }
        
        $produsct_ids =rtrim($pro,",");
        $quantitys =rtrim($Rquntity,",");
        $colors =rtrim($Rcolors,",");
        $sizes =rtrim($Rsizes,",");
        
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
        
        
        if ($order_products) {
            return Response::json($order_products);
        } else {
            return Response::json(null, ' we not found products', 404);
        }
        
        
        //session()->flash('success', 'added Successfully');

        return response(array('msg' => 'Successfull'), 200);
    }


    public function login(){

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
        
        $user = Auth::user();
        
        //$success['token'] = $user->createToken('MyApp')->accessToken;
        
        return response()->json($user->id, 200);
        
        }
        
        else{
        
        return response()->json(['error'=>'Unauthorised'], 401);
        
        }

    }

    public function sign_up(){
            $validator = Validator::make(request()->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'address' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
            ]);
            
            if ($validator->fails()) {
                return response()->json($validator->errors());
            }
            
            $User = new User();
            $User->name = request('name');
            $User->email = request('email');
            $User->password = Hash::make(request('password'));
            $User->address = request('address');
            $User->phone = request('phone');
            $User->save();
            if($User->save()){
                return response()->json($User->id, 200);
            }else{
                return response()->json(['error'=>'Error'], 401);
            }
    }
    

}
