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
			<h2 class="home_title">Order Tracking</h2>
		</div>
	</div>

<!-- Shop -->

<div class="shop">
<div class="container">
    <div class="row justify-content-center">

    <div class="col-md-4">

       <div class="card">
       <div class="card-body mt-2">
                        Name: {{ $order->c_name }} <br>
                        Phone: {{ $order->c_phone }} <br>
                        Order ID: {{ $order->order_id }} <br>

                        Status:         
                        @if($order->status == 0)
                        <span class="badge badge-danger">Order Pending</span>
                        @elseif($order->status == 1)
                        <span class="badge badge-info">Order Recieved</span>
                        @elseif($row->status == 2)
                        <span class="badge badge-primary">Order Shipped</span>
                        @elseif($order->status == 3)
                        <span class="badge badge-success">Order Done</span>
                        @elseif($order->status == 4)
                        <span class="badge badge-warning">Order return</span>
                        @elseif($order->status == 5)
                        <span class="badge badge-danger">Order Cancel</span>
                        @endif
                        <br>

                        Date: {{ date('d F Y'),strtotime($order->date) }} <br>
                        Subtotal: {{ $order->subtotal }} {{ $setting->currency }} <br>
                        Total: {{ $order->total }} {{ $setting->currency }} <br>
                    </div>

       </div>

    </div>


        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('My Order') }}
                </div>


                <div class="card-body">

                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Subtotal</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach($order_details as $key=>$row)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $row->product_name }}</td>
                                    <td>{{ $row->color }}</td>
                                    <td>{{ $row->size }}</td>
                                    <td>{{ $row->quantity }}</td>
                                    <td>{{ $row->single_price }} {{ $setting->currency }}</td>
                                    <td>{{ $row->subtotal_price }} {{ $setting->currency }}</td>


                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>





                </div>
            </div>
        </div>
    </div>
</div>
	</div>
<hr>
	
@endsection