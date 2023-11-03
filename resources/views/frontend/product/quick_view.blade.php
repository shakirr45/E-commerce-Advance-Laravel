		
	<!-- json {decode incode} jar madhommer mutiple image ashbe ===============array akare colro db te ace explode {,} ace tai=========  -->
	@php

	$color = explode(',',$product->color);
	$size = explode(',',$product->size);

	@endphp


		
		<div class="modal-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-4">
						<div class="">
						<img src="{{ asset('public/files/product/'.$product->thumbnail) }}"
                       class="img-fluid" alt="">
						</div>
					</div>

					<div class="col-lg-8">
						<h3>{{ $product->name }}</h3>
						<p>{{ $product->category->category_name }} > {{ $product->subcategory->subcategory_name }}</p>
						<p>Brand: {{ $product->brand->brand_name }}</p>
						<p>Stock: @if($product->stock_quantity < 1 ) <span class="badge badge-danger"> Stock Out </span> @else <span class="badge badge-success"> Stock Available </span>  @endif </p>

						<div class="">
						 <!-- // pura website e taka or dollar convert er jonee eta Appservice provider e ace ========================> -->
						  @if($product->discount_price == NULL)
						<div  class="product_price">Price: </span>{{ $setting->currency }}{{ $product->selling_price }}</div>

						@else
						<div  class="product_price">Price: <del class="text-danger">{{ $setting->currency }}{{ $product->selling_price }}  </del>{{ $setting->currency }}{{ $product->discount_price }}</div>

						@endif
						</div><br>
						<div class="order_info d-flex flex-row">
							<form action="">
								<div class="form-group">
									<div class="row">

										@isset($product->size)
										<div class="col-lg-5">
											<label class="ml-2">Size:</label>
											<select class="custom-select form-control-sm" name="size" style="min-width:120px; margin-left:-4px;">
											@foreach($size as $size)
											<option value="{{ $size }}">{{ $size }}</option>
											@endforeach
										</select>
										</div>
										@endisset

										@isset($product->color)
										<div class="col-lg-5">
											<label class="ml-2">Color:</label>
											<select class="custom-select form-control-sm" name="color" style="min-width:120px;">
											@foreach($color as $color)
											<option value="{{ $color }}">{{ $color }}</option>
											@endforeach
										</select>
										</div>
										@endisset


									</div>
								</div>
								
								<div class="button_container">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											@if($product->stock_quantity < 1)
											<span class="text-danger">Stock Out</span>
											@else
											<button class="btn btn-outline-info" type="submit">Add to cart</button>
											@endif
										</div>
									</div>
								</div>


							</form>
						</div>
						</div>

				</div>
			</div>
		</div>