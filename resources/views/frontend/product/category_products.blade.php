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
			<h2 class="home_title">Smartphones & Tablets</h2>
		</div>
	</div>

<!-- Shop -->

<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
								<li><a href="#">Computers & Laptops</a></li>
								<li><a href="#">Cameras & Photos</a></li>
								<li><a href="#">Hardware</a></li>
								<li><a href="#">Smartphones & Tablets</a></li>
								<li><a href="#">TV & Audio</a></li>
								<li><a href="#">Gadgets</a></li>
								<li><a href="#">Car Electronics</a></li>
								<li><a href="#">Video Games & Consoles</a></li>
								<li><a href="#">Accessories</a></li>
							</ul>
						</div>
						<div class="sidebar_section filter_by_section">
							<div class="sidebar_title">Filter By</div>
							<div class="sidebar_subtitle">Price</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range"></div>
								<p>Range: </p>
								<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							</div>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle color_subtitle">Color</div>
							<ul class="colors_list">
								<li class="color"><a href="#" style="background: #b19c83;"></a></li>
								<li class="color"><a href="#" style="background: #000000;"></a></li>
								<li class="color"><a href="#" style="background: #999999;"></a></li>
								<li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
								<li class="color"><a href="#" style="background: #df3b3b;"></a></li>
								<li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
							</ul>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Brands</div>
							<ul class="brands_list">
								<li class="brand"><a href="#">Apple</a></li>
								<li class="brand"><a href="#">Beoplay</a></li>
								<li class="brand"><a href="#">Google</a></li>
								<li class="brand"><a href="#">Meizu</a></li>
								<li class="brand"><a href="#">OnePlus</a></li>
								<li class="brand"><a href="#">Samsung</a></li>
								<li class="brand"><a href="#">Sony</a></li>
								<li class="brand"><a href="#">Xiaomi</a></li>
							</ul>
						</div>
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span>{{ count($products) }}</span> products found</div>
							<div class="shop_sorting">
								<span>Sort by:</span>
								<ul>
									<li>
										<span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
										<ul>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
											<li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>

						<div class="product_grid row ml-2">
							<div class="product_grid_border"></div>

                            @foreach($products as $row)
							<!-- Product Item -->
							<div class="product_item is_new col-lg-2">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('public/files/product/'.$row->thumbnail) }}" alt=""></div>
								<div class="product_content ">


									@if($row->discount_price == Null)
									<div class="product_price">
										{{ $setting->currency }}{{ $row->selling_price }}
										</div>
										@else
										<div class="product_price">
										{{ $setting->currency }}{{ $row->discount_price }}
										<del class="text-danger">{{ $setting->currency }}{{ $row->selling_price }}</del></div>
										@endif



									<div class="product_name"><div><a href="{{ route('product.details',$row->slug) }}" tabindex="0">{{ $row->name }}</a></div></div>
								</div>
                                <a href="{{ route('add.wishlist',$row->id) }}">
								<div class="product_fav"><i class="fas fa-heart"></i></div>
                            </a>
								<ul class="product_marks">
									<li class="product_mark product_new quickview"  data-toggle="modal" data-target="#quickview" id="{{ $row->id }}"><i class="fas fa-eye"></i></li>
								</ul>
							</div>
                            @endforeach

							
                            


						</div>

						<!-- Shop Page Navigation -->

						<div class="shop_page_nav d-flex flex-row">
							<div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
							<ul class="page_nav d-flex flex-row">

                            <!-- For Pagination  -->
                                {{ $products->links() }}



							</ul>
							<div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>

    <!--======================= Quickview Modal ========================= -->

 <div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

	  <div class="modal-body" id="quick_view_body">


	  </div>
   </div>
  </div>
</div>



<!-- From shop.html  -->
<script src="{{ asset('public/frontends') }}/js/shop_custom.js"></script>



<!-- quickview ajax app er vetor csrf tokn pass kora ace =========== -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- quickview ajax app er vetor csrf tokn pass kora ace =========== -->
<script>
    $(document).on('click', '.quickview', function(){
      var id = $(this).attr('id');
    //   alert(id);
      $.ajax({
        url: "{{ url("/product-quick-view/") }}/"+id,
        type: 'get',
        success:function(data){
			$("#quick_view_body").html(data);
        }

      });
    });
  </script>
@endsection