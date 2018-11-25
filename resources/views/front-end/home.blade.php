@extends('layouts.app')
@section('content')

<div class="slider">
  <div style="background-image: url('{{url('/')}}/alt_images/slider/1.jpg');background-size: cover;width: 100%;height: 100vh"></div>
  <div style="background-image: url('{{url('/')}}/alt_images/slider/2.jpg');background-size: cover;width: 100%;height: 100vh"></div>
  <div style="background-image: url('{{url('/')}}/alt_images/slider/3.jpg');background-size: cover;width: 100%;height: 100vh"></div>
</div>
			
<div class="Week container">
	<div class="container">
		<div class="row">
			<div class="text-center" style="margin: auto;">
				<h1>DEAL OF THE <span class="mainColor">WEEK</span></h1>
				<hr style="width:35%">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<img src="{{url('/')}}/alt_images/home/908.jpg" width="100%">
		</div>
		<div class="col-md-6">
			<div class="weekly-desc">
				<h2>MOBILE SAMSUNG NOTE <span class="mainColor">9</span></h2>
				<i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"> </i>
				<hr>
				<p style="color:#888">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
				<span style="color:red;font-size: 22px;">
					<b>$7440.0</b>
				</span>
				<span class="price-old">
					$8000.0
				</span>
				<br>
					


				<div class="Icons">
					 	<i class="far fa-heart  red" ></i>
						 
						 <i class="far fa-eye cartIcon"></i>
						 
						 <i class="fas fa-bars cartIcon" ></i>
						 
						 <i class="fas fa-cart-plus cartIcon"></i>
				</div>
			</div>
		</div>
	</div>
</div>




<div class="many-Details">
	<div class="container">
		<div class="row">
			<div class="col-md-4 Box">
				<span class="de-tip"><i class="fas fa-shipping-fast"></i> <b>FAST & FREE SHIPPING</b></span>
			</div>
			<div class="col-md-4 Box">
				<span class="de-tip"><i class="fas fa-gift"></i> <b>MONEY BACK GUARANTEE</b></span>
			</div>
			<div class="col-md-4">
				<span class="de-tip"><i class="far fa-question-circle"></i> <b>ONLINE HELP SUPPORT</b></span>
			</div>
		</div>
	</div>
</div>

<div class="products text-center">
	<h1>Our <span class="mainColor">Products</span></h1>
	<span style="color:#888">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua.</span>
	<hr width="20%">
	<button type="button" class="btn btn-info" data-filter="all">All</button>
	<button type="button" class="btn btn-info" data-filter=".category-a">Category A</button>
	<button type="button" class="btn btn-info" data-filter=".category-b">Category B</button>
	<button type="button" class="btn btn-info" data-filter=".category-c">Category C</button>
	<hr style="width:1%">
	<div class="container123 container">
		   <div class="row">
		   	<div class="col-lg-3 mix category-a ">
		   		<div class="image" style="background-image: url('{{url('/')}}/alt_images/home/p3 (3).jpg');width: 100%;height: 350px;background-size: cover;">
		   			<div class="Data-Off-Image">
		   				<div class="overlay"></div>
			   			<div class="detailsNav" style="text-align: right">
			   				<i class="fas fa-heart like"></i>
			   				<i class="fas fa-ellipsis-v menu"></i>
			   			</div>
			   			<div class="detailsFooter">
			   				<h5><b>Product Name</b></h5>
			   				<a href="{{url('/')}}/product" class="btn btn-outline-info">More Details</a>
			   			</div>
		   			</div>
		   		</div>
		   	</div>
			<div class="col-lg-3 mix category-a ">
		   		<div class="image" style="background-image: url('{{url('/')}}/alt_images/home/p3 (3).jpg');width: 100%;height: 350px;background-size: cover;">
		   			<div class="Data-Off-Image">
		   				<div class="overlay"></div>
			   			<div class="detailsNav" style="text-align: right">
			   				<i class="fas fa-heart like"></i>
			   				<i class="fas fa-ellipsis-v menu"></i>
			   			</div>
			   			<div class="detailsFooter">
			   				<h5><b>Product Name</b></h5>
			   				<a href="{{url('/')}}/product" class="btn btn-outline-info">More Details</a>
			   			</div>
		   			</div>
		   		</div>
		   	</div>
		   	<div class="col-lg-3 mix category-b ">
		   		<div class="image" style="background-image: url('{{url('/')}}/alt_images/home/p3 (3).jpg');width: 100%;height: 350px;background-size: cover;">
		   			<div class="Data-Off-Image">
		   				<div class="overlay"></div>
			   			<div class="detailsNav" style="text-align: right">
			   				<i class="fas fa-heart like"></i>
			   				<i class="fas fa-ellipsis-v menu"></i>
			   			</div>
			   			<div class="detailsFooter">
			   				<h5><b>Product Name</b></h5>
			   				<a href="{{url('/')}}/product" class="btn btn-outline-info">More Details</a>
			   			</div>
		   			</div>
		   		</div>
		   	</div>
		   	<div class="col-lg-3 mix category-b ">
		   		<div class="image" style="background-image: url('{{url('/')}}/alt_images/home/p3 (3).jpg');width: 100%;height: 350px;background-size: cover;">
		   			<div class="Data-Off-Image">
		   				<div class="overlay"></div>
			   			<div class="detailsNav" style="text-align: right">
			   				<i class="fas fa-heart like"></i>
			   				<i class="fas fa-ellipsis-v menu"></i>
			   			</div>
			   			<div class="detailsFooter">
			   				<h5><b>Product Name</b></h5>
			   				<a href="{{url('/')}}/product" class="btn btn-outline-info">More Details</a>
			   			</div>
		   			</div>
		   		</div>
		   	</div>
		   	<div class="col-lg-3 mix category-a ">
		   		<div class="image" style="background-image: url('{{url('/')}}/alt_images/home/p3 (3).jpg');width: 100%;height: 350px;background-size: cover;">
		   			<div class="Data-Off-Image">
		   				<div class="overlay"></div>
			   			<div class="detailsNav" style="text-align: right">
			   				<i class="fas fa-heart like"></i>
			   				<i class="fas fa-ellipsis-v menu"></i>
			   			</div>
			   			<div class="detailsFooter">
			   				<h5><b>Product Name</b></h5>
			   				<a href="{{url('/')}}/product" class="btn btn-outline-info">More Details</a>
			   			</div>
		   			</div>
		   		</div>
		   	</div>
			<div class="col-lg-3 mix category-a ">
		   		<div class="image" style="background-image: url('{{url('/')}}/alt_images/home/p3 (3).jpg');width: 100%;height: 350px;background-size: cover;">
		   			<div class="Data-Off-Image">
		   				<div class="overlay"></div>
			   			<div class="detailsNav" style="text-align: right">
			   				<i class="fas fa-heart like"></i>
			   				<i class="fas fa-ellipsis-v menu"></i>
			   			</div>
			   			<div class="detailsFooter">
			   				<h5><b>Product Name</b></h5>
			   				<a href="{{url('/')}}/product" class="btn btn-outline-info">More Details</a>
			   			</div>
		   			</div>
		   		</div>
		   	</div>
		   	<div class="col-lg-3 mix category-b ">
		   		<div class="image" style="background-image: url('{{url('/')}}/alt_images/home/p3 (3).jpg');width: 100%;height: 350px;background-size: cover;">
		   			<div class="Data-Off-Image">
		   				<div class="overlay"></div>
			   			<div class="detailsNav" style="text-align: right">
			   				<i class="fas fa-heart like"></i>
			   				<i class="fas fa-ellipsis-v menu"></i>
			   			</div>
			   			<div class="detailsFooter">
			   				<h5><b>Product Name</b></h5>
			   				<a href="{{url('/')}}/product" class="btn btn-outline-info">More Details</a>
			   			</div>
		   			</div>
		   		</div>
		   	</div>
		   	<div class="col-lg-3 mix category-b ">
		   		<div class="image" style="background-image: url('{{url('/')}}/alt_images/home/p3 (3).jpg');width: 100%;height: 350px;background-size: cover;">
		   			<div class="Data-Off-Image">
		   				<div class="overlay"></div>
			   			<div class="detailsNav" style="text-align: right">
			   				<i class="fas fa-heart like"></i>
			   				<i class="fas fa-ellipsis-v menu"></i>
			   			</div>
			   			<div class="detailsFooter">
			   				<h5><b>Product Name</b></h5>
			   				<a href="{{url('/')}}/product" class="btn btn-outline-info">More Details</a>
			   			</div>
		   			</div>
		   		</div>
		   	</div>		
		   </div>		
	</div>
</div>



  <div class="swiper-container4">
	    <div class="swiper-wrapper">
	      <div class="swiper-slide">
	      	<div class="Mockii" style="background-image: url('{{url('/')}}/alt_images/home/bckgrnd.jpeg')">
				<div class="desc">
					<h1 class="maxSize" style="color:white">IPHONE <span class="mainColor">X-MAX</span></h1>
					<p class="desc-padding" style="color:white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolor 
					</p>
				</div>
				<div class="footer-clicki">
					<a href="#" class="btn btn-outline-info">See More</a>		
				</div>
			</div>
	      </div>
	      <div class="swiper-slide">
	      	<div class="Mockii" style="background-image: url('{{url('/')}}/alt_images/home/bckgrnd1.jpeg')">
				<div class="desc">
					<h1 class="maxSize" style="color:white">SHAWMI <span class="mainColor">M-I</span></h1>
					<p class="desc-padding" style="color:white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolor 
					</p>
					
				</div>
				<div class="footer-clicki">
					<a href="#" class="btn btn-outline-info">See More</a>		
				</div>
			</div>
		</div>
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
			<h1>GET IN <span class="mainColor">TOUCH</span></h1>
			<h3>By Using this Form We Will Contact You</h3>
			<form>
				<div class="form-group">
					<label class="mainColor">
						<b>Name</b>
					</label>
					<input type="text" name="" class="form-control Input-Style2">
				</div>
				<div class="form-group">
					<label class="mainColor">
						<b>E-Mail</b>
					</label>
					<input type="email" name="" class="form-control Input-Style2">
				</div>
				<div class="form-group">
					<label class="mainColor">
						<b>Comment</b>
					</label>
					<textarea class="form-control Input-Style2" cols="6" rows="6"></textarea>
				</div>
				<div style="text-align: right;">
					<input type="submit" name="" value="Send" class="btn btn-info">
				</div>
			</form>
		</div>

	</div>
</div>


@endsection
