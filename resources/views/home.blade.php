@extends('layouts.product-layout')
@section('content')
	
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="blog-single.html">Shop Grid</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
		
		<!-- Product Style -->
		<section class="product-area shop-sidebar shop section">
			<div class="container">
				<div class="row">
					@include('includes.sidebar')
					<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
								<!-- Shop Top -->
								<div class="shop-top">
									<div class="shop-shorter">
										<div class="single-shorter">
											<label>Show :</label>
											<select>
												<option selected="selected">09</option>
												<option>15</option>
												<option>25</option>
												<option>30</option>
											</select>
										</div>
										<div class="single-shorter">
											<label>Sort By :</label>
											<select>
												<option selected="selected">Name</option>
												<option>Price</option>
												<option>Size</option>
											</select>
										</div>
									</div>
									<ul class="view-mode">
										<li class="active"><a href="shop-grid.html"><i class="fa fa-th-large"></i></a></li>
										<li><a href="shop-list.html"><i class="fa fa-th-list"></i></a></li>
									</ul>
								</div>
								<!--/ End Shop Top -->
							</div>
						</div>
						<div class="row">
                           

							@foreach ($products as $product)
							<div class="col-xl-3 col-lg-2 col-md-4 col-12">
								<div class="single-product">
									<div class="product-img">
										<a href="/product/{$product->id}">
											{{-- @if($product->image!='')
											{{image_crop($product->image)}}
											@endif --}}
											
											{{-- <img class="default-img" src="{{ $product->image == ' ' ? 'https://via.placeholder.com/550x750': image_crop($product->image) }}" alt="#"> --}}
											<img class="default-img" src="{{$product->image==''? 'https://via.placeholder.com/550x750':image_crop($product->image)}}">
											<img class="hover-img" src={{$product->image==''? 'https://via.placeholder.com/550x750':asset('storage/images/thumbnail/'.$product->image)}}">
										</a>
										<div class="button-head">
											<div class="product-action">
												<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
												<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
												<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
											</div>
											<div class="product-action-2">
												<a title="Add to cart" href="{{route('order')}}">Add to cart</a>
											</div>
										</div>
									</div>
									<div class="product-content">
										<h2><a href="/product">{{$product->product_name}}</a></h2>
										<div class="product-price">
											<p>{{$product->price}}</p>
										   
											<span>{{$product->category->name}}</span>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
                        <a href="/home-page" style="color:red">Back to homepage</a>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Product Style 1  -->	
@endsection