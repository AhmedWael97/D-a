@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script>
<div class="container">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="{{url('/')}}/">
	  	<img src="{{url('/')}}/alt_images/logo/logo.png" width="100px">
	  </a>
	  <div class="collapse navbar-collapse" id="navbarText">
	    <ul class="navbar-nav mr-auto">
	    	
	    </ul>
	    <span class="navbar-text">
	    	<form class="form-inline">
			    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			  </form>
	      <span style="margin-left:3px;letter-spacing: 1px;">Get Special 27% Discount On Items</span>
	    </span>
	  </div>
	</nav>
</div>
<div class="main-nav">
	<nav class="navbar navbar-expand-lg navbar-light" id="MainNav">
	  <div class="container">
	  	<div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Departments
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Department 1</a>
		          <a class="dropdown-item" href="#">Department 2</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="#">Department 3</a>
		          <a class="dropdown-item" href="#">Department 4</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="#">Department 5</a>
		          <a class="dropdown-item" href="#">Department 6</a>
		        </div>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">HOME</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">CONTACT</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">AFFILIATE</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">SPECIAL</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">SITE MAP</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">OFFERS</a>
		      </li>
		    </ul>
		  </div>
	  </div>
	</nav>
</div>
<div class="clear-fix"></div>
<div class="container padding-top-15">
	<div class="row">
		<div class="col-lg-6">
			<h1>
				Contents
			</h1>
			<form>
				<div class="form-group">
					<label>
						Normal
					</label>
					<input type="text" name="name" class="form-control Input-Style1">
				</div>
				<div class="form-group">
					<label>
						Border raduis
					</label>
					<input type="password" name="name" class="form-control Input-Style2">
				</div>
				<div class="input-group mb-3">
				  <input type="text" class="form-control Input-Style3" placeholder="Password" aria-label="Password" aria-describedby="button-addon2">
				  <div class="input-group-append">
				    <button class="btn btn-outline-secondary" type="button" id="button-addon2-form">
				    	<i class="fas fa-eye"></i>
				    </button>
				  </div>
				</div>
				<div class="form-group">
					 <br>
					 <input type="text" name="disabled" placeholder="Read Only" class="form-control" disabled>
				</div>
				<div class="form-group">
					<br>
					 <input type="text" name="disabled" placeholder="Input with help text." class="form-control">
					 <span class="small-alert">Input with help text.</span>
				</div>
				<div class="form-group">
					<br>
					<label class="container-label"><b>CHECK BOX 1</b>
					  <input type="checkbox" >
					  <span class="checkmark"></span>
					</label>
				</div>
				<div class="form-group">
					<br>
					<label class="container-label"><b>CHECKED BOX 1</b>
					  <input type="checkbox" checked="checked" >
					  <span class="checkmark"></span>
					</label>
				</div>
				<div class="form-group">
					<br>
					<label class="container-label"><b>Disabled You Can not</b>
					  <input type="checkbox" disabled >
					  <span class="checkmark"></span>
					</label>
				</div>
				

				<div class="form-group">
					<br>
					<label><b>RADIO BUTTONS</b></label>
					<br>
					<label class="container-label"> <b>One</b>
			   		 	 <input type="radio"  name="radio">
					     <span class="Rcheckmark"></span>
					</label>
				</div>

				<div class="form-group">
					<label class="container-label"> <b>TWO</b>
			   		 	 <input type="radio"  name="radio">
					     <span class="Rcheckmark"></span>
					</label>
				</div>

				<div class="form-group">
					<br>

					<select class="selectStyle form-control">
						<option selected disabled>
							Seleceted
						</option>
						<option>
							another option
						</option>
					</select>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
