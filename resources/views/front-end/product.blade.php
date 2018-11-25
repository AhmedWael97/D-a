@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<style type="text/css">
	.swiper-pagination-bullet-active {
    opacity: 1;
    background: #3498db;
}
</style>
<div class="mainColorbackground" style="padding: 5px;padding-top: 12px;color:white;padding-left:25px;">
	<h5>Home / Product</h5>
</div>
<div class="content container">
	<div class="row">
		<div class="col-lg-9">
			<div class="Product-Header">
				<hr>
				<div class="row padding-right-15 padding-left-15">
					<div class="col-lg-6">
						<h5><b><span class="color">Product </span>Name</b></h5>
					</div>
					<div class="col-lg-6" style="text-align:right">
						<h5 class="color"><b>199</b> <i class="fas fa-dollar-sign"></i></h5>
					</div>
				</div>
				<hr>
			</div>
			<div class="ProductSlider">
				<div class="swiper-container7">
			        <div class="swiper-wrapper">
			            <div class="swiper-slide">Slide 1</div>
			            <div class="swiper-slide">Slide 2</div>
			            <div class="swiper-slide">Slide 3</div>
			            <div class="swiper-slide">Slide 4</div>
			            <div class="swiper-slide">Slide 5</div>
			            <div class="swiper-slide">Slide 6</div>
			            <div class="swiper-slide">Slide 7</div>
			            <div class="swiper-slide">Slide 8</div>
			            <div class="swiper-slide">Slide 9</div>
			            <div class="swiper-slide">Slide 10</div>
			        </div>
			        <!-- Add Pagination -->
			        <div class="swiper-pagination"></div>
			    </div>
			</div>
			<div class="rating">
				<b>Rate</b> : 
				<span style="margin-top: -1px">
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star-half-alt"></i>
				</span>
			</div>
			<div class="discount">
				<span><b>Sale</b> :</span>
				<span class="green"><b>15 %</b></span>
			</div>
			<div class="tags">
				<span class="tag">Lorem</span>
				<span class="tag">ipusm</span>
				<span class="tag">special</span>
				<span class="tag">long text here</span>
			</div>
		</div>
		<div class="col-lg-3">
			<hr>
			<div class="description">
					<p><b>Description</b></p>
					<span>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					</span>
				<hr>
			</div>
			<div class="description">
					<p><b>color</b></p>
					<span>
						<div class="black" style="background-color: black;"></div>
						<div class="black" style="background-color: orange;"></div>
						<div class="black" style="background-color: yellow;"></div>
						<div class="black" style="background-color: red;"></div>
						<div class="black" style="background-color: gray;"></div>
						<div class="black" style="background-color: green;"></div>
					</span>
				<hr>
			</div>
			<div class="description">
					<p><b>Size</b></p>
					<span class="sizeLabel"> S </span>
					<span class="sizeLabel"> M </span>
					<span class="sizeLabel"> L </span>
					<span class="sizeLabel"> XL </span>
				<hr>
			</div>

			<div class="description">
					<p><b>Add To Cart</b></p>
					<a href="#" class="btn btn-success btn-block"><i class="fab fa-opencart"></i></a>				
				<hr>
			</div>
		</div>
	</div>
	<div class="similar">
		<div class="text-center">
			<span style="color:#888">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</span>
			<h1>SIMILAR <span class="color">PRODUCTS</span></h1>
		<hr width="20%">
		<br>
		</div>
	  <div class="swiper-container10">
	    	<div class="swiper-wrapper">
	      <div class="swiper-slide" style="background-image:url('{{url('/')}}/alt_images/home/mobile.png');background-size: cover;width: 250px; height: 250px;"></div>
	      <div class="swiper-slide" style="background-image:url('{{url('/')}}/alt_images/home/mobile.png');background-size: cover;width: 250px; height: 250px;"></div>
	       <div class="swiper-slide" style="background-image:url('{{url('/')}}/alt_images/home/mobile.png');background-size: cover;width: 250px; height: 250px;"></div>
	        <div class="swiper-slide" style="background-image:url('{{url('/')}}/alt_images/home/mobile.png');background-size: cover;width: 250px; height: 250px;"></div>
	         <div class="swiper-slide" style="background-image:url('{{url('/')}}/alt_images/home/mobile.png');background-size: cover;width: 250px; height: 250px;"></div>
	          <div class="swiper-slide" style="background-image:url('{{url('/')}}/alt_images/home/mobile.png');background-size: cover;width: 250px; height: 250px;"></div>
	           <div class="swiper-slide" style="background-image:url('{{url('/')}}/alt_images/home/mobile.png');background-size: cover;width: 250px; height: 250px;"></div>
    		<div class="swiper-pagination"></div>
  		</div>
	</div>
</div>
@endsection