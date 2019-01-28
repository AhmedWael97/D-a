@extends('layouts.app')
@section('content')
<?php $lang = session('lang'); ?>
<style>
.colordiv{
    border-style: solid;
                border-width: 1px;
                border-color:darkgrey
}
</style>

<?php 
    $dada = request()->cookie('products');
    
    $dada2 = json_decode($dada,true);
    
    $quantity = request()->cookie('quantity');
    $quantityData = json_decode($quantity,true);

    $colorCoockie = request()->cookie('color');
    $colorCoockieData = json_decode($colorCoockie,true);
    $sizeCoockie = request()->cookie('size');
    $sizeCoockieData = json_decode($sizeCoockie,true);
    //dd($colorCoockieData);
//	dd($dada2);
    ?>
<div class="mainColorbackground" style="padding: 5px;padding-top: 12px;color:white;padding-left:25px;">
	<h4>
	@if(session('lang')=='ar')
	السله
@else
Cart
@endif</h4>
</div>
<div class="Carts container">
	<div class="row flex-row text-center">
        <div class="widget has-shadow" style="width: 100%;">
            @if($errors->all())
            <div style="color: #a94442; background-color: #f2dede; border-color: #ebccd1;" class="alert ">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            @if (session()->has('success'))

                <div class="alert alert-success alert-dissmissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    {{session('success')}}
                </div>

            @endif
        </div>
    </div>
	<div class="ifFound" style="display: ;">
		<div class="Products">
<?php 
if($dada2){
	for($i=0;$i<count($dada2);$i++){ 
		
		$product = \App\products::where('id',$dada2[$i])->first();
//dd($product);
?>
			<div class="row ProductDiv">
				<div class="col-lg-4">
					<div class="ImageCartProduct" style="background-image: 
					url('{{url('/')}}/img/alt_images/{{$product->image}}');background-size: cover;background-repeat: no-repeat;width: 100%;height: 350px;">
					</div>
				</div>
				<div class="col-lg-4 SecondProductDescription">
                    <?php $name = 'name_'.$lang; ?>
					<h4>{{$product->$name}}</h4>
					<hr>
@if($colorCoockieData[$i])
					<p>
						@if(session('lang')=='ar')
					اللون
@else
Color
@endif 
<?php //$colors = explode(",",$product->color); ?>

: <div class="black colordiv" style="background-color: {{$colorCoockieData[$i]}};"></div>

</p>
@endif

@if($sizeCoockieData[$i] !=null)
					<p>
						@if(session('lang')=='ar')
الحجم :
@else
Size :
@endif
						
						<?php //$sizes = explode(",",$product->size); ?>
					
						<span class="sizeLabel">{{$sizeCoockieData[$i]}}</span>
					
					</p>
@endif

					<p>
						@if(session('lang')=='ar')
						الكميه : 
@else
Quantity :
@endif
						
						<span class="sizeLabel">{{$quantityData[$i] == null ? '1' : $quantityData[$i]}}</span>
					
					</p>
				</div>
				<div class="col-lg-4">
					<div style="text-align: right;padding-top: 15px;">
						<a href="{{url('/')}}/deleteCart/{{$i}}"><i class="far fa-times-circle"></i></a>
					</div>
					<div style="text-align: center">
						<br>
						<br>
						<br>
		<?php
				$offerItem = $product->price*($product->offer/100);
				$RealCost = ($product->price - $offerItem);
		?>
						<span class="Salary">{{$RealCost}}$</span>
					</div>
				</div>
			</div>

<?php }}else{ ?>

<div class="IfnotFound">
		<img src="{{url('/')}}/alt_images/cart/cart.svg" width="50%" style="margin-left: auto;margin-right: auto;">
		<hr style="width: 20%">
		<h1>@if(session('lang')=='ar')
	لا يوجد بضاعه
@else
No Products 
@endif
<span class="mainColor">
@if(session('lang')=='ar')
		في السله
@else
In Cart 
@endif
</span>
</h1>
	</div>
<?php } ?>


		</div>
	</div>
</div>

<div class="container" style="padding: 26px;">
	<div id="paypal-button-container"></div>
</div>
<?php
if($dada2){
	$AllCost = 0;
    $products_in_cart = '';
    $quantitys_in_cart = '';
    $colors_in_cart = '';
    $sizes_in_cart = '';
	for($i=0;$i<count($dada2);$i++){ 
		
		$product = \App\products::where('id',$dada2[$i])->first();
        $products_in_cart .= $product->id.',';

        $quantitys_in_cart .= $quantityData[$i].',';
        $colors_in_cart .= $colorCoockieData[$i].',';
        $sizes_in_cart .= $sizeCoockieData[$i].',';



		//dd($product->offer);
		//dd($product->price);
		$offer = $product->price*($product->offer/100);
		if($quantityData[$i] != null){
			$AllCost += ($product->price - $offer)*$quantityData[$i];
		}else{
			$AllCost += ($product->price - $offer);
		}

	}
}
?>






<?php
if($dada2){
	?>
<div class="container"> 
    <div class="row">  
        <div class="col-lg-12 price">
            <form action="{{url('/')}}/cash_on_delevery" method="post">
                @csrf

            <input type="hidden" name="product_id" value="{{$products_in_cart}}">
            <input type="hidden" name="quantity" value="{{$quantitys_in_cart}}">
            <input type="hidden" name="color" value="{{$colors_in_cart}}">
            <input type="hidden" name="size" value="{{$sizes_in_cart}}">

                <h5 class="text-center">
                    <b>
                        OR
                    </b>
                </h5>
                <br>
        <div class="row">
            <div class="col-lg-2">
                <label>Have a Copon ? </label>
            </div>
            <div class="col-lg-4">
                <input type="text" name="copon" class="form-control">
            </div>
            <br><br><br>
                <div class="col-lg-4" style="margin: 1px auto;">
                    <input type="submit" name="submit" value="Submit Cash On Delevery" class="btn btn-block btn-outline-success">
                </div>
        </div>
            
            </form>
        </div>
    </div>
</div>



<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<script>

     
        paypal.Button.render({

            env: 'sandbox', // sandbox | production
style: {
                                    label: 'paypal',
                                    size:  'responsive',    // small | medium | large | responsive
                                    shape: 'rect',     // pill | rect
                                    color: 'gold',     // gold | blue | silver | black
                                    tagline: false    
                                },
            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            client: {
                sandbox:    'AQpEf1Soi6sdLGKcuBlqnKgLAX53OArXR9uzaeij2y0WOlu25v5ENnfDsrHcjRBFaVQw8DHqzTZbiNCv',
                production: 'AVeb_UjF9XvpX8dmzcTshlbETfaQCl2Ch7D88kbVAoisa6uCN_bpQBR9OKir_JBmX1sELEduUqEmXBpU'
            },

            // Show the buyer a 'Pay Now' button in the checkout flow
            commit: true,

            // payment() is called when the button is clicked
            payment: function(data, actions) {

                // Make a call to the REST api to create the payment
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: { total: {{$AllCost}}, currency: 'USD' }
                            }
                        ]
                    }
                });
                console.log(data);
            },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                actions.payment.get().then(function(payment) {
var xa={"product_id":'{{$products_in_cart}}',"payerID":data['payerID'],'email':payment['payer']['payer_info']['email']
,'first_name':payment['payer']['payer_info']['first_name']
,'city':payment['payer']['payer_info']['shipping_address']['city']
,'country_code':payment['payer']['payer_info']['shipping_address']['country_code']
,'line1':payment['payer']['payer_info']['shipping_address']['line1'],'_token': '{{csrf_token()}}'};
                    $.ajax({

                                            type: "POST",
                                            url: "storeOrders",
                                            data: xa,
                                            cache: false,
                                            success: function (result) {
                                              
                                                console.log(data);

                return actions.payment.execute().then(function() {
                    window.alert('Payment Complete!');
                });
                                                //alert('ok');
                                            },
                                            error: function(d){
                                              
                                            alert("unsuccessfull"+d.status); //will alert ok
                                            }
                                        });
    console.log(payment);
 });
                
                
                                     
                                          
                // Make a call to the REST api to execute the payment
                // return actions.payment.execute().then(function() {
                //     window.alert('Payment Complete!');
                // });
            },
            onCancel: function (data, actions) {
                                    /*
                                     * Buyer cancelled the payment
                                     */
                                    alert("the payment is canceled!");
                                    /*swal({
                                        title: "info!",
                                        text: "the payment is canceled!",
                                        type: "info"
                                    }).then(function() {
                                        // Redirect the user
                                        window.location.href = "/";
                                    });*/
                                },
                      
                                onError: function (err) {
                                    /*
                                     * An error occurred during the transaction
                                     */
                                    alert("Payment Error! Try Again"+err);
                                    /*swal({
                                        title: "Error!",
                                        text: "Payment Error! Try Again",
                                        type: "error"
                                    }).then(function() {
                                        // Redirect the user
                                        window.location.href = "/";
                                    });*/
                                }
            
            

        }, '#paypal-button-container');

    </script>
    <?php
}?>
@endsection