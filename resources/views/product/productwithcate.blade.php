@extends('layout.master')

@section('title')
	 {{ $category_by_id->c_name }} | LoShip
@endsection


@section('content')

<!-- category-banner area start -->
		<div class="category-banner">
			<div class="bend niceties preview-2">
				<div id="ensign-nivoslider" class="slides" style="height: 270px">	
					<img src="uploads/home/banner/cate1.png" alt="" title="#slider-direction-1"  />
					<img src="uploads/home/banner/cate2.png" alt="" title="#slider-direction-2"  />
					<img src="uploads/home/banner/cate3.png" alt="" title="#slider-direction-3"  />
					<img src="uploads/home/banner/cate4.png" alt="" title="#slider-direction-4"  />
					<img src="uploads/home/banner/cate5.png" alt="" title="#slider-direction-5"  />
					<img src="uploads/home/banner/cate6.png" alt="" title="#slider-direction-6"  />	
				</div>
			</div>
		</div>
		<!-- category-banner area end -->
		<!-- breadcrumbs area start -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="container-inner">
							<ul>
								<li class="home">
									<a href="{{ route('home.index')}}">Trang Chủ</a>
									<span><i class="fa fa-angle-right"></i></span>
								</li>
								<li class="category3"><span>
									 {{ $category_by_id->c_name }}
								</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- shop-with-sidebar Start -->
		<div class="shop-with-sidebar">
			<div class="container">
				<div class="row">
					<!-- left sidebar start -->
					<div class="col-md-3 col-sm-12 col-xs-12 text-left">
						<div class="topbar-left">
							<aside class="widge-topbar">
								<div class="bar-title">
									<div class="bar-ping"><img src="images/bar-ping.png" alt=""></div>
									<h2>Tất cả sản phẩm</h2>
								</div>
							</aside>
							<aside class="sidebar-content">
								<div class="sidebar-title">
									<h6>Danh mục sản phẩm</h6>
								</div>
								<ul class="sidebar-tags">
									@if(isset($categories))
									@foreach($categories as $value)
										<li><a href="#">{{ $value->c_name}}</a><span> (14)</span></li>
									@endforeach
									@endif
								</ul>
							</aside>
							<aside class="sidebar-content">
								<div class="sidebar-title">
									<h6>Availability</h6>
								</div>
								<ul>
									<li><a href="#">Not available</a><span> (1)</span></li>
									<li><a href="#">In stock</a><span> (2)</span></li>
								</ul>
							</aside>
							<aside class="topbarr-category sidebar-content">
								<div class="tpbr-title sidebar-title col-md-12 nopadding">
									<h6>Lọc sản phẩm theo giá</h6>
								</div>
								<div class="tpbr-menu col-md-12 nopadding">
									<!-- shop-filter start -->
									<div class="price-bar">
										<div class="info_widget">
											<div class="price_filter">
												<div id="slider-range"></div>
												<div class="price_slider_amount">
													<input type="submit" class="filter-price" value="Filter"/>
													<div class="filter-ranger">
														<h6>Giá :</h6>
														<input type="text" id="amount" name="price" placeholder="Add Your Price" />
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- shop-filter end -->
								</div>
							</aside>
							<aside class="hd-gg sidebar-content">
								<div class="sidebar-title">
									<h6>Size</h6>
								</div>
								<ul>
									<li><a href="#">S</a><span> (18)</span></li>
									<li><a href="#">M</a><span> (24)</span></li>
									<li><a href="#">L</a><span> (21)</span></li>
								</ul>
							</aside>
							<aside class="sidebar-content">
								<div class="sidebar-title">
									<h6>Color</h6>
								</div>
								<ul>
									<li><a href="#">Beige</a><span> (1)</span></li>
									<li><a href="#">White</a><span> (2)</span></li>
									<li><a href="#">Orange</a><span> (2)</span></li>
									<li><a href="#">Black</a><span> (2)</span></li>
									<li><a href="#">Blue</a><span> (2)</span></li>
									<li><a href="#">Green</a><span> (2)</span></li>
									<li><a href="#">Yellow</a><span> (2)</span></li>
									<li><a href="#">Pink</a><span> (2)</span></li>
								</ul>
							</aside>
							<aside class="sidebar-content">
								<div class="sidebar-title">
									<h6>Composition</h6>
								</div>
								<ul>
									<li><a href="#">Cotton</a><span> (3)</span></li>
									<li><a href="#">Polyester</a><span> (9)</span></li>
									<li><a href="#">Viscose</a><span> (9)</span></li>
								</ul>
							</aside>
							<aside class="sidebar-content">
								<div class="sidebar-title">
									<h6>Styles</h6>
								</div>
								<ul>
									<li><a href="#">Casual</a><span> (1)</span></li>
									<li><a href="#">Dressy</a><span> (2)</span></li>
									<li><a href="#">Girly</a><span> (2)</span></li>
								</ul>
							</aside>
							<aside class="sidebar-content">
								<div class="sidebar-title">
									<h6>Properties</h6>
								</div>
								<ul>
									<li><a href="#">Colorful Dress</a><span> (1)</span></li>
									<li><a href="#">Maxi Dress</a><span> (2)</span></li>
									<li><a href="#">Midi Dress</a><span> (2)</span></li>
									<li><a href="#">Short Dress</a><span> (2)</span></li>
									<li><a href="#">Short Sleeve</a><span> (2)</span></li>
								</ul>
							</aside>		
							<aside class="widge-topbar">
								<div class="bar-title">
									<div class="bar-ping"><img src="images/bar-ping.png" alt=""></div>
									<h2>Tags</h2>
								</div>
								<div class="exp-tags">
									<div class="tags">
										<a href="#">camera</a>
										<a href="#">mobile</a>
										<a href="#">electronic</a>
										<a href="#">destop</a>
										<a href="#">tablet</a>
										<a href="#">accessories</a>
										<a href="#">camcorder</a>
										<a href="#">laptop</a>
									</div>
								</div>
							</aside>
						</div>
					</div>
					<!-- left sidebar end -->
					<!-- right sidebar start -->
					<div class="col-md-9 col-sm-12 col-xs-12">
						<!-- shop toolbar start -->
						<div class="shop-content-area">
							<div class="shop-toolbar">
								<div class="col-md-4 col-sm-4 col-xs-12 nopadding-left text-left">
									<form class="tree-most" method="get">
										<div class="orderby-wrapper">
											<label>Lọc theo</label>
											<select name="orderby" class="orderby">
												<option value="menu_order" selected="selected">Default sorting</option>
												<option value="popularity">Sort by popularity</option>
												<option value="rating">Sort by average rating</option>
												<option value="date">Sort by newness</option>
												<option value="price">Sort by price: low to high</option>
												<option value="price-desc">Sort by price: high to low</option>
											</select>
										</div>
									</form>
								</div>
								<div class="col-md-4 col-sm-4 none-xs text-center">
									<div class="limiter hidden-xs">
										<label>Show</label>
										<select>
											<option selected="selected" value="">9</option>
											<option value="">12</option>
											<option value="">24</option>
											<option value="">36</option>
										</select>
										per page        
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12 nopadding-right text-right">
									<div class="view-mode">
										<label>View on</label>
										<ul>
											<li class="active"><a href="#shop-grid-tab" data-toggle="tab"><i class="fa fa-th"></i></a></li>
											<li class=""><a href="#shop-list-tab" data-toggle="tab" ><i class="fa fa-th-list"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- shop toolbar end -->
						<!-- product-row start -->
						<div class="tab-content">
							<div class="tab-pane fade in active" id="shop-grid-tab">
								<div class="row">
									<div class="shop-product-tab first-sale">

										@foreach($products as $value)
											<div class="col-lg-4 col-md-4 col-sm-4">
												<div class="two-product">
													<!-- single-product start -->
													<div class="single-product">
														<span class="sale-text">Giảm 10%</span>
														<div class="product-img">
															<a href="{{ route('product-details', $value->id)}}">
																<img class="primary-image" src="{{ pare_url_file($value['avatar']) }}" alt="" style="width: 270px; height: 330px" />
																<img class="secondary-image" src="{{ pare_url_file($value['avatar']) }}" alt="" style="width: 270px; height: 330px" />
															</a>
															<div class="action-zoom">
																<div class="add-to-cart">
																	<a href="{{ route('product-details', $value->id)}}" title="Xem Chi Tiết"><i class="fa fa-search-plus"></i></a>
																</div>
															</div>
															<div class="actions">
																<div class="action-buttons">
																	<div class="add-to-links">
																		<div class="add-to-wishlist">
																			<a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
																		</div>
																		<div class="compare-button">
																			<a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
																		</div>									
																	</div>
																	<div class="quickviewbtn">
																		<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
																	</div>
																</div>
															</div>
															<div class="price-box">
																<span class="new-price">{{ number_format($value['price']).' '.'VND'}}</span>
															</div>
														</div>
														<div class="product-content">
															<h2 class="product-name"><a href="{{ route('product-details', $value->id)}}">{{ $value['name']}}</a></h2>
														
														</div>
													</div>
													<!-- single-product end -->
												</div>
											</div>
										@endforeach
									</div>
								</div>
								<!-- product-row end -->
							</div>
							<!-- list view -->
							<div class="tab-pane fade" id="shop-list-tab">
								<div class="list-view">
									<!-- single-product start -->
									<div class="product-list-wrapper">
										<div class="single-product">								
											<div class="col-md-4 col-sm-4 col-xs-12">
												<div class="product-img">
													<a href="#">
														<img class="primary-image" src="img/products/product-7.jpg" alt="" />
														<img class="secondary-image" src="img/products/product-2.jpg" alt="" />
													</a>
												</div>								
											</div>
											<div class="col-md-8 col-sm-8 col-xs-12">
												<div class="product-content">
													<h2 class="product-name"><a href="#">Cras neque metus</a></h2>
													<div class="rating-price">	
														<div class="pro-rating">
															<a href="#"><i class="fa fa-star"></i></a>
															<a href="#"><i class="fa fa-star"></i></a>
															<a href="#"><i class="fa fa-star"></i></a>
															<a href="#"><i class="fa fa-star"></i></a>
															<a href="#"><i class="fa fa-star"></i></a>
														</div>
														<div class="price-boxes">
															<span class="new-price">$110.00</span>
														</div>
													</div>
													<div class="product-desc">
														<p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Viva</p>
													</div>
													<div class="actions-e">
														<div class="action-buttons">
															<div class="add-to-cart">
																<a href="#">Add to cart</a>
															</div>
															<div class="add-to-links">
																<div class="add-to-wishlist">
																	<a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
																</div>
																<div class="compare-button">
																	<a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
																</div>									
															</div>
														</div>
													</div>										
												</div>									
											</div>
										</div>
									</div>
									<!-- single-product end -->	
								</div>
							</div>
							<!-- shop toolbar start -->
							<div class="shop-content-bottom">
								<div class="shop-toolbar btn-tlbr">
									<div class="col-md-4 col-sm-4 col-xs-12 hidden-xs nopadding-left text-left">
										<form class="tree-most" method="get">
											<div class="orderby-wrapper">
												<label>Sort By</label>
												<select name="orderby" class="orderby">
													<option value="menu_order" selected="selected">Default sorting</option>
													<option value="popularity">Sort by popularity</option>
													<option value="rating">Sort by average rating</option>
													<option value="date">Sort by newness</option>
													<option value="price">Sort by price: low to high</option>
													<option value="price-desc">Sort by price: high to low</option>
												</select>
											</div>
										</form>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12 text-center">
										<div class="pages">
											<label>Page:</label>
											<ul>
												<li class="current">1</li>
												<li><a href="#">2</a></li>
												<li><a href="#" class="next i-next" title="Next"><i class="fa fa-arrow-right"></i></a></li>
											</ul>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12 nopadding-right text-right">
										<div class="view-mode">
											<label>View on</label>
											<ul>
												<li class="active"><a href="#shop-grid-tab" data-toggle="tab"><i class="fa fa-th"></i></a></li>
												<li class=""><a href="#shop-list-tab" data-toggle="tab" ><i class="fa fa-th-list"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- shop toolbar end -->
						</div>
					</div>
					<!-- right sidebar end -->
				</div>
			</div>
		</div>
		<!-- shop-with-sidebar end -->
		<!-- Brand Logo Area Start -->
		<div class="brand-area">
			<div class="container">
				<div class="row">
					<div class="brand-carousel">
						<div class="brand-item"><a href="#"><img src="img/brand/bg1-brand.jpg" alt="" /></a></div>
						<div class="brand-item"><a href="#"><img src="img/brand/bg2-brand.jpg" alt="" /></a></div>
						<div class="brand-item"><a href="#"><img src="img/brand/bg3-brand.jpg" alt="" /></a></div>
						<div class="brand-item"><a href="#"><img src="img/brand/bg4-brand.jpg" alt="" /></a></div>
						<div class="brand-item"><a href="#"><img src="img/brand/bg5-brand.jpg" alt="" /></a></div>
						<div class="brand-item"><a href="#"><img src="img/brand/bg2-brand.jpg" alt="" /></a></div>
						<div class="brand-item"><a href="#"><img src="img/brand/bg3-brand.jpg" alt="" /></a></div>
						<div class="brand-item"><a href="#"><img src="img/brand/bg4-brand.jpg" alt="" /></a></div>
					</div>
				</div>
			</div>
		</div>
		<!-- Brand Logo Area End -->
@endsection

