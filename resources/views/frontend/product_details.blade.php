@extends('layouts.app')
@section('content')
<!-- for product page responsive nav. its from product.html  -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontends') }}/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontends') }}/styles/product_responsive.css">

<!-- wishlink add to cart btn e design paccilo na jonne ei link add dici  -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Main Navigation from product.html -->
@include('layouts.front_partial.collaps_nav')


	 <!-- // For show all rating r ekhner product id controller theke ana jeta ei page e ace -->
	 @php
	 $review_5 = App\Models\Review::where('product_id', $product->id)->where('rating', 5)->count();
	 $review_4 = App\Models\Review::where('product_id', $product->id)->where('rating', 4)->count();
	 $review_3 = App\Models\Review::where('product_id', $product->id)->where('rating', 3)->count();
	 $review_2 = App\Models\Review::where('product_id', $product->id)->where('rating', 2)->count();
	 $review_1 = App\Models\Review::where('product_id', $product->id)->where('rating', 1)->count();

	 $sum_rating = App\Models\Review::where('product_id', $product->id)->sum('rating');
	 $count_rating = App\Models\Review::where('product_id', $product->id)->count('rating');

	@endphp


	<!-- Single Product from product.html-->

	<div class="single_product">
		<div class="container">
			<div class="row">


			<!-- json {decode incode} jar madhommer mutiple image ashbe ===============array akare colro db te ace explode {,} ace tai=========  -->
			@php
			$images = json_decode($product->images, true);

			$color = explode(',',$product->color);
			$size = explode(',',$product->size);


			
			@endphp

				<!-- Images -->
				@isset($images)
				<div class="col-lg-1 order-lg-1 order-2" >
					<ul class="image_list">
						@foreach($images as $key => $image)
						<li data-image="{{ asset('public/files/product/'.$image) }}"><img src="{{ asset('public/files/product/'.$image) }}" alt=""></li>
						@endforeach
					</ul>
				</div>
				@endisset

				<!-- Selected Image -->
				<div class="col-lg-4 order-lg-2 order-1">
					<div class="image_selected"><img src="{{ asset('public/files/product/'.$product->thumbnail) }}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-4 order-3">
					<div class="product_description">
						<div class="product_category">{{ $product->category->category_name }} > {{ $product->subcategory->subcategory_name }}</div>
						<div class="product_name" style="font-size: 20px;">{{ $product->name }}</div>

						<div class="product_category"><b> brand: {{ $product->brand->brand_name }}</b></div>
						<div class="product_category"><b> stock: {{ $product->stock_quantity }}</b></div>

						<div class="product_category"><b> Unit: {{ $product->unit }}</b></div>



						<div class="">
                <!-- // For everage show======  intval($average/5) ===============  -->
				@if($count_rating !=NULL)
                @if(intval($sum_rating/$count_rating) == 5)
			    <div class="rating_r rating_r_4 product_rating">
				    <span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
				</div>
				@elseif(intval($sum_rating/$count_rating) >= 4 && intval($sum_rating/5) < $count_rating )
			    <div class="rating_r rating_r_4 product_rating">
				    <span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span class="fa fa-star"></span>
				</div>
				@elseif(intval($sum_rating/$count_rating) >= 3 && intval($sum_rating/5) < $count_rating )
				<div class="rating_r rating_r_4 product_rating">
				    <span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
				</div>
				@elseif(intval($sum_rating/$count_rating) >= 2 && intval($sum_rating/5) < $count_rating )
				<div class="rating_r rating_r_4 product_rating">
				    <span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
				</div>
				@elseif(intval($sum_rating/$count_rating) >= 1 && intval($sum_rating/5) < $count_rating )
				<div class="rating_r rating_r_4 product_rating">
			    	<span style="color: orange;" class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
				</div>
				@endif
				@endif

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


										@isset($product->size)
										<div class="col-lg-6">

											<label for="">Pick Size</label>
											<select class="custom-select form-control-sm" style="min-width: 120px;"  name="size" >
												@foreach($size as $row)
												<option value="{{ $row }}">{{ $row }}</option>
												@endforeach
											</select>
										</div>
										@endisset


										@isset($product->color)
										<div class="col-lg-6">
										
										<label for="">Pick Color</label>
											<select  name="color" class="custom-select form-control-sm" style="min-width: 120px;">
												@foreach($color as $row)
												<option value="{{ $row }}">{{ $row }}</option>
												@endforeach
											</select>
										</div>
										@endisset


									</div>
								</div>
								<br>

								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<div class="product_quantity clearfix ml-2">
										<span>Quantity: </span>
										<input id="quantity_input" type="text" pattern="[1-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>



								</div>

								
								<div class="button_container">
									<div class="input-group mb-3">
									<div class="input-group-prepend">
										<button class="btn btn-outline-info mr-2 rounded" type="submit">Add to Cart</button>
										<a href="{{ route('add.wishlist',$product->id) }}" class="btn btn-outline-primary rounded" type="button">Add to Wishlist</a>
									</div>
									</div>
								</div>
								
							</form>
						</div>
					</div>
				</div>


				<!-- // For new another one div  -->
				<div class="col-lg-3 order-3">

				<div style="border-left: 1px solid black; height: 550px; padding:8px;" class="vl">

				<div class="product_category"><b> Pickup Point of this product</b></div>
				<div ><b>{{ $product->pickupPoint->pickup_point_name }}</b></div>
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


                @isset($product->video)
				<div ><b> Product Video:</b></div>
				<iframe width="300" height="180" src="https://www.youtube.com/embed/{{ $product->video }}">
				</iframe>
				@endisset

			
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
		<h5 class="card-header">Product details of {{ $product->name }}</h5>
		<div class="card-body">
			<p class="card-text">{{ $product->description }}</p>
		</div>
		</div>
		<br>




		<div class="card ">
		<h5 class="card-header">Rating & Review of {{ $product->name }}</h5>
		<div class="card-body">

		
		<div class="form-group">
			<div class="row">

			<div class="col-lg-3">

			<p style="color:black;">Average Review of {{ $product->name }}:</p>
					
			<!-- // For everage show======  intval($average/5) ===============  -->
			@if($count_rating !=NULL)
			@if(intval($sum_rating/$count_rating) == 5)
			    <div class="rating_r rating_r_4 product_rating">
				    <span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
				</div>
				@elseif(intval($sum_rating/$count_rating) >= 4 && intval($sum_rating/5) < $count_rating )
			    <div class="rating_r rating_r_4 product_rating">
				    <span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span class="fa fa-star"></span>
				</div>
				@elseif(intval($sum_rating/$count_rating) >= 3 && intval($sum_rating/5) < $count_rating )
				<div class="rating_r rating_r_4 product_rating">
				    <span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
				</div>
				@elseif(intval($sum_rating/$count_rating) >= 2 && intval($sum_rating/5) < $count_rating )
				<div class="rating_r rating_r_4 product_rating">
				    <span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
				</div>
				@elseif(intval($sum_rating/$count_rating) >= 1 && intval($sum_rating/5) < $count_rating )
				<div class="rating_r rating_r_4 product_rating">
			    	<span style="color: orange;" class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
				</div>
				@endif
				@endif



			</div>

			<div class="col-lg-3">

			<p style="color:black;">Total Review Of This Product:</p>
				<div class="rating_r rating_r_4 product_rating">
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<samp>Total {{ $review_5 }}</samp>

				</div>
				<div class="rating_r rating_r_4 product_rating">
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<samp>Total {{ $review_4 }}</samp>
				</div>
				<div class="rating_r rating_r_4 product_rating">
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<samp>Total {{ $review_3 }}</samp>

				</div>
				<div class="rating_r rating_r_4 product_rating">
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<samp>Total {{ $review_2 }}</samp>

				</div>
				<div class="rating_r rating_r_4 product_rating">
					<span style="color: orange;" class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<samp>Total {{ $review_1 }}</samp>

				</div>



			</div>



			<div class="col-lg-6">
				
			<form action="{{ route('store.review') }}" method="post">
				@csrf
			<label>Write Your Review</label>
			<textarea class="form-control" name="review" id="" cols="60" rows="3"></textarea>
			<br>
			<!-- for sent product id =====>  -->
			<input type="hidden" name="product_id" value="{{ $product->id }}">

			<label for="">Write Your Review</label>
			<select name="rating" class="custom-select form-control-sm" style="min-width: 120px;">
				<option disabled="" selected="" value="">Select Your Rating</option>
				<option value="1">1 star</option>
				<option value="2">2 star</option>
				<option value="3">3 star</option>
				<option value="4">4 star</option>
				<option value="5">5 star</option>

			</select>	

			<br>
			<br>

			@if(Auth::check())
			<button type="submit" class="btn btn-info">submit review</button>
			@else
			<p>Please at first login to your account for submit a review.</p>
			@endif
			</form>
			</div>

		</div>
	</div>

			<!-- For Show all reviews start -->
			<strong>All review of {{ $product->name }}</strong><hr>
		<div class="row">
			@foreach($review as $row)
			<div class="card col-lg-5 m-2">
				<div class="card-header">
				{{ $row->user->name }} (  {{ date('d F, Y'), strtotime($row->review_date) }}  )
				</div>
				<div class="card-body">
				{{ $row->review }}

				@if($row->rating == 5)
				<div class="rating_r rating_r_4 product_rating">
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
				</div>
				@elseif($row->rating == 4)
				<div class="rating_r rating_r_4 product_rating">
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span class="fa fa-star"></span>
				</div>
				@elseif($row->rating == 3)
				<div class="rating_r rating_r_4 product_rating">
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
				</div>
				@elseif($row->rating == 2)
				<div class="rating_r rating_r_4 product_rating">
					<span style="color: orange;" class="fa fa-star"></span>
					<span style="color: orange;" class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
				</div>
				@elseif($row->rating == 1)
				<div class="rating_r rating_r_4 product_rating">
					<span style="color: orange;" class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
				</div>

				@endif


				</div>
			</div>
			@endforeach

		</div>

			<!-- For Show all reviews End -->


		</div>
	</div>


			</div>
		</div>
	</div>

	<!-- // another container start end =======  -->








	<!-- Related Product -->

	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Related Product</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<div class="viewed_slider_container">
						
						<!-- Related Product Slider -->

						<div class="owl-carousel owl-theme viewed_slider">

							@foreach($related_product as $row)
							<!-- Related Product Item -->
							<div class="owl-item">
								<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="{{ asset('public/files/product/'.$row->thumbnail) }}" alt="{{ $row->name }}"></div>
									<div class="viewed_content text-center">


							            <!-- // pura website e taka or dollar convert er jonee eta Appservice provider e ace ========================> -->
										@if($row->discount_price == NULL)
										<div  class="viewed_price">{{ $setting->currency }} {{ $row->selling_price }}</div>

										@else

										<div class="viewed_price">{{ $setting->currency }} {{ $row->discount_price }}<span>{{ $setting->currency }} {{ $row->selling_price }}</span></div>

										@endif

										<!-- // take 40 carectrer from string [ $small = substr($big, 0, 100); ] -->
										<div class="viewed_name"><a href="{{ route('product.details',$row->slug) }}">{{ $small = substr($row->name, 0, 20) }}</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">new</li>
									</ul>
								</div>
							</div>
							@endforeach

							
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