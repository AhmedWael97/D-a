<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use App\User;
use App\order_products;
use ConsoleTVs\Charts\Facades\Charts;
use DB;
use App\Orders;
use App\TrackViewProducts;
class ChartController extends Controller
{
	public function index(){
		$products  = products::get();
		
		$nameOfProduct = [];
		$sizeOfSale = [];
		$sizeOfView = [];
		foreach($products as $key => $product){
			array_push($nameOfProduct , $product->name_ar);
			$order_products  = order_products::where('product_id',$product->id)->count();
			array_push($sizeOfSale , $order_products);

		$TrackViewProducts  = TrackViewProducts::where('product_id',$product->id)->count();
			array_push($sizeOfView , $TrackViewProducts);

		}
		//dd($nameOfProduct);
		$chart = Charts::create('bar', 'highcharts')
				->title('Sales Analysis')
				->labels($nameOfProduct)
				->values($sizeOfSale)
				->dimensions(1000,500)
				->responsive(true);

		$chartSizeOfView = Charts::create('area', 'highcharts')
				->title('Views Of Products')
				->labels($nameOfProduct)
				->values($sizeOfView)
				->dimensions(1000,500)
				->responsive(true);

		$users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
					->get();

        $userschart = Charts::database($users, 'area', 'highcharts')
			      ->title("Monthly new Register Users")
			      ->elementLabel("Total Users")
			      ->dimensions(1000, 500)
			      ->responsive(false)
			      ->groupByMonth(date('Y'), true);

			      // orders 

      $Orders = Orders::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
    				->get();
	    $Orderschart = Charts::database($Orders, 'bar', 'highcharts')
			      ->title("Monthly Number of Orders")
			      ->elementLabel("Orders")
			      ->dimensions(1000, 500)
			      ->responsive(false)
			      ->groupByMonth(date('Y'), true);


			
		return view('dashboard.pages.charts',compact('chart','userschart','Orderschart','chartSizeOfView'));
	}    
}
