@extends('layouts.app')
@section('content')
<!-- for product page responsive nav. its from product.html 
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontends') }}/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontends') }}/styles/product_responsive.css">
 -->

<!-- From cart.html for get style =====  -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontends') }}/styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontends') }}/styles/cart_responsive.css">
<!-- Main Navigation from product.html -->
@include('layouts.front_partial.collaps_nav')


 <!-- Its from cart.html  -->
 	<!-- Cart -->

     <div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="cart_container card p-1">
						<div class="cart_title text-center p-2">Billing Address </div>

						<div class="cart_items">
							<!-- id for ajax  -->
                        <form action="{{ route('order.place') }}" method="post" id="order-place">
							@csrf 
                        
                        <div class="row p-4">

                        <div class="form-group col-lg-6">
                            <label for="">Customer Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="c_name" value="{{ Auth::user()->name }}" required="">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="">Customer Phone <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="c_phone" value="{{ Auth::user()->phone }}"  required="">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="">Country <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="c_country" required="" >
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="">Shipping Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="c_address" required="" >
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="">Email Address</label>
                            <input type="email" class="form-control" name="c_email">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="">Zip Code</label>
                            <input type="text" class="form-control" name="c_zipcode" required="" >
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="">City Name</label>
                            <input type="text" class="form-control" name="c_city" required="" >
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="">Extra Phone</label>
                            <input type="text" class="form-control" name="c_extra_phone" required="" >
                        </div>

                        <br><br>

                       
                                <div class="form-group col-lg-4">
                                    <label for="">Paypal</label>
                                    <input type="radio" name="payment_type" value="Paypal">
                                </div>

                                <div class="form-group col-lg-4">
                                    <label for=""> Bkash/Rocket/Nagad (SSL Commerze)</label>
                                    <input type="radio" name="payment_type"  checked="" value="Aamarpay" >
                                </div>

                                <div class="form-group col-lg-4">
                                    <label for="">Hand Cash</label>
                                    <input type="radio" name="payment_type" value="Hand Cash">
                                </div>


                        </div>
                        <div class="form-group p-4">
                            <button type="submit" class="btn btn-info p-2">Order Place</button>
                        </div>
						<span class="visually-hidden pl-2 d-none">Progressing....</span>



                         </form>
						</div>
					</div>
				</div>

                <div class="col-lg-4">
                  
                <div class="card">

                    <div class="p-4">

                    <p style="color: black;">Subtotal: <span style="float: right; padding-right:5px;">{{ Cart::subtotal() }} {{ $setting->currency }}</span></p>

					<!-- Coupon Apply  -->
					<!-- session er kaj controller e kora ace  -->
					@if(Session::has('coupon'))

                    <p style="color: black;">Copun: ({{ Session::get('coupon')['name'] }})   <a href="{{ route('coupon.remove') }}" class="text-danger">X</a><span style="float: right; padding-right:5px;">{{ Session::get('coupon')['discount'] }} {{ $setting->currency }}</span> </p>
					@else

					@endif
                    <p style="color: black;">Tax: <span style="float: right; padding-right:5px;"> 0.00 %</span></p>
                    <p style="color: black;">Shipping: <span style="float: right; padding-right:5px;">  0.00 {{ $setting->currency }}</span> </p>

					@if(Session::has('coupon'))

                    <p style="color: black;"><b>Total: <span style="float: right; padding-right:5px;"> {{ Session::get('coupon')['after_discount'] }} {{ $setting->currency }}</span></b> </p>
					@else
                    <p style="color: black;"><b>Total: <span style="float: right; padding-right:5px;"> {{ Cart::total() }} {{ $setting->currency }}</span></b> </p>

					@endif



                        </div><hr>

						<!-- session er kaj controller e kora ace  -->
						@if(!Session::has('coupon'))
						<form action="{{ route('apply.coupon') }}" method="post">
							@csrf
                        
                        <div class="p-4">

                        <div class="form-group">
                            <label for="">Coupon Apply</label>
                            <input type="text" class="form-control" name="coupon" required="" placeholder="Coupon Code" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Apply Coupon</button>
                        </div>
                        </div>
                    </form>
					@endif
                </div>

						<!-- <div class="cart_buttons">
							<a href="{{ route('checkout') }}" class="button cart_button_checkout">Payment Now</a>
						</div> -->
                </div>
			</div>
		</div>
	</div>


    


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <!-- Remove product from cart with ajax ====== -->
<script>
  $('body').on('click','#removeProduct', function(){
		let id = $(this).data('id');
		// alert(id);

		$.ajax({
			url: '{{ url('cartproduct/remove/') }}/'+id,
			type: 'get',
			async: false,
			success:function(data){
				toastr.success(data);
				location.reload();

			}
		});

	});

	// for quantity ====> location.reload(); na krle id chg e prob hote pre
	$('body').on('blur','.qty', function(){
		let qty = $(this).val();
		let rowId = $(this).data('id');
		// alert(qty);
		// alert(rowId);
		$.ajax({
			url: '{{ url('cartproduct/updateqty/') }}/'+rowId+'/'+qty,
			type: 'get',
			async: false,
			success:function(data){
				toastr.success(data);
				location.reload();

			}
		});

	});

		// for color ====>  location.reload(); na krle id chg e prob hote pre
		$('body').on('change','.color', function(){
		let color = $(this).val();
		let rowId = $(this).data('id');
		// alert(color);
		// alert(rowId);
		$.ajax({
			url: '{{ url('cartproduct/updatecolor/') }}/'+rowId+'/'+color,
			type: 'get',
			async: false,
			success:function(data){
				toastr.success(data);
				location.reload();
			}
		});

	});

		// for size ====> location.reload(); na krle id chg e prob hote pre
		$('body').on('change','.size', function(){
		let size = $(this).val();
		let rowId = $(this).data('id');
		// alert(size);
		// alert(rowId);
		$.ajax({
			url: '{{ url('cartproduct/updatesize/') }}/'+rowId+'/'+size,
			type: 'get',
			async: false,
			success:function(data){
				toastr.success(data);
				location.reload();
			}
		});

	});
	</script>
@endsection

