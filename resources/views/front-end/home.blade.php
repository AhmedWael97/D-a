@extends('layouts.app')
@section('content')
<?php $lang = session('lang'); ?>
<?php 
    $dada = request()->cookie('wishlist');
    
    $dada2 = json_decode($dada,true);
    
	//dd($dada2);
?>

<style type="text/css">
 	@if(session('lang')=='ar')
 	.detailsFooter{
			  right: 40%;
			  left: 0;
		  }
  	@endif
</style>
<div class="slider" style="    direction: ltr;">
	<?php $sliders =  \App\settings_home_slider::get(); ?>
	@foreach($sliders as $slider)
  <div style="background-image: url('{{url('/')}}/img/alt_images/{{$slider->image_slider}}');background-size: cover;width: 100%;height: 100vh"></div>
  @endforeach
  
</div>
			
<div class="Week container">
	<?php $deal= \App\deal::first();  ?>
	<div class="container">
		<div class="row">
			<div class="text-center" style="margin: auto;">
				<h1>
					@if($deal)
					@if(session('lang')=='ar')
					العرض
@else
DEAL OF THE 
@endif<span class="mainColor">
<?php $title = 'title_'.$lang; ?>
{{$deal->$title}}

</span>@endif</h1>
				<hr style="width:35%">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			@if($deal)
			<img src="{{url('/')}}/img/alt_images/{{$deal->image}}" width="100%">
			@endif
		</div>
		<div class="col-md-6">
			<div class="weekly-desc">
				@if($deal)
				<h2>
					<?php $name='name_'.$lang; ?>
					{{$deal->products->$name}}
					
				</h2>
				@for($i=0;$i<$deal->products->rate;$i++)
					<i class="fas fa-star"></i>
					@endfor
				<hr>
				<p style="color:#888">
					<?php $desc='description_'.$lang ?>
					{{$deal->products->$desc}}
					
				</p>
				<?php 
						$price = $deal->products->price;
						$offer = $deal->products->offer;
						$offerCost = $price*($offer/100);
						$cost = $price - $offerCost;
				 ?>
				<span style="color:red;font-size: 22px;">
					<b>{{$cost}}$</b>
				</span>
				<span class="price-old">
					{{$price}}
				</span>
				<br>
					


				<div class="Icons">
					 	<i class="far fa-heart  red" ></i>
						 
						 <a href="{{url('/')}}/product-front/{{$deal->products->id}}"><i class="far fa-eye cartIcon"></i></a>
						 
						<a href="{{url('/')}}/addCart/{{$deal->products->id}}"> <i class="fas fa-cart-plus cartIcon"></i></a>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>




<div class="many-Details">
	<div class="container">
		<div class="row">
			<div class="col-md-4 Box">
				<span class="de-tip"><i class="fas fa-shipping-fast"></i> <b>@if(session('lang')=='ar')
				سريع وشحن مجاني
@else
 FAST & FREE SHIPPING
@endif</b></span>
			</div>
			<div class="col-md-4 Box">
				<span class="de-tip"><i class="fas fa-gift"></i> <b>

				@if(session('lang')=='ar')
				ضمان استعادة الاموال
@else
MONEY BACK GUARANTEE
@endif</b></span>
			</div>
			<div class="col-md-4">
				<span class="de-tip"><i class="far fa-question-circle"></i> <b>
				
				@if(session('lang')=='ar')
				الدعم الفني
@else
ONLINE HELP SUPPORT
@endif
			</b></span>
			</div>
		</div>
	</div>
</div>

<div class="products text-center">
@if(session('lang')=='ar')
	<h1><span class="mainColor">منتجاتنا</span></h1>
@else
	<h1>Our <span class="mainColor">Products</span></h1>
	@endif


	<hr width="20%">
	<button type="button" class="btn btn-info" data-filter="all">@if(session('lang')=='ar')
		الكل
@else
All
@endif</button>
	<?php $categories =  \App\category::get(); ?>
	@foreach($categories as $category)
	<button type="button" class="btn btn-info" data-filter=".category-{{$category->id}}">
		<?php $name = 'name_'.$lang; ?>
			{{$category->$name}}
		
		
	</button>
	@endforeach
	<hr style="width:1%">
	<div class="container123 container">
		   <div class="row">
   	<?php $products =  \App\products::get(); ?>
	@foreach($products as $product)
		   	<div class="col-lg-3 mix category-{{$product->category_id}}">
		   		<div class="image" style="background-image: url('{{url('/')}}/img/alt_images/{{$product->image}}');width: 100%;height: 350px;background-size: cover;">
		   			<div class="Data-Off-Image">
		   				<div class="overlay"></div>
			   			<div class="detailsNav" style="text-align: right">
			   				

@if($dada2)

	@if(in_array($product->id, $dada2))
	<?php //dd(array_search($product->id, $dada2)); ?>
	<?php $index = array_search($product->id, $dada2) ?>
		@if($dada2[$index] == $product->id)
					   				<a href="{{url('/')}}/deletewishlist/{{$index}}">
						   				<i style="color:red" class="fas fa-heart like"></i> 
						   			</a>
		@else
				<a href="{{url('/')}}/wishlist/{{$product->id}}">
					<i class="fas fa-heart like"></i> 
				</a>
		@endif

	@else

						   			<a href="{{url('/')}}/wishlist/{{$product->id}}">
						   				<i class="fas fa-heart like"></i> 
						   			</a>
	@endif
@else
									<a href="{{url('/')}}/wishlist/{{$product->id}}">
										<i class="fas fa-heart like"></i> 
									</a>
@endif



			   				<i class="fas fa-ellipsis-v menu"></i>
			   			</div>
			   			<div class="detailsFooter">
			   				<h5><b>
			   					<?php $name='name_'.$lang ?>
			   					{{$product->$name}}
			   					
			   				</b></h5>
			   				<a href="{{url('/')}}/product-front/{{$product->id}}" class="btn btn-outline-info">More Details</a>
			   			</div>
		   			</div>
		   		</div>
		   	</div>
	@endforeach
					
		   </div>		
	</div>
</div>



  <div class="swiper-container4">
	    <div class="swiper-wrapper">

	   <?php 	$OfferSections=\App\OfferSection::get(); ?>
	   @foreach($OfferSections as $OfferSection)
	      <div class="swiper-slide">
	      	<div class="Mockii" style="background-image: url('{{url('/')}}/img/alt_images/{{$OfferSection->image}}')">
				<div class="desc">
					<h1 class="maxSize" style="color:white">
						<?php $name = 'name_'.$lang; ?>
						{{$OfferSection->products->$name}}
					
					</h1>
					<br>
					<br>
					<p class="desc-padding" style="color:white">
					<?php $desc='description_'.$lang ?>
						{{$OfferSection->products->$desc}}
					
					</p>
				</div>
				<div class="footer-clicki">
					<a href="{{url('/')}}/product-front/{{$OfferSection->product_id}}" class="btn btn-outline-info">
					@if(session('lang')=='ar')
المزيد
@else
See More
@endif</a>		
				</div>
			</div>
	      </div>
	      @endforeach
	      
	    </div>
    
  </div>
  <div class="clear-fix">
  	
  </div>
<div class="contact-us">
	<div class="row">
		<div class="col-lg-6">
			<img src="{{url('/')}}/alt_images/home/undraw_email_campaign_qa8y.svg" width="100%">
		</div>
		<div class="col-lg-4">
			<h1>
				 
				@if(session('lang')=='ar')
تواصل
@else
GET IN
@endif
				<span class="mainColor">@if(session('lang')=='ar')
معنا
@else
TOUCH
@endif</span></h1>
			<h3>
			@if(session('lang')=='ar')
باستخدام هذا النموذج سوف نتواصل معك
@else
By Using this Form We Will Contact You
@endif</h3>
			<form action="{{url('/')}}/inbox"  method="post">
				@csrf
				<div class="form-group">
					<label class="mainColor">
						<b>@if(session('lang')=='ar')
الاسم
@else
Name
@endif</b>
					</label>
					<input type="text" name="name" class="form-control Input-Style2">
				</div>
				<div class="form-group">
					<label class="mainColor">
						<b>
						@if(session('lang')=='ar')
الايميل
@else
E-Mail
@endif</b>
					</label>
					<input type="email" name="email" class="form-control Input-Style2">
				</div>
				<div class="form-group">
					<label class="mainColor">
						<b>
						@if(session('lang')=='ar')
الرساله
@else
Comment
@endif</b>
					</label>
					<textarea name="message" class="form-control Input-Style2" cols="6" rows="6"></textarea>
				</div>
				<div style="text-align: right;">
					<input type="submit" name="" value="Send" class="btn btn-info">
				</div>
			</form>
		</div>

	</div>
</div>


@endsection
