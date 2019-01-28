@extends('layouts.app')
@section('content')
<?php $lang = session('lang'); ?>
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<style type="text/css">
	.selected{
      	transform: translateY(1px);
		filter: saturate(150%);
 		width: 44px;
		height: 44px;
	}
	.selectedSize{
      	transform: translateY(1px);
		filter: saturate(150%);
 		width: 44px;
		height: 44px;
		background-color: black;
		color:white;
	}
	.noneSelected{
}
.colordiv{
	border-style: solid;
                border-width: 1px;
                border-color:darkgrey
}
</style>
<div class="mainColorbackground" style="padding: 5px;padding-top: 12px;color:white;padding-left:25px;">
	<h5>
	@if(session('lang')=='ar')
	الرئيسيه / المنتج
	@else
Home / Product
@endif</h5>
</div>
<div class="content container">
	<div class="row">
		<div class="col-lg-9">
			<div class="Product-Header">
				<hr>
				<div class="row padding-right-15 padding-left-15">
					<div class="col-lg-6">
						<h5><b><span class="color"></span>
							<?php $name = 'name_'.$lang ?>
						{{$product->$name}}
</b></h5>
					</div>
					<div class="col-lg-6" style="text-align:right">
						<h5 class="color"><b>{{$product->price}}</b> <i class="fas fa-dollar-sign"></i></h5>
					</div>
				</div>
				<hr>
			</div>
			<div class="ProductSlider">
				<div class="swiper-container7">
			        <div class="swiper-wrapper">
			        	@foreach($product->product_images as $image)
			            <div class="swiper-slide" style="background-image: url('{{url('/')}}/img/alt_images/{{$image->image_slider}}');background-size: cover;width: 100%;height: 4vh;">
			            	<img src="">
			            </div>
			            @endforeach
			            
			        </div>
			        <!-- Add Pagination -->
			        <div class="swiper-pagination"></div>
			    </div>
			</div>
			<div class="rating">
				<b>
				@if(session('lang')=='ar')
				النجوم
@else
Rate
@endif</b> : 
				<span style="margin-top: -1px">
					@for($i=0;$i<$product->rate;$i++)
					<i class="fas fa-star"></i>
					@endfor
				</span>
			</div>
			
			<div class="discount">
				<span><b>
				@if(session('lang')=='ar')
				خصم
@else
Sale
@endif</b> :</span>
				<span class="green"><b>{{$product->offer}}%</b></span>
			</div>
			<?php
$offer = $product->price*($product->offer/100);
		$AllCost = ($product->price - $offer);
		?>
			<div class="discount">
				<span><b>
				@if(session('lang')=='ar')
				السعر بعد الخصم
@else
Price After Sale
@endif</b> :</span>
				<span class="green"><b>{{$AllCost}}$</b></span>
			</div>

			<div class="tags">
				<?php $ta = 'tags_'.$lang ?>
				<?php $tags = explode(",",$product->$ta); ?>

				

@foreach($tags as $tag)
				<span class="tag">{{$tag}}</span>
				@endforeach
				
			</div>
		</div>
		<div class="col-lg-3">
			<hr>
			<div class="description">
					<p><b>
					@if(session('lang')=='ar')
					الوصف
@else
Description
@endif</b></p>
					<span>
						<?php $desc = 'description_'.$lang ?>
						{{$product->$desc}}
						
					</span>
				<hr>
			</div>
			
			
<form name=frmMr action="{{url('/')}}/addCart/{{$product->id}}" method="post">
	@csrf
	<input type="hidden" name="color" id="color" value="">
	<input type="hidden" name="size" id="size" value="">

	<div class="description">
					<p><b>
					@if(session('lang')=='ar')
					اللون
@else
color
@endif</b></p>
					<span>
<?php $colors = explode(",",$product->color); ?>
@foreach($colors as $color)
						<div  onclick="changecolor('{{$color}}',this)" class="btn black noneSelected colordiv" style="background-color: {{$color}};"></div>
@endforeach
					</span>
				<hr>
			</div>


			<div class="description">
					<p><b>
					@if(session('lang')=='ar')
					المقاس
@else
Size
@endif</b></p>
					<?php $sizes = explode(",",$product->size); ?>
					@foreach($sizes as $size)
					<span style="cursor: pointer" onclick="changesize('{{$size}}',this)" class="sizeLabel"> {{$size}} </span>
					@endforeach
				<hr>
			</div>


						<div class="form-group">
							<label>
							@if(session('lang')=='ar')
							الكميه
@else
Quntity
@endif</label>
							<div class="input-group mb-3">
							  <input required id="quantity" name="quantity" type="number" class="form-control Input-Style3" min="1" aria-describedby="button-addon2">
							  <div class="input-group-append">
							    <button class="btn btn-outline-secondary" id="button-addon20-form">
							    	<i class="fas fa-sort-numeric-up"></i>
							    </button>
							  </div>
							</div>
						</div>
					
			<div class="description">
					<p><b>
					@if(session('lang')=='ar')
					اضافه في السله
@else
Add To Cart
@endif</b></p>
					<div onClick="checkform();" class="btn btn-success btn-block"><i class="fab fa-opencart"></i>></div>
				<hr>
			</div>
</form>

		</div>
	</div>
	<div class="similar">
		<div class="text-center">
			<h1> @if(session('lang')=='ar')
				المنتجات المتشابهه
@else
SIMILAR PRODUCTS
@endif</h1>
		<hr width="20%">
		<br>
		</div>

	  <div class="swiper-container10">
	    	<div class="swiper-wrapper">
	    		<?php $products =  \App\products::take(10)->get(); ?>
	@foreach($products as $product)
	<a href="{{url('/')}}/product-front/{{$product->id}}">
	      <div class="swiper-slide" style="margin:6px;background-image:url('{{url('/')}}/img/alt_images/{{$product->image}}');background-size: cover;width: 250px; height: 250px;"></div>
      </a>
	      
    		<div class="swiper-pagination"></div>

	@endforeach
  		</div>
	</div>
</div>


<script>
	function changecolor(color,elem) {
		//alert(color);
        document.getElementById("color").value= color;
        
	        // get all 'a' elements
	    var a = document.getElementsByTagName('div');
	    // loop through all 'a' elements
	    for (i = 0; i < a.length; i++) {
	        // Remove the class 'active' if it exists
	        a[i].classList.remove('selected')
	    }
	        elem.classList.add('selected');
	}

	function changesize(size,elem) {
		//alert(color);
        document.getElementById("size").value= size;
        
	        // get all 'a' elements
	    var a = document.getElementsByTagName('span');
	    // loop through all 'a' elements
	    for (i = 0; i < a.length; i++) {
	        // Remove the class 'active' if it exists
	        a[i].classList.remove('selectedSize')
	    }
	        elem.classList.add('selectedSize');
	}

	function checkform() {
		var color =	document.getElementById("color").value
		var quantity =	document.getElementById("quantity").value
		var size =	document.getElementById("size").value
	    if(color == "") {
	        alert("Please Choose Color");
	        return false;
	    }else if(quantity == ""){
	    	alert("Please Choose quantity");
	        return false;
	    }else if(size == ""){
	    	alert("Please Choose size");
	        return false;
	    }else {
	        document.frmMr.submit();
	    }
	}

</script>
@endsection