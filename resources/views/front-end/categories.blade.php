@extends('layouts.app')
@section('content')
<div class="mainColorbackground" style="padding: 5px;padding-top: 12px;color:white;padding-left:25px;">
	<h5>Home / Categories</h5>
</div>
<div class="content">
	<div class="row">
		<div class="col-md-3"> 
			<div class="filters">
				<h5><b>Refine by</b></h5>				
				<div class="filter">
					Category 1 <i class="fas fa-times" style="font-size:12px;margin-left: 2px;"></i>
				</div>
				<div class="filter">
					Category 2 <i class="fas fa-times" style="font-size:12px;margin-left: 2px;margin-bottom:5px"></i>
				</div>
				<div class="filter">
					Category 2 <i class="fas fa-times" style="font-size:12px;margin-left: 2px;"></i>
				</div>
				<div class="filter">
					Category 2 <i class="fas fa-times" style="font-size:12px;margin-left: 2px;"></i>
				</div>
				<div class="filter">
					Category 2 <i class="fas fa-times" style="font-size:12px;margin-left: 2px;"></i>
				</div>
			</div>
			<div style="text-align: right;cursor: pointer;">
				<span><i class="fas fa-eraser" style="cursor: pointer"></i> Delete All</span>
			</div>
			<hr>
			<div class="brands">
				<h5><b>Brand</b></h5><br>
				<ul class="list-group">
				  <li class="list-group-item">
				  	<label class="container-label"><b>Category 1</b>
					  <input type="checkbox" checked="checked">
					  <span class="checkmark"></span>
					</label>
				  </li>
				  <li class="list-group-item">
				  	<label class="container-label"><b>Category 2</b>
					  <input type="checkbox" >
					  <span class="checkmark"></span>
					</label>
				  </li>
				  <li class="list-group-item">
				  	<label class="container-label"><b>Category 3</b>
					  <input type="checkbox" >
					  <span class="checkmark"></span>
					</label>
				  </li>
				  <li class="list-group-item">
				  	<label class="container-label"><b>Category 4</b>
					  <input type="checkbox" >
					  <span class="checkmark"></span>
					</label>
				  </li>
				  <li class="list-group-item">
				  	<label class="container-label"><b>Category 5</b>
					  <input type="checkbox">
					  <span class="checkmark"></span>
					</label>
				  </li>
				 
				</ul>
			</div>
			<hr>
			<div class="price">
				<h5><b>Price</b></h5>
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
			</div>
			<hr>
			<div class="brands">
				<h5><b>Others</b></h5>
				<ul class="list-group">
				  <li class="list-group-item">
				  	<label class="container-label"><b>Best Seller</b>
					  <input type="checkbox" checked="checked">
					  <span class="checkmark"></span>
					</label>
				  </li>
				  <li class="list-group-item">
				  	<label class="container-label"><b>Is Featured</b>
					  <input type="checkbox" >
					  <span class="checkmark"></span>
					</label>
				  </li>
				  <li class="list-group-item">
				  	<label class="container-label"><b>In Strock</b>
					  <input type="checkbox" >
					  <span class="checkmark"></span>
					</label>
				  </li>
				  
				 
				</ul>
			</div>
		</div>
		<div class="col-md-9">
			<div class="sortable col-lg-3">
				<form>
					<label>Sort</label>
					<select class="form-control" name="sort">
						<option selected disabled>Select Sort</option>
						<option>A to Z</option>
						<option>From Higher Salary</option>
						<option>From Lower Salary</option>
					</select>
				</form>
			</div>
			<hr>
			<div class="products">
				<div class="row">
					<div class="col-lg-3">
				   		<div class="image" style="background-image: url('{{url('/')}}/alt_images/home/p3 (3).jpg');width: 100%;height: 350px;background-size: cover;">
				   			<div class="Data-Off-Image">
				   				<div class="overlay"></div>
					   			<div class="detailsNav" style="text-align: right">
					   				<i class="fas fa-heart like"></i>
					   				<i class="fas fa-ellipsis-v menu"></i>
					   			</div>
					   			<div class="detailsFooter">
					   				<h5><b>Product Name</b></h5>
					   				<button class="btn btn-outline-info">More Details</button>
					   			</div>
				   			</div>
				   		</div>
		   			</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection