@extends('layout.master')

@section('title')
	 {{ $category_by_id->c_name }} | LoShip
@endsection


@section('content')
<style>
	.sidebar-tags .active {
    color: #e7aa4c;
}


</style>

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
									<h2>Lọc Điều Kiện</h2>
								</div>
							</aside>
							<aside class="sidebar-content">
								<div class="sidebar-title">
									<h6>Lọc Theo Khoảng Giá</h6>
								</div>
								<ul class="sidebar-tags">
									<li><a class="{{ Request::get('price') == 1 ? 'active' : ''}}" href=" {{request()->fullUrlWithQuery(['price' => 1])}}">Dưới 1 Triệu</a></li>
									<li><a class="{{ Request::get('price') == 2 ? 'active' : ''}}" href=" {{request()->fullUrlWithQuery(['price' => 2])}}">1.000.000 - 5.000.000</a></li>
									<li><a class="{{ Request::get('price') == 3 ? 'active' : ''}}" href=" {{request()->fullUrlWithQuery(['price' => 3])}}">5.000.000 - 8.000.000</a></li>
									<li><a class="{{ Request::get('price') == 4 ? 'active' : ''}}" href=" {{request()->fullUrlWithQuery(['price' => 4])}}">8.000.000 - 15.000.000</a></li>
									<li><a class="{{ Request::get('price') == 5 ? 'active' : ''}}" href=" {{request()->fullUrlWithQuery(['price' => 5])}}">Trên 15.000.000</a></li>
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
								<div class="col-md-4 col-sm-4 col-xs-12 nopadding-left text-left pull-right">
									<form class="tree-most" method="get" id="form-order">
										<div class="orderby-wrapper ">
											<label>Lọc theo</label>
											<select name="orderby" class="orderby">
												<option {{ Request::get('orderby') == "md" ?  "selected = 'selected'" : ''}} value="md" selected="selected">-- Mặc Định --</option>
												<option {{ Request::get('orderby') == "desc" ? "selected = 'selected'" : ''}} value="desc">Sản Phẩm Mới Nhất</option>
												<option {{ Request::get('orderby') == "asc" ? "selected = 'selected'" : ''}} value="asc">Sản Phẩm Cũ</option>
												<option {{ Request::get('orderby') == "price_max" ? "selected = 'selected'" : ''}} value="price_max">Giá Giảm Dần</option>
												<option {{ Request::get('orderby') == "price_min" ? "selected = 'selected'" : ''}} value="price_min">Giá Tăng Dần</option>
											</select>
										</div>
									</form>
								</div>
								
								{{-- <div class="col-md-4 col-sm-4 col-xs-12 nopadding-right text-right">
									<div class="view-mode">
										<label>View on</label>
										<ul>
											<li class="active"><a href="#shop-grid-tab" data-toggle="tab"><i class="fa fa-th"></i></a></li>
											<li class=""><a href="#shop-list-tab" data-toggle="tab" ><i class="fa fa-th-list"></i></a></li>
										</ul>
									</div>
								</div> --}}
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

			                                                 @foreach($value->coupons as $values)
			                                                 @if(!$values->expired)
			                                                 <span class="sale-text">
			                                                    @if($values['condition'] == 1)
			                                                    Giảm {{ $values['number']}} %
			                                                    @else
			                                                    Giảm {{ $values['number']}} đ
			                                                    @endif
			                                                </span>
			                                                @endif
			                                                @endforeach
														
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
																@if($value->quantity == 0)
																<div class="action-buttons">
																	<div class="add-to-links">
																		<div class="add-to-wishlist">
																			<a href="#" title="Yêu Thích"><i class="fa fa-heart"></i></a>
																		</div>

																	</div>
																	<div class="quickviewbtn">
																		<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
																	</div>
																</div>
																@else
																<div class="action-buttons">
																	<div class="add-to-links">
																		<div class="add-to-wishlist">
																			<a href="#" title="Yêu Thích"><i class="fa fa-heart"></i></a>
																		</div>
																		<div class="compare-button ">
																			<button style="border:none; background-color: #fff;"><a  title="Thêm Vào Giỏ Hàng"><i class="icon-bag addTocart" productId = {{ $value->id}}></i></a></button> 
																		</div>									
																	</div>
																	<div class="quickviewbtn">
																		<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
																	</div>
																</div>
																@endif
															</div>
															<div class="price-box">
																@foreach($value->coupons as $items)
																@if(!$items->expired)
																@php 
																$number = $items['number'];
																$sale = ($value['price']*$number)/100;
																$price_sale = $value['price'] - $sale;
																@endphp
																<span class="new-price priceSale" style="color: red">Giảm còn : {{ number_format($price_sale).' '.'đ' }}</span>
																<input type="hidden" name="priceSaleHidden"  value="{{ $price_sale }}" >

																@endif
																@endforeach

                                           					<span class="new-price priceDB" id="price_hidden">{{ number_format($value['price']).' '.'đ' }}</span>	
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
						
							<!-- shop toolbar start -->
							<div class="shop-content-bottom">
								<div class="shop-toolbar btn-tlbr">
									
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

