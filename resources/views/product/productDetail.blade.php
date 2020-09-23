@extends('layout.master')
@section('title')
Chi Tiết Sản Phẩm | LoShip
@endsection
@section('content')
<style>
	
	.list-rating .active {
		color: #ff9705;
	}
</style>
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
								<li class="category3"><span>Chi Tiết Sản Phẩm</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- product-details Area Start -->
		<div class="product-details-area" id="content_product" data-id = {{ $products['id']}}>
			<div class="container">
				<div class="row">
					
					<div class="col-md-5 col-sm-5 col-xs-12">
						<div class="zoomWrapper">
							<div id="img-1" class="zoomWrapper single-zoom">
								<a href="#">
									<img id="zoom1 ProductImg" src="{{ pare_url_file($products['avatar'])}}" data-zoom-image="{{ pare_url_file($products['avatar'])}}" alt="big-1" style="width: 450px; height: 450px">
									
								</a>
							</div>
							<div class="single-zoom-thumb">
								<ul class="bxslider" id="gallery_01">
									<?php  
										$images = json_decode($products['image_list']);

									?>
									@if(isset($images))
										@foreach($images as $img)
									<li>
										<img src="{{ $img}}"  style="width: 70px; height:83px; " class="small-img">
										{{-- <a href="#" class="elevatezoom-gallery active small-img" data-update="" data-image="images/product-details/big-1-1.jpg" data-zoom-image="img/product-details/ex-big-1-1.jpg"><img src="{{ $img}}" alt="zo-th-1" style="width: 70px; height:83px; " /></a> --}}
									</li>
										@endforeach
									@endif
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-7 col-sm-7 col-xs-12">
						<div class="product-list-wrapper">
							
							<div class="single-product">
						<form action="{{route('cart.save')}}" method="POST">
							@csrf
						
								<div class="product-content">
									<h2 class="product-name"><a href="#">{{ $products['name']}}</a></h2>
									<div class="rating-price">
									 <?php 
						                  $ageDetails = 0;
						                  if($products['total_rating'])
						                  {
						                    $ageDetails = round($products['total_number'] / $products['total_rating'], 2);
						                  }
						            ?>	
										<div class="pro-rating">
											@for($i = 1; $i <= 5; $i++)
											<a href="#"><i class="fa fa-star {{ $i <= $ageDetails ? 'active' : '' }}"></i></a>
											@endfor
										</div>
										<div class="price-boxes">
											<span class="new-price">
												@foreach($products->coupons as $value)
													@if(!$value->expired)
													@php 
														$number = $value['number'];
														$sale = ($products['price']*$number)/100;
														$price_sale = $products['price'] - $sale;
													@endphp
													<span style="color: red;" class="priceSale">Giảm còn : {{ number_format($price_sale).' '.'đ'}}</span>
													<input type="hidden" name="priceSaleHidden"  value="{{ $price_sale }}" class="input-text qty">
													@endif

												@endforeach
												{{ number_format($products['price']).' '.'đ'}}
										
											</span>
										</div>
									</div>
									<div class="product-desc">
										<p>{!! $products['description'] !!}</p>
									</div>
									<p class="availability in-stock"><label for="qty">Tình Trạng:</label>
										@if($products['quantity'] <= 5)
									 <span style="font-size: 2em">Hết Hàng</span>
									 	@else
									 <span style="font-size: 2em">Còn Hàng</span>
									 <div class="actions-e">
										<div class="action-buttons-single">
											<div class="inputx-content">
												<label for="qty">Số Lượng:</label>
												<input type="number" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty">
												<input type="hidden" name="product_hidden"  value="{{ $products['id'] }}" class="input-text qty">

											</div>
											<div class="add-to-cart">
												<button type="submit" style="border:none; background-color: #fff"><a>Thêm Vào Giỏ Hàng</a></button>
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
									 	 @endif
									</p>
									
									<div class="singl-share">
                                        <a href="#"><img src="images/single-share.png" alt=""></a>
                                    </div>
								</div>
							</form>
							</div>
						
						</div>
					</div>
				
				</div>
				<div class="col-md-12">
					<div class="single-product-tab">
						  <!-- Nav tabs -->
						<ul class="details-tab">
							<li class="active"><a href="#home" data-toggle="tab">Mô Tả Chi tiết</a></li>
							<li class=""><a href="#messages" data-toggle="tab"> Đánh Giá Sản Phẩm ({{ $products->total_rating}})</a></li>
						</ul>
						  <!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="home">
								<div class="product-tab-content">
									<p>{!! $products['content'] !!}</p>	
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="messages">
								<div class="single-post-comments ">
									<h4 style="text-align: center;margin-top: 5px;">Đánh Giá Sản Phẩm</h4>
									
									<?php  
									$a = $products->total_number;
									if($a==0){
									  $number_rating = 0;
									} else {
										$number_rating = $ageDetails;
									}
									?> 
									<div class="component-list" style="display: flex;align-items: center;border-radius: 5px;border:1px solid #dededede">
											<div class="raiting-item" style="width: 20%;position: relative;">
												<span class="fa fa-star" style="font-size: 100px;color: #ff9705;text-align: center;display: block;margin: 0 auto;"></span>
												<b style="position: absolute;top: 50%;left: 50%;color: #fff;font-size: 20px;transform: translateX(-50%) translateY(-50%);">{{ $number_rating}}</b>
											</div>
											<div class="list-raiting" style="width: 60%;padding: 20px;">
												@foreach($arrayRatings as $key => $item)
												<?php 
												//tinh so phan tram theo so sao
												$ratingAge = round(($item['total'] / $products->total_rating)*100,2);
												?>
													<div class="item-raiting" style="display: flex;align-items: center;">
														<div class="" style="width: 10%;font-size: 14px;">
															{{ $key}}<span class="fa fa-star" style="margin-left: 3px;"></span>
														</div>
														<div class="" style="width: 55%;margin: 0 20px;">
															<span style="width: 100%; height: 8px;display: block;border:1px solid #dededede;border-radius: 5px;background-color: #dededede"><b style="width: {{ $ratingAge }}%;background-color: #f25800;display: block;border-radius: 5px;height: 100%"></b></span>
															</div>
													
														<div class="" style="width: 20%">
															<a href="" >{{ $item['total']}} Đánh Giá ({{ $ratingAge }}%)</a>
														</div>
													</div>
												@endforeach
											</div>										
											<div style="width: 20%">
												<a href="" class="js_raiting_action" style="width: 200px;background: #288ad6;padding: 10px;color: #fff;border-radius: 5px;">Gửi Đánh Giá Của Bạn</a>
											</div>
										</div>
									@if(Auth::user())
									<div class="form-rating hide">
										<div style="display: flex; margin-top: 15px;font-size :15px;" >
											<p style="margin-bottom: 0">Chọn Đánh Giá Của Bạn</p>
											<span style="margin: 0 15px;" class="list_start">
												@for($i = 1; $i <=5 ; $i++)
												<i class="fa fa-star" data-key = "{{ $i }}"></i>
												@endfor
											</span>
											<span class="list_text"></span>
												<input type="hidden" value="" class="number_rating">
										</div>	
										<div style="margin-top: 15px;">
											<textarea name="" class="form-control" cols="30" rows="3" id="ra_content"></textarea>
										
										</div>
										<div style="margin-top: 15px;">
											
											<a href="{{ route('saveRating',$products['id']) }}"  class="js_rating_product" style="width: 200px;background: #288ad6;padding:5px 10px;color: #fff;border-radius: 5px;" >Gửi Đánh Giá Của Bạn</a>
										</div>
									</div>
									@else
									<span style="color: red;font-style: initial;margin-top: 5px;float: right;"> * Vui lòng Đăng Nhập Để Gửi Đánh Giá</span>	
									@endif	
								</div>
									{{-- show danh gia --}}
						<div class="compoment-list-rating" style="margin-top: 20px;">
							@if( isset($ratings) )
								@foreach($ratings as $rating)
								<div class="rating-items">
									<div>
										<span class="rating-username" style="font-size: 15px; font-weight: 600; ">{{ $rating->user->name }}</span> |
										<a href="" style="color: #2ba832; font-weight: 600"> <i class="fa fa-check-circle-o"></i> Đã Mua Hàng Tại LoShip</a> |
										<span ><i class="fa fa-clock-o"></i> {{ $rating->created_at}}</span>
									</div>
									<p style="margin-top: 10px">
										
								
										<span class="list-rating">
											@for($j = 1; $j <= 5; $j++)
											    <i class="fa fa-star {{ $j <= $rating->number ? 'active' : ''}}"></i>
											@endfor
											<span style="margin-left: 10px;">{{ $rating->content}}</span>
										</span><br>
										<div style="margin-top: 10px">
											<a href=""><span style="color: blue"><i class="fa fa-thumbs-up"></i> Thích</span></a>
										<span style="margin-left: 10px;"><i class="fa fa-comment"></i> Bình Luận</span><br>
										</div>
										
										
									</p>
										
									
								</div>
								<hr>
								@endforeach
							@endif
						</div>		
						{{-- end show danh gia--}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- product-details Area end -->
		<!-- product section start -->
		<div class="our-product-area new-product">
			<div class="container">
				<div class="area-title">
					<h2>Sản Phẩm Tương Tự</h2>
				</div>
				<!-- our-product area start -->
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="features-curosel">
								<!-- single-product start -->
								<div class="col-lg-12 col-md-12">
									<div class="single-product first-sale">
										<div class="product-img">
											<a href="#">
												<img class="primary-image" src="images/products/product-1.jpg" alt="" />
												<img class="secondary-image" src="images/products/product-2.jpg" alt="" />
											</a>
											<div class="action-zoom">
												<div class="add-to-cart">
													<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
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
												<span class="new-price">$200.00</span>
											</div>
										</div>
										<div class="product-content">
											<h2 class="product-name"><a href="#">Donec ac tempus</a></h2>
											<p>Nunc facilisis sagittis ullamcorper...</p>
										</div>
									</div>
								</div>
								<!-- single-product end -->
								<!-- single-product start -->
								<div class="col-lg-12 col-md-12">
									<div class="single-product first-sale">
										<div class="product-img">
											<a href="#">
												<img class="primary-image" src="images/products/product-5.jpg" alt="" />
												<img class="secondary-image" src="images/products/product-6.jpg" alt="" />
											</a>
											<div class="action-zoom">
												<div class="add-to-cart">
													<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
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
												<span class="new-price">$300.00</span>
											</div>
										</div>
										<div class="product-content">
											<h2 class="product-name"><a href="#">Primis in faucibus</a></h2>
											<p>Nunc facilisis sagittis ullamcorper...</p>
										</div>
									</div>
								</div>
								<!-- single-product end -->
								<!-- single-product start -->
								<div class="col-lg-12 col-md-12">
									<div class="single-product first-sale">
										<div class="product-img">
											<a href="#">
												<img class="primary-image" src="images/products/product-9.jpg" alt="" />
												<img class="secondary-image" src="images/products/product-10.jpg" alt="" />
											</a>
											<div class="action-zoom">
												<div class="add-to-cart">
													<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
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
												<span class="new-price">$270.00</span>
											</div>
										</div>
										<div class="product-content">
											<h2 class="product-name"><a href="#">Voluptas nulla</a></h2>
											<p>Nunc facilisis sagittis ullamcorper...</p>
										</div>
									</div>
									
								</div>
								<!-- single-product end -->
								<!-- single-product start -->
								<div class="col-lg-12 col-md-12">
									<div class="single-product first-sale">
										<div class="product-img">
											<a href="#">
												<img class="primary-image" src="images/products/product-13.jpg" alt="" />
												<img class="secondary-image" src="images/products/product-1.jpg" alt="" />
											</a>
											<div class="action-zoom">
												<div class="add-to-cart">
													<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
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
												<span class="new-price">$340.00</span>
											</div>
										</div>
										<div class="product-content">
											<h2 class="product-name"><a href="#">Cras neque metus</a></h2>
											<p>Nunc facilisis sagittis ullamcorper...</p>
										</div>
									</div>
								</div>
								<!-- single-product end -->
								<!-- single-product start -->
								<div class="col-lg-12 col-md-12">
									<div class="single-product first-sale">
										<span class="sale-text">Sale</span>
										<div class="product-img">
											<a href="#">
												<img class="primary-image" src="images/products/product-4.jpg" alt="" />
												<img class="secondary-image" src="images/products/product-5.jpg" alt="" />
											</a>
											<div class="action-zoom">
												<div class="add-to-cart">
													<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
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
												<span class="new-price">$360.00</span>
											</div>
										</div>
										<div class="product-content">
											<h2 class="product-name"><a href="#">Occaecati cupiditate</a></h2>
											<p>Nunc facilisis sagittis ullamcorper...</p>
										</div>
									</div>
								</div>
								<!-- single-product end -->
								<!-- single-product start -->
								<div class="col-lg-12 col-md-12">
									<div class="single-product first-sale">
										<div class="product-img">
											<a href="#">
												<img class="primary-image" src="images/products/product-8.jpg" alt="" />
												<img class="secondary-image" src="images/products/product-9.jpg" alt="" />
											</a>
											<div class="action-zoom">
												<div class="add-to-cart">
													<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
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
												<span class="new-price">$400.00</span>
											</div>
										</div>
										<div class="product-content">
											<h2 class="product-name"><a href="#">Accumsan elit</a></h2>
											<p>Nunc facilisis sagittis ullamcorper...</p>
										</div>
									</div>
								</div>
								<!-- single-product end -->
								<!-- single-product start -->
								<div class="col-lg-12 col-md-12">
									<div class="single-product first-sale">
										<div class="product-img">
											<a href="#">
												<img class="primary-image" src="images/products/product-11.jpg" alt="" />
												<img class="secondary-image" src="images/products/product-12.jpg" alt="" />
											</a>
											<div class="action-zoom">
												<div class="add-to-cart">
													<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
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
												<span class="new-price">$280.00</span>
											</div>
										</div>
										<div class="product-content">
											<h2 class="product-name"><a href="#">Pellentesque habitant</a></h2>
											<p>Nunc facilisis sagittis ullamcorper...</p>
										</div>
									</div>
								</div>
								<!-- single-product end -->
								<!-- single-product start -->
								<div class="col-lg-12 col-md-12">
									<div class="single-product first-sale">
										<div class="product-img">
											<a href="#">
												<img class="primary-image" src="images/products/product-11.jpg" alt="" />
												<img class="secondary-image" src="images/products/product-2.jpg" alt="" />
											</a>
											<div class="action-zoom">
												<div class="add-to-cart">
													<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
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
												<span class="new-price">$222.00</span>
											</div>
										</div>
										<div class="product-content">
											<h2 class="product-name"><a href="#">Donec ac tempus</a></h2>
											<p>Nunc facilisis sagittis ullamcorper...</p>
										</div>
									</div>
								</div>
								<!-- single-product end -->
							</div>
						</div>	
					</div>
				</div>
				<!-- our-product area end -->	
			</div>
		</div>
		<!-- product section end -->
@endsection

