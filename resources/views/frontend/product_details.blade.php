@extends('layouts.app')
@section('content')
<!-- for product page responsive nav. its from product.html  -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontends') }}/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontends') }}/styles/product_responsive.css">
<!-- Main Navigation from product.html -->
@include('layouts.front_partial.collaps_nav')


	<!-- Single Product from product.html-->

	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-1 order-lg-1 order-2" >
					<ul class="image_list">
						<li data-image="{{ asset('public/frontends') }}/images/single_4.jpg"><img src="{{ asset('public/frontends') }}/images/single_4.jpg" alt=""></li>
						<li data-image="{{ asset('public/frontends') }}/images/single_2.jpg"><img src="{{ asset('public/frontends') }}/images/single_2.jpg" alt=""></li>
						<li data-image="{{ asset('public/frontends') }}/images/single_3.jpg"><img src="{{ asset('public/frontends') }}/images/single_3.jpg" alt=""></li>
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-4 order-lg-2 order-1">
					<div class="image_selected"><img src="{{ asset('public/frontends') }}/images/single_4.jpg" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-4 order-3">
					<div class="product_description">
						<div class="product_category">{{ $product->category->category_name }} > {{ $product->subcategory->subcategory_name }}</div>
						<div class="product_name" style="font-size: 20px;">{{ $product->name }}</div>

						<div class="product_category"><b> brand: {{ $product->brand->brand_name }}</b></div>
						<div class="product_category"><b> stock: {{ $product->stock_quantity }}</b></div>


						<div class="rating_r rating_r_4 product_rating">
							<span style="color: orange;" class="fa fa-star checked"></span>
							<span style="color: orange;" class="fa fa-star checked"></span>
							<span style="color: orange;" class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
						</div>

						<!-- // pura website e taka or dollar convert er jonee eta Appservice provider e ace ========================> -->
						@if($product->discount_price == NULL)
						<div  class="product_price" style="margin-top: 25px;"></span>{{ $setting->currency }}{{ $product->selling_price }}</div>

						@else
						<div  class="product_price" style="margin-top: 25px; "><del class="text-danger">{{ $setting->currency }}{{ $product->selling_price }}</del>{{ $setting->currency }}{{ $product->discount_price }}</div>

						@endif



						<div class="order_info d-flex flex-row">
							<form action="#">

							<!-- this code is for color and size  -->
							<div class="form-group">
									<div class="row">
										<div class="col-lg-6">

											<label for="">Pick Size</label>
											<select name="size" class="form-control form-control-sm">
												<option value="">A</option>
												<option value="">B</option>
												<option value="">C</option>
											</select>
										</div>

										<div class="col-lg-6">

										<label for="">Pick Color</label>
											<select name="color" class="form-control form-control-sm">
												<option value="">A</option>
												<option value="">B</option>
												<option value="">C</option>
											</select>
										</div>

									</div>
								</div>
								<br>

								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<div class="product_quantity clearfix ml-3">
										<span>Quantity: </span>
										<input id="quantity_input" type="text" pattern="[1-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>



								</div>

								
								<div class="button_container">
									<button type="button" class="button cart_button">Add to Cart</button>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
								</div>
								
							</form>
						</div>
					</div>
				</div>


				<!-- // For new another one div  -->
				<div class="col-lg-3 order-3">

				<div style="border-left: 1px solid black; height: 550px; padding:8px;" class="vl">

				<div class="product_category"><b> Pickup Point of this product</b></div>
				<div ><b> Dhaka Motijheel Arambag</b></div>
				<hr style="width:95%;text-align:left;margin-left:0">
				<br>


				<div class="product_category"><b> Home Delivery:</b></div>
				<p style="color:black;">-> (4-8) days after the order placed. <br>-> Cash on Delivery Available.</p>
				<hr style="width:95%;text-align:left;margin-left:0">
				<br>



				<div class="product_category"><b> Product Return & Warrenty:</b></div>
				<p style="color:black;">-> 7 days return guarranty. <br>-> Warrenty not available.</p>
				<hr style="width:95%;text-align:left;margin-left:0">
				<br>



				<div ><b> Product Video:</b></div>
				<iframe width="300" height="180" src="https://www.youtube.com/embed/tgbNymZ7vqY">
				</iframe>

			
				  </div>
				</div>  
				<!-- //  -->




			</div>
		</div>
	</div>




	<!-- // another container start =======  -->
	<div class="container">
	 <div class="row">
	   <div class="col">

			<div class="card ">
		<h5 class="card-header">Product details of Iphone 15 pro max</h5>
		<div class="card-body">
			<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
		</div>
		</div>
		<br>




		<div class="card ">
		<h5 class="card-header">Product details of Iphone 15 pro max</h5>
		<div class="card-body">

		
		<div class="form-group">
			<div class="row">


			<div class="col-lg-3">

			<p style="color:black;">Average Review of Iphone 15 pro max Variation silver:</p>
			    <div class="rating_r rating_r_4 product_rating">
					<span style="color: orange;" class="fa fa-star checked"></span>
					<span style="color: orange;" class="fa fa-star checked"></span>
					<span style="color: orange;" class="fa fa-star checked"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
				</div>

			</div>



			<div class="col-lg-3">

			<p style="color:black;">Total Review Of This Product:</p>

			    <div class="rating_r rating_r_4 product_rating">
					<span style="color: orange;" class="fa fa-star checked"></span>
					<span style="color: orange;" class="fa fa-star checked"></span>
					<span style="color: orange;" class="fa fa-star checked"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<samp>Total 52</samp>

				</div>
			    <div class="rating_r rating_r_4 product_rating">
					<span style="color: orange;" class="fa fa-star checked"></span>
					<span style="color: orange;" class="fa fa-star checked"></span>
					<span style="color: orange;" class="fa fa-star checked"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<samp>Total 52</samp>
				</div>				
			    <div class="rating_r rating_r_4 product_rating">
					<span style="color: orange;" class="fa fa-star checked"></span>
					<span style="color: orange;" class="fa fa-star checked"></span>
					<span style="color: orange;" class="fa fa-star checked"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<samp>Total 52</samp>
				</div>
			    <div class="rating_r rating_r_4 product_rating">
					<span style="color: orange;" class="fa fa-star checked"></span>
					<span style="color: orange;" class="fa fa-star checked"></span>
					<span  class="fa fa-star checked"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<samp>Total 52</samp>
				</div>
			    <div class="rating_r rating_r_4 product_rating">
					<span style="color: orange;" class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<samp>Total 52</samp>
				</div>


			</div>



			<div class="col-lg-6">

			<label>Write Your Review</label>
			<textarea name="" id="" cols="60" rows="4"></textarea>

			<label for="">Write Your Review</label>
			<select name="color" class="form-control w-50">
				<option value="">Select Your Review</option>
				<option value="">B</option>
				<option value="">C</option>
			</select>	
			<br>
			
			<button type="button" class="btn btn-info">submit review</button>
			
			</div>



		</div>
	</div>


		</div>
	</div>






			</div>
		</div>
	</div>

	<!-- // another container start end =======  -->








	<!-- Recently Viewed -->

	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Recently Viewed</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<div class="viewed_slider_container">
						
						<!-- Recently Viewed Slider -->

						<div class="owl-carousel owl-theme viewed_slider">
							
							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="{{ asset('public/frontends') }}/images/view_1.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$225<span>$300</span></div>
										<div class="viewed_name"><a href="#">Beoplay H7</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="{{ asset('public/frontends') }}/images/view_2.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$379</div>
										<div class="viewed_name"><a href="#">LUNA Smartphone</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="{{ asset('public/frontends') }}/images/view_3.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$225</div>
										<div class="viewed_name"><a href="#">Samsung J730F...</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="{{ asset('public/frontends') }}/images/view_4.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$379</div>
										<div class="viewed_name"><a href="#">Huawei MediaPad...</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="{{ asset('public/frontends') }}/images/view_5.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$225<span>$300</span></div>
										<div class="viewed_name"><a href="#">Sony PS4 Slim</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="{{ asset('public/frontends') }}/images/view_6.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$375</div>
										<div class="viewed_name"><a href="#">Speedlink...</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Brands -->

	<div class="brands">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="brands_slider_container">
						
						<!-- Brands Slider -->

						<div class="owl-carousel owl-theme brands_slider">
							
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontends') }}/images/brands_1.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontends') }}/images/brands_2.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontends') }}/images/brands_3.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontends') }}/images/brands_4.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontends') }}/images/brands_5.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontends') }}/images/brands_6.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontends') }}/images/brands_7.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontends') }}/images/brands_8.jpg" alt=""></div></div>

						</div>
						
						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

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
							<div class="newsletter_icon"><img src="{{ asset('public/frontends') }}/images/send.png" alt=""></div>
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