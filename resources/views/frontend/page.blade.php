@extends('layouts.app')
@section('content')
<!-- for product page responsive nav. its from product.html  -->
<!-- from shop.html  -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontends') }}/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontends') }}/styles/shop_responsive.css">


<!-- Main Navigation from product.html -->
@include('layouts.front_partial.collaps_nav')



<!-- From shop.html  -->
	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">{{ $page->page_title }}</h2>
		</div>
	</div>

<!-- Shop -->

<div class="shop">
		<div class="container">
			<div class="row">

            {!! $page->page_description !!}
				

			</div>
		</div>
	</div>
<hr>
	
@endsection