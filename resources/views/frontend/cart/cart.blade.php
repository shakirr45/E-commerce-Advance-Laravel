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
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Shopping Cart</div>
						<div class="cart_items">
							<ul class="cart_list">
								<li class="cart_item clearfix">
									<div class="cart_item_image"><img src="{{ asset('public/frontends') }}/images/shopping_cart.jpg" alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text">MacBook Air 13</div>
										</div>
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Color</div>
											<div class="cart_item_text"><span style="background-color:#999999;"></span>Silver</div>
										</div>
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Quantity</div>
											<div class="cart_item_text">1</div>
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text">$2000</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text">$2000</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
						
						<!-- Order Total -->
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">Order Total:</div>
								<div class="order_total_amount">$2000</div>
							</div>
						</div>

						<div class="cart_buttons">
							<button type="button" class="button cart_button_clear">Add to Cart</button>
							<button type="button" class="button cart_button_checkout">Add to Cart</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


    	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="images/send.png" alt=""></div>
							<div class="newsletter_title">Sign up for Newsletter</div>
							<div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
						</div>
						<div class="newsletter_content clearfix">
							<form action="#" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
								<button class="newsletter_button">Subscribe</button>
							</form>
							<div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection