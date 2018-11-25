@extends('layouts.app')
@section('content')

<div class="mainColorbackground" style="padding: 5px;padding-top: 12px;color:white;padding-left:25px;">
	<h4>Cart</h4>
</div>
<div class="Carts container">
	<div class="IfnotFound" style="display: none;">
		<img src="{{url('/')}}/alt_images/cart/cart.svg" width="50%" style="margin-left: auto;margin-right: auto;">
		<hr style="width: 20%">
		<h1>No Products <span class="mainColor">In Cart</span></h1>
	</div>
	<div class="ifFound" style="display: ;">
		<div class="Products">
			<div class="row ProductDiv">
				<div class="col-lg-4">
					<div class="ImageCartProduct" style="background-image: 
					url('{{url('/')}}/alt_images/products/p3 (1).jpg');background-size: cover;background-repeat: no-repeat;width: 100%;height: 350px;">
					</div>
				</div>
				<div class="col-lg-4 SecondProductDescription">
					<h4>PRODUCT NAME</h4>
					<hr>
					<form>
						<div class="form-group">
							<label>Quntity</label>
							<div class="input-group mb-3">
							  <input type="numbers" class="form-control Input-Style3" placeholder="Quntity" min="1" aria-describedby="button-addon2">
							  <div class="input-group-append">
							    <button class="btn btn-outline-secondary" type="submit" id="button-addon20-form">
							    	<i class="fas fa-sort-numeric-up"></i>
							    </button>
							  </div>
							</div>
						</div>
					</form>
					<small>Write The Numbers Using Keyboard</small>
					<hr>
					<p>
						Color : <div class="black" style="background-color: orange;"></div></p>
					<p>Size :
						<span class="sizeLabel"> M </span>
					</p>
				</div>
				<div class="col-lg-4">
					<div style="text-align: right;padding-top: 15px;">
						<a href="#"><i class="far fa-times-circle"></i></a>
					</div>
					<div style="text-align: center">
						<br>
						<br>
						<br>
						<span class="Salary">220$</span>
					</div>
				</div>
			</div>
			<div class="row ProductDiv">
				<div class="col-lg-4">
					<div class="ImageCartProduct" style="background-image: 
					url('{{url('/')}}/alt_images/products/p3 (1).jpg');background-size: cover;background-repeat: no-repeat;width: 100%;height: 350px;">
					</div>
				</div>
				<div class="col-lg-4 SecondProductDescription">
					<h4>PRODUCT NAME</h4>
					<hr>
					<form>
						<div class="form-group">
							<label>Quntity</label>
							<div class="input-group mb-3">
							  <input type="numbers" class="form-control Input-Style3" placeholder="Quntity" min="1" aria-describedby="button-addon2">
							  <div class="input-group-append">
							    <button class="btn btn-outline-secondary" type="submit" id="button-addon20-form">
							    	<i class="fas fa-sort-numeric-up"></i>
							    </button>
							  </div>
							</div>
						</div>
					</form>
					<small>Write The Numbers Using Keyboard</small>
					<hr>
					<p>
						Color : <div class="black" style="background-color: orange;"></div></p>
					<p>Size :
						<span class="sizeLabel"> M </span>
					</p>
				</div>
				<div class="col-lg-4">
					<div style="text-align: right;padding-top: 15px;">
						<a href="#"><i class="far fa-times-circle"></i></a>
					</div>
					<div style="text-align: center">
						<br>
						<br>
						<br>
						<span class="Salary">220$</span>
					</div>
				</div>
			</div>
			<div class="row ProductDiv">
				<div class="col-lg-4">
					<div class="ImageCartProduct" style="background-image: 
					url('{{url('/')}}/alt_images/products/p3 (1).jpg');background-size: cover;background-repeat: no-repeat;width: 100%;height: 350px;">
					</div>
				</div>
				<div class="col-lg-4 SecondProductDescription">
					<h4>PRODUCT NAME</h4>
					<hr>
					<form>
						<div class="form-group">
							<label>Quntity</label>
							<div class="input-group mb-3">
							  <input type="numbers" class="form-control Input-Style3" placeholder="Quntity" min="1" aria-describedby="button-addon2">
							  <div class="input-group-append">
							    <button class="btn btn-outline-secondary" type="submit" id="button-addon20-form">
							    	<i class="fas fa-sort-numeric-up"></i>
							    </button>
							  </div>
							</div>
						</div>
					</form>
					<small>Write The Numbers Using Keyboard</small>
					<hr>
					<p>
						Color : <div class="black" style="background-color: orange;"></div></p>
					<p>Size :
						<span class="sizeLabel"> M </span>
					</p>
				</div>
				<div class="col-lg-4">
					<div style="text-align: right;padding-top: 15px;">
						<a href="#"><i class="far fa-times-circle"></i></a>
					</div>
					<div style="text-align: center">
						<br>
						<br>
						<br>
						<span class="Salary">220$</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection