@extends('layouts.app')
@section('content')
<?php $lang = session('lang'); ?>
<?php 
    $dada = request()->cookie('wishlist');
    
    $dada2 = json_decode($dada,true);
    
//	dd($dada2);
?>

<div class="mainColorbackground" style="padding: 5px;padding-top: 12px;color:white;padding-left:25px;">
	<h5>
	@if(session('lang')=='ar')
	الرئيسيه / في الانتظار
@else
Home / wish list
@endif</h5>
</div>
<div class="content">
	<div class="row">
		<div class="col-md-3"> 
			
			
			<div class="brands">
				<h5><b>
				@if(session('lang')=='ar')
				العلامات التجارية
@else
Brands
@endif</b></h5><br>
				<ul class="list-group">
					<?php $categorys = \App\category::get();?>
                @foreach($categorys as $category)
                <a href="{{url('/')}}/categories/{{$category->id}}">	
				  <li class="list-group-item">
				  	<label class="container-label"><b>
				  	
				  	{{$category->name_.$lang}}
</b>
					  
					</label>
				  </li>
		        </a>
			@endforeach
				  
				</ul>
			</div>
			<hr>
			<div class="price">
				<form action="{{url('/')}}/between_price" method="get">
					@csrf
				<h5><b>
				@if(session('lang')=='ar')
				السعر
@else
Price
@endif</b></h5>
				<div class="row">
					<div class="col-md-4">
						<input type="number" name="min" placeholder="min" min="0" class="form-control">
					</div>
					<div class="col-md-4">
						<input type="number" name="max" placeholder="max" min="0" class="form-control">
					</div>
					<div class="col-md-4">
						<input type="submit" name="submit" value="Submit" class="btn btn-block btn-outline-success">
					</div>

				</div>
				</form>
			</div>
			<hr>
			
		</div>
		<div class="col-md-9">
			<div class="sortable col-lg-9">
				<form action="{{url('/')}}/filter_price" method="get">
					@csrf
					<div class="row">
					<div class="col-lg-3">
					<label>
					@if(session('lang')=='ar')
					رتب
@else
Sort
@endif</label>
					<select class="form-control" name="sort">
						<option selected disabled>
						@if(session('lang')=='ar')
						اختر
@else
Select Sort
@endif</option>
					
						<option value="low">
						@if(session('lang')=='ar')
						الاعلي سعر
@else
From Higher Salary
@endif</option>
						<option value="high">
						@if(session('lang')=='ar')
						الاقل سعر
@else
From Lower Salary
@endif</option>
					</select>
</div>
			<div class="col-lg-3">
				<label>.</label>
									<input type="submit" name="submit" value="Submit" class="btn btn-block btn-outline-success">
			</div>
</div>
				</form>
			</div>
			<hr>
			<div class="products">
				<div class="row">
					@foreach($dada2 as $key=>$dada)
					<?php $product =  \App\products::where('id' , $dada)->first(); ?>
					<div class="col-lg-3">
				   		<div class="image" style="background-image: url('{{url('/')}}/img/alt_images/{{$product->image}}');width: 100%;height: 350px;background-size: cover;">
				   			<div class="Data-Off-Image">
				   				<div class="overlay"></div>
					   			<div class="detailsNav" style="text-align: right">

				   				<a href="{{url('/')}}/deletewishlist/{{$key}}">
					   				<i style="color:red" class="fas fa-heart like"></i> 
					   			</a>

					   				<i class="fas fa-ellipsis-v menu"></i>
					   			</div>
			<div class="detailsFooter" @if(session('lang')=='ar') style="right: 40%;left: 0;" @endif>
					   				<h5><b>
					   				
		{{$product->name_.$lang}}			   				
</b></h5>
			   						<a href="{{url('/product-front')}}/{{$product->id}}">
					   					<button class="btn btn-outline-info">More Details</button>
					   				</a>
					   			</div>
				   			</div>
				   		</div>
		   			</div>
		   			@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection