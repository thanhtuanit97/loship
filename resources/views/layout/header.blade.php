<div class="col-md-3 col-sm-12 text-center nopadding-right">
	<div class="top-logo">
		<a href="{{ route('home.index')}}"><img src="images/logo.gif" alt="" /></a>
	</div>
</div>
<!-- logo end -->
<!-- mainmenu area start -->
<div class="col-md-6 text-center">
	<div class="mainmenu">
		<nav>
			<ul>
				<li class="expand"><a href="{{ route('home.index')}}">Trang Chủ</a></li>
				<li class="expand"><a href="shop-grid.html">Sản Phẩm</a>
					@if(isset($categories))
					<div class="restrain mega-menu megamenu1">
						@foreach($categories as $key => $cate)
						<span>
							<a href="{{ route('cate-with-product',[$cate->c_slug, $cate->id])}}" class="mega-menu-title">{{ $cate->c_name}}</a>	
						</span>
						@endforeach
					</div>
					@endif
				</li>
				<li class="expand"><a href="{{ route('article.index')}}">Tin Tức</a></li>
				<li class="expand"><a href="about-us.html">Giới Thiệu</a></li>
				<li class="expand"><a href="{{ route('contact.index')}}">Liên Hệ</a></li>
			</ul>
		</nav>
	</div>
	<!-- mobile menu start -->
	<div class="row">
		<div class="col-sm-12 mobile-menu-area">
			<div class="mobile-menu hidden-md hidden-lg" id="mob-menu">
				<span class="mobile-menu-title">Menu</span>
				<nav>
					<ul>
						<li><a href="{{ route('home.index')}}">Trang Chủ</a></li>
						<li><a href="shop-grid.html">Sản Phẩm</a>
							<ul>
								@if(isset($categories))

									@foreach($categories as $key => $cate)
									<span>
										<li><a href="#">{{ $cate->c_name}}</a></li>
									@endforeach
								
								@endif
							</ul>
						</li>
						<li><a href="{{route('article.index')}}">Tin Tức</a></li>
						<li><a href="about-us.html">Giới Thiệu</a></li>
						<li><a href="{{ route('contact.index')}}">Liên Hệ</a></li>
						<li><a href="#">Trang Liên Quan</a>
							<ul>
								<li><a href="shop-grid.html">Shop Grid</a></li>
								<li><a href="shop-list.html">Shop List</a></li>
								<li><a href="product-details.html">Product Details</a></li>
								<li><a href="contact-us.html">Contact Us</a></li>
								<li><a href="about-us.html">About Us</a></li>
								<li><a href="cart.html">Shopping cart</a></li>
								<li><a href="checkout.html">Checkout</a></li>
								<li><a href="wishlist.html">Wishlist</a></li>
								<li><a href="login.html">Login</a></li>
								<li><a href="404.html">404 Error</a></li>
							</ul>													
						</li>
						
					</ul>
				</nav>
			</div>						
		</div>
	</div>
	<!-- mobile menu end -->
</div>
<!-- mainmenu area end -->
<!-- top details area start -->
<div class="col-md-3 col-sm-12 nopadding-left">
	<div class="top-detail">
		<!-- language division start -->
							<div class="disflow">
								<div class="expand lang-all disflow">
									<a href="#"><img src="" alt="">
										@if(Auth::user())
		                               Xin Chào : {{ Auth::user()->name}}
		                                @else
		                                 My Account
		                                @endif 
									</a>
									
								</div>
								
							</div>
							<!-- language division end -->
							<!-- addcart top start -->
							<div class="disflow">
								<div class="circle-shopping expand">
									<div class="shopping-carts text-right">
										<div class="cart-toggler">
											<a href="{{ route('cart.index')}}"><i class="icon-bag"></i></a>
											<a href="#"><span class="cart-quantity">
												<?php
												$content = Cart::count();
													echo $content;
												 ?>
												
											</span></a>
										</div>
										<div class="restrain small-cart-content">
											 @if($content)
											<ul class="cart-list">
												<?php
												$contents = Cart::content();
												
												 ?>
												
												 @foreach($contents as $key => $value)
												<li>
													<a class="sm-cart-product" href="product-details.html">
														<img src="{{ pare_url_file($value->options->image)}}" alt="">
													</a>
													<div class="small-cart-detail">
														<form action="{{route('delete.cart',$value->rowId)}}" method="post">
															@csrf
															@method('delete')
																<button type="submit" class="remove"><i class="fa fa-times-circle" style="color: red"></i></button>
														</form>
														{{-- <a href="#" class="edit-btn"><img src="images/btn_edit.gif" alt="Edit Button" /></a> --}}
														<a class="small-cart-name" href="product-details.html">{{ $value->name}}</a>
														<span class="quantitys"><strong>{{ $value->qty}}</strong>x<span>{{number_format($value->price).' '.'VND' }}</span></span>
													</div>
												</li>
												@endforeach
											
												
											</ul>
											<p class="total">Tổng Tiền: <span class="amount">{{ Cart::subtotal() }} VND</span></p>
											<p class="buttons">
												<a href="{{ route('check-out')}}" class="button">Đặt Hàng</a>
											</p>
												@else
												<span style="color: red">Giỏ Hàng Trống</span>
												@endif
										</div>
									</div>
								</div>
							</div>
							<!-- addcart top start -->
							<!-- search divition start -->
							<div class="disflow">
								<div class="header-search expand">
									<div class="search-icon fa fa-search"></div>
									<div class="product-search restrain">
										<div class="container nopadding-right">
											<form action="index.html" id="searchform" method="get">
												<div class="input-group">
													<input type="text" class="form-control" maxlength="128" placeholder="Nhập từ khóa tìm kiếm...">
													<span class="input-group-btn">
														<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
													</span>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>


							
							<!-- search divition end -->
							<div class="disflow">
								<div class="expand dropps-menu">
									<a href="#"><i class="fa fa-align-right"></i></a>
									<ul class="restrain language">
										@if(Auth::check())
											<li><a href="login.html">Quản Lý Tài Khoản</a></li>
											<li><a href="wishlist.html">Sản Phẩm Yêu Thích</a></li>
											<li><a href="{{ route('cart.index') }}">Giỏ Hàng Của Tôi</a></li>	
											<li><a href="{{ route('order.hostory')}}">Lịch Sử Mua Hàng</a></li>	
											<li><a href="{{ route('user.logout') }}">Đăng Xuất</a></li>
										@else
											<li><a href="{{ route('login') }}">Đăng Nhập</a></li>
											<li><a href="{{ route('register') }}">Đăng Ký Tài Khoản</a></li>
										@endif
									</ul>
								</div>

							</div>
							
						</div>
					</div>