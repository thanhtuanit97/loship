<!DOCTYPE html>
<html class="no-js" lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>@yield('title','LoShip | Trang Chủ')</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
	<base href="{{ asset('')}}">

        <!-- Favicon
        	============================================ -->
        	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

		<!-- Fonts
			============================================ -->
			<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
			<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>

			<!-- CSS  -->

		<!-- Bootstrap CSS
			============================================ -->      
			<link rel="stylesheet" href="css/bootstrap.min.css">
           <link rel="stylesheet" href="css/toastr.css">


		<!-- owl.carousel CSS
			============================================ -->      
			<link rel="stylesheet" href="css/owl.carousel.css">

		<!-- owl.theme CSS
			============================================ -->      
			<link rel="stylesheet" href="css/owl.theme.css">

		<!-- owl.transitions CSS
			============================================ -->      
			<link rel="stylesheet" href="css/owl.transitions.css">

		<!-- font-awesome.min CSS
			============================================ -->      
			<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- font-icon CSS
			============================================ -->      
			<link rel="stylesheet" href="fonts/font-icon.css">

		<!-- jquery-ui CSS
			============================================ -->
			<link rel="stylesheet" href="css/jquery-ui.css">

		<!-- mobile menu CSS
			============================================ -->
			<link rel="stylesheet" href="css/meanmenu.min.css">

		<!-- nivo slider CSS
			============================================ -->
			<link rel="stylesheet" href="custom-slider/css/nivo-slider.css" type="text/css" />
			<link rel="stylesheet" href="custom-slider/css/preview.css" type="text/css" media="screen" />

 		<!-- animate CSS
 			============================================ -->         
 			<link rel="stylesheet" href="css/animate.css">

 		<!-- normalize CSS
 			============================================ -->        
 			<link rel="stylesheet" href="css/normalize.css">

        <!-- main CSS
        	============================================ -->          
        	<link rel="stylesheet" href="css/main.css">

        <!-- style CSS
        	============================================ -->          
        	<link rel="stylesheet" href="css/home/style.css">

        <!-- responsive CSS
        	============================================ -->          
        	<link rel="stylesheet" href="css/responsive.css">

        	<script src="js/vendor/modernizr-2.8.3.min.js"></script>
                <!-- home js
                    ============================================ -->           
                    <script src="js/home.js" async></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

                </head>
                <body class="home-one">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <!-- Add your site or application content here -->
        <!-- header area start -->
        <header class="short-stor">
        	<div class="container-fluid">
        		<div class="row">
        			<!-- logo start -->
        			@include('layout.header')
        			<!-- top details area end -->
        		</div>
        	</div>
        </header>
        <!-- header area end -->
        <!-- start home slider -->
        <div class="slider-area an-1 hm-1">
        	<!-- slider -->
        	@include('layout.banner')
        	<!-- slider end-->
        </div>
        <!-- end home slider -->
        <!-- product section start -->
        <div class="our-product-area">
        	<div class="container">
        		<!-- area title start -->
        		<div class="area-title">
        			<h2>Sản Phẩm Nổi Bật</h2>
        		</div>
        		<!-- area title end -->
        		<!-- our-product area start -->
        		<div class="row">
        			<div class="col-md-12">
        				<div class="features-tab">
        					<!-- Nav tabs -->
        					<ul class="nav nav-tabs">
        						<li role="presentation" class="active"><a href="#home" data-toggle="tab">Sản Phẩm Bán Chạy</a></li>
        						<li role="presentation"><a href="#profile" data-toggle="tab">Sản Phẩm Yêu Thích</a></li>
        					</ul>
        					<!-- Tab pans -->
        					<div class="tab-content">
        						{{-- home --}}
        						<div role="tabpanel" class="tab-pane fade in active" id="home">
        							<div class="row">
                                
                                        @if(isset($productHot))
                                        <div class="features-curosel">
                                           @foreach($productHot as $prohot)
                                           <div class="col-lg-12 col-md-12">
                                              <!-- single-product start -->
                                              <div class="single-product first-sale " id="pro-{{ $prohot->id}}">
                                                 <!-- Hiển Thị logo giảm giá cho sản phẩm -->


                                                 @foreach($prohot->coupons as $value)
                                                 @if(!$value->expired)
                                                 <span class="sale-text">
                                                    @if($value['condition'] == 1)
                                                    Giảm {{ $value['number']}} %
                                                    @else
                                                    Giảm {{ $value['number']}} đ
                                                    @endif
                                                </span>
                                                @endif
                                                @endforeach

                                                <div class="product-img">
                                                    <a href="{{ route('product-details', $prohot->id)}}">
                                                       <img class="primary-image" src="{{ pare_url_file($prohot['avatar'])}}" alt="" style="width: 540px; height: 330px" />
                                                       <img class="secondary-image" src="{{ pare_url_file($prohot['avatar'])}}" alt="" style="width: 540px; height: 330px"/>
                                                   </a>
                                                 <form action="{{route('cart.save')}}" method="POST">
                                                        @csrf
                                                           <input type="hidden" name="product_hidden"  value="{{ $prohot->id }}" >
                                                   <div class="action-zoom">
                                                       <div class="add-to-cart">
                                                          <a href="{{ route('product-details', $prohot->id)}}" title="Xem Chi Tiết"><i class="fa fa-search-plus"></i></a>
                                                      </div>
                                                  </div>
                                                  <div class="actions">
                                                    @if($prohot->quantity == 0)
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
                                                               <button style="border:none; background-color: #fff;"><a  title="Thêm Vào Giỏ Hàng"><i class="icon-bag addTocart" productId = {{ $prohot->id}}></i></a></button> 
                                                            </div>									
                                                        </div>
                                                        <div class="quickviewbtn">
                                                         <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                        </div>
                                                    </div>
                                                    @endif
                                         </div>
                                    
                                         <div class="price-box">

                                           <!-- Hiển thị giá sản phẩm sau khi giảm -->
                                           @foreach($prohot->coupons as $value)
                                           @if(!$value->expired)
                                           @php 
                                           $number = $value['number'];
                                           $sale = ($prohot['price']*$number)/100;
                                           $price_sale = $prohot['price'] - $sale;
                                           @endphp
                                           <span class="new-price priceSale" style="color: red">Giảm còn : {{ number_format($price_sale).' '.'đ' }}</span>
                                           <input type="hidden" name="priceSaleHidden"  value="{{ $price_sale }}" >

                                           @endif
                                           @endforeach

                                           <span class="new-price priceDB" id="price_hidden">{{ number_format($prohot['price']).' '.'đ' }}</span>	


                                       </div> 
                                       </form>
                                   </div>
                                    <div class="product-content">
                                    <h2 id="product-name" class="product-name"><a href="{{ route('product-details', $prohot->id)}}">{{ $prohot['name']}}</a></h2>
                                 

                                    </div>
                            </div>
                            <!-- single-product end -->
                        </div>

                        @endforeach
                        <!-- single-product end -->
                    </div>
                    @endif
               
                </div>
            </div>
            {{-- profile --}}
            <div role="tabpanel" class="tab-pane fade" id="profile">
             <div class="row">
                <div class="features-curosel">
                   <div class="col-lg-12 col-md-12">
                      <!-- single-product start -->
                      <div class="single-product first-sale">
                         <span class="sale-text">Sale</span>
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
                   <span class="new-price">$110.00</span>
               </div>
           </div>
           <div class="product-content">
            <h2 class="product-name"><a href="#">Pellentesque habitant</a></h2>
            <p>Nunc facilisis sagittis ullamcorper...</p>
        </div>
    </div>
    <!-- single-product end -->
</div>	
</div>
</div>
</div>
</div>
</div>				
</div>
</div>
<!-- our-product area end -->	


</div>
</div>
<!-- product section end -->

<div id="product_view"></div>
<!-- banner-area start -->
<div class="banner-area">
   <div class="container-fluid">
      <div class="row">
         <a href=""><img src="uploads/home/banner/banner4.png" alt="" style="width: 1499px; height: 302px" /></a>
     </div>
 </div>
</div>
<!-- banner-area end -->
<!-- product section start -->
<div class="our-product-area new-product">
   <div class="container">
      <div class="area-title">
         <h2>Sản Phẩm Mới</h2>
     </div>
     <!-- our-product area start -->
     <div class="row">
         <div class="col-md-12">
            <div class="row">
               <div class="features-curosel">
                  @if(isset($productNew))
                  <!-- single-product start -->
                  @foreach($productNew as $proN)
                  <div class="col-lg-12 col-md-12">
                     <div class="single-product first-sale">
                        <!-- Hiển Thị logo giảm giá cho sản phẩm -->
                        @foreach($proN->coupons as $value)
                        @if(!$value->expired)
                        <span class="sale-text">
                           @if($value['condition'] == 1)
                           Giảm {{ $value['number']}} %
                           @else
                           Giảm {{ $value['number']}} đ
                           @endif
                       </span>
                       @endif
                       @endforeach
                       <div class="product-img">
                           <a href="{{ route('product-details', $proN->id)}}">
                              <img class="primary-image" src="{{ pare_url_file( $proN['avatar'])}}" alt=""  style="width: 540px; height: 330px">
                              <img class="secondary-image" src="{{ pare_url_file( $proN['avatar'])}}" alt=""  style="width: 540px; height: 330px"/>
                          </a>
                          <div class="action-zoom">
                              <div class="add-to-cart">
                                 <a href="{{ route('product-details', $proN->id)}}" title="Xem Chi Tiết"><i class="fa fa-search-plus"></i></a>
                             </div>
                         </div>

                          <form action="{{route('cart.save')}}" method="POST">
                            @csrf
                               <input type="hidden" name="product_hidden"  value="{{ $proN->id }}" >
                         <div class="actions">
                          <div class="action-buttons">
                             <div class="add-to-links">
                                <div class="add-to-wishlist">
                                   <a href="#" title="Yêu Thích"><i class="fa fa-heart"></i></a>
                               </div>
                               <div class="compare-button">
                                  <button style="border:none; background-color: #fff;"><a  title="Thêm Vào Giỏ Hàng"><i class="icon-bag addTocart" productId = {{ $proN->id}}></i></a></button>
                               </div>									
                           </div>
                           <div class="quickviewbtn">
                            <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                        </div>
                    </div>
                </div>
                <div class="price-box">
                  <!-- Hiển thị giá sản phẩm sau khi giảm -->
                  @foreach($proN->coupons as $value)
                  @if(!$value->expired)
                  @php 
                  $number = $value['number'];
                  $sale = ($proN['price']*$number)/100;
                  $price_sale = $proN['price'] - $sale;
                  @endphp
                  <span class="new-price" style="color: red">Giảm còn : {{ number_format($price_sale).' '.'đ' }}</span>
                  {{-- <span class="new-price" style="text-decoration-line:line-through; color: red;">{{ number_format($prohot['price']).' '.'đ' }}</span> --}}
                  @endif
                  @endforeach

                  <span class="new-price" id="price_hidden">{{ number_format($proN['price']).' '.'đ' }}</span>	

              </div>
            </form>
          </div>
          <div class="product-content">
           <h2 class="product-name"><a href="{{ route('product-details', $prohot->id)}}">{{ $proN['name']}}</a></h2>

       </div>
   </div>

   <!-- single-product end -->


</div>
@endforeach
@endif
</div>	
</div>
</div>
<!-- our-product area end -->	
</div>
</div>
<!-- product section end -->
<!-- latestpost area start -->
<div class="latest-post-area">
  <div class="container">
     <div class="area-title">
        <h2>Tin Tức Thị Trường 24H</h2>
    </div>
    <div class="row">
        <div class="all-singlepost">
           @if(isset($articles))
           <!-- single latestpost start -->
           @foreach($articles as $arts)
           <div class="col-md-4 col-sm-4 col-xs-12">

              <div class="single-post">
                 <div class="post-thumb">
                    <a href="{{ route('article.show.byID', [$arts->slug, $arts->id] )}}">
                       <img src="{{ $arts->avatar}}" alt="" style="width: 370px; height :280px" />
                   </a>
               </div>
               <div class="post-thumb-info">
                <div class="post-time">
                   <a href="{{ route('article.show.byID', [$arts->slug, $arts->id] )}}" >{!! $arts->title !!}</a>
										{{-- <span>/</span>
										<span>Post by</span>
										<span>BootExperts</span> --}}
									</div>
									<div class="postexcerpt">
										<p>{!! $arts->description !!}</p>
										<a href="{{ route('article.show.byID', [$arts->slug, $arts->id] )}}" class="read-more"  >Đọc Thêm</a>
									</div>
								</div>
							</div>
							
						</div>
						@endforeach
						<!-- single latestpost end -->
						@endif
					</div>
				</div>
			</div>
		</div>
		<!-- latestpost area end -->
		<!-- block category area start -->
		<div class="block-category">
			<div class="container">
				<div class="row">
					<!-- featured block start -->
					<div class="col-md-4">
						<!-- block title start -->
						<div class="block-title">
							<h2>Featureds</h2>
						</div>
						<!-- block title end -->
						<!-- block carousel start -->
						<div class="block-carousel">
							<div class="block-content">
								<!-- single block start -->
								<div class="single-block">
									<div class="block-image pull-left">
										<a href="product-details.html"><img src="images/block-cat/block-1.jpg" alt="" /></a>
									</div>
									<div class="category-info">
										<h3><a href="product-details.html">Donec ac tempus</a></h3>
										<p>Nunc facilisis sagittis ullamcorper...</p>
										<div class="cat-price">$235.00 <span class="old-price">$333.00</span></div>
										<div class="cat-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>								
									</div>
								</div>
								<!-- single block end -->
								<!-- single block start -->
								<div class="single-block">
									<div class="block-image pull-left">
										<a href="product-details.html"><img src="images/block-cat/block-2.jpg" alt="" /></a>
									</div>
									<div class="category-info">
										<h3><a href="product-details.html">Primis in faucibus</a></h3>
										<p>Nunc facilisis sagittis ullamcorper...</p>
										<div class="cat-price">$205.00</div>
										<div class="cat-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>								
									</div>
								</div>
								<!-- single block end -->
							</div>
							<div class="block-content">
								<!-- single block start -->
								<div class="single-block">
									<div class="block-image pull-left">
										<a href="product-details.html"><img src="images/block-cat/block-3.jpg" alt="" /></a>
									</div>
									<div class="category-info">
										<h3><a href="product-details.html">Voluptas nulla</a></h3>
										<p>Nunc facilisis sagittis ullamcorper...</p>
										<div class="cat-price">$99.00 <span class="old-price">$111.00</span></div>
										<div class="cat-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>								
									</div>
								</div>
								<!-- single block end -->
								<!-- single block start -->
								<div class="single-block">
									<div class="block-image pull-left">
										<a href="product-details.html"><img src="images/block-cat/block-4.jpg" alt="" /></a>
									</div>
									<div class="category-info">
										<h3><a href="product-details.html">Cras neque metus</a></h3>
										<p>Nunc facilisis sagittis ullamcorper...</p>
										<div class="cat-price">$235.00</div>
										<div class="cat-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>								
									</div>
								</div>
								<!-- single block end -->
							</div>
							<div class="block-content">
								<!-- single block start -->
								<div class="single-block">
									<div class="block-image pull-left">
										<a href="product-details.html"><img src="images/block-cat/block-5.jpg" alt="" /></a>
									</div>
									<div class="category-info">
										<h3><a href="product-details.html">Occaecati cupiditate</a></h3>
										<p>Nunc facilisis sagittis ullamcorper...</p>
										<div class="cat-price">$105.00 <span class="old-price">$111.00</span></div>
										<div class="cat-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>								
									</div>
								</div>
								<!-- single block end -->
								<!-- single block start -->
								<div class="single-block">
									<div class="block-image pull-left">
										<a href="product-details.html"><img src="images/block-cat/block-6.jpg" alt="" /></a>
									</div>
									<div class="category-info">
										<h3><a href="product-details.html">Accumsan elit</a></h3>
										<p>Nunc facilisis sagittis ullamcorper...</p>
										<div class="cat-price">$165.00</div>
										<div class="cat-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>								
									</div>
								</div>
								<!-- single block end -->
							</div>
							<div class="block-content">
								<!-- single block start -->
								<div class="single-block">
									<div class="block-image pull-left">
										<a href="product-details.html"><img src="images/block-cat/block-3.jpg" alt="" /></a>
									</div>
									<div class="category-info">
										<h3><a href="product-details.html">Pellentesque habitant</a></h3>
										<p>Nunc facilisis sagittis ullamcorper...</p>
										<div class="cat-price">$80.00 <span class="old-price">$110.00</span></div>
										<div class="cat-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>								
									</div>
								</div>
								<!-- single block end -->
								<!-- single block start -->
								<div class="single-block">
									<div class="block-image pull-left">
										<a href="product-details.html"><img src="images/block-cat/block-9.jpg" alt="" /></a>
									</div>
									<div class="category-info">
										<h3><a href="product-details.html">Donec non est</a></h3>
										<p>Nunc facilisis sagittis ullamcorper...</p>
										<div class="cat-price">$560.00</div>
										<div class="cat-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>								
									</div>
								</div>
								<!-- single block end -->
							</div>
						</div>
						<!-- block carousel end -->
					</div>
					<!-- featured block end -->
					<!-- featured block start -->
					<div class="col-md-4">
						<!-- block title start -->
						<div class="block-title">
							<h2>On Sales</h2>
						</div>
						<!-- block title end -->
						<!-- block carousel start -->
						<div class="block-carousel">
							<div class="block-content">
								<!-- single block start -->
								<div class="single-block">
									<div class="block-image pull-left">
										<a href="product-details.html"><img src="images/block-cat/block-9.jpg" alt="" /></a>
									</div>
									<div class="category-info">
										<h3><a href="product-details.html">Voluptas nulla</a></h3>
										<p>Nunc facilisis sagittis ullamcorper...</p>
										<div class="cat-price">$99.00 <span class="old-price">$111.00</span></div>
										<div class="cat-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>								
									</div>
								</div>
								<!-- single block end -->
								<!-- single block start -->
								<div class="single-block">
									<div class="block-image pull-left">
										<a href="product-details.html"><img src="images/block-cat/block-10.jpg" alt="" /></a>
									</div>
									<div class="category-info">
										<h3><a href="product-details.html">Cras neque metus</a></h3>
										<p>Nunc facilisis sagittis ullamcorper...</p>
										<div class="cat-price">$235.00</div>
										<div class="cat-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>								
									</div>
								</div>
								<!-- single block end -->
							</div>
							<div class="block-content">
								<!-- single block start -->
								<div class="single-block">
									<div class="block-image pull-left">
										<a href="product-details.html"><img src="images/block-cat/block-7.jpg" alt="" /></a>
									</div>
									<div class="category-info">
										<h3><a href="product-details.html">Donec ac tempus</a></h3>
										<p>Nunc facilisis sagittis ullamcorper...</p>
										<div class="cat-price">$235.00 <span class="old-price">$333.00</span></div>
										<div class="cat-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>								
									</div>
								</div>
								<!-- single block end -->
								<!-- single block start -->
								<div class="single-block">
									<div class="block-image pull-left">
										<a href="product-details.html"><img src="images/block-cat/block-8.jpg" alt="" /></a>
									</div>
									<div class="category-info">
										<h3><a href="product-details.html">Primis in faucibus</a></h3>
										<p>Nunc facilisis sagittis ullamcorper...</p>
										<div class="cat-price">$205.00</div>
										<div class="cat-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>								
									</div>
								</div>
								<!-- single block end -->
							</div>
							<div class="block-content">
								<!-- single block start -->
								<div class="single-block">
									<div class="block-image pull-left">
										<a href="product-details.html"><img src="images/block-cat/block-11.jpg" alt="" /></a>
									</div>
									<div class="category-info">
										<h3><a href="product-details.html">Occaecati cupiditate</a></h3>
										<p>Nunc facilisis sagittis ullamcorper...</p>
										<div class="cat-price">$105.00 <span class="old-price">$111.00</span></div>
										<div class="cat-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>								
									</div>
								</div>
								<!-- single block end -->
								<!-- single block start -->
								<div class="single-block">
									<div class="block-image pull-left">
										<a href="product-details.html"><img src="images/block-cat/block-12.jpg" alt="" /></a>
									</div>
									<div class="category-info">
										<h3><a href="product-details.html">Accumsan elit</a></h3>
										<p>Nunc facilisis sagittis ullamcorper...</p>
										<div class="cat-price">$165.00</div>
										<div class="cat-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>								
									</div>
								</div>
								<!-- single block end -->
							</div>
							<div class="block-content">
								<!-- single block start -->
								<div class="single-block">
									<div class="block-image pull-left">
										<a href="product-details.html"><img src="images/block-cat/block-13.jpg" alt="" /></a>
									</div>
									<div class="category-info">
										<h3><a href="product-details.html">Pellentesque habitant</a></h3>
										<p>Nunc facilisis sagittis ullamcorper...</p>
										<div class="cat-price">$80.00 <span class="old-price">$110.00</span></div>
										<div class="cat-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>								
									</div>
								</div>
								<!-- single block end -->
								<!-- single block start -->
								<div class="single-block">
									<div class="block-image pull-left">
										<a href="product-details.html"><img src="images/block-cat/block-14.jpg" alt="" /></a>
									</div>
									<div class="category-info">
										<h3><a href="product-details.html">Donec non est</a></h3>
										<p>Nunc facilisis sagittis ullamcorper...</p>
										<div class="cat-price">$560.00</div>
										<div class="cat-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>								
									</div>
								</div>
								<!-- single block end -->
							</div>
						</div>
						<!-- block carousel end -->
					</div>
					<!-- featured block end -->
					<!-- featured block start -->
					<div class="col-md-4">
						<!-- block title start -->
						<div class="block-title">
							<h2>Populers</h2>
						</div>
						<!-- block title end -->
						<!-- block carousel start -->
						<div class="block-carousel">
							<div class="block-content">
								<!-- single block start -->
								<div class="single-block">
									<div class="block-image pull-left">
										<a href="product-details.html"><img src="images/block-cat/block-13.jpg" alt="" /></a>
									</div>
									<div class="category-info">
										<h3><a href="product-details.html">Voluptas nulla</a></h3>
										<p>Nunc facilisis sagittis ullamcorper...</p>
										<div class="cat-price">$99.00 <span class="old-price">$111.00</span></div>
										<div class="cat-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>								
									</div>
								</div>
								<!-- single block end -->
								<!-- single block start -->
								<div class="single-block">
									<div class="block-image pull-left">
										<a href="product-details.html"><img src="images/block-cat/block-14.jpg" alt="" /></a>
									</div>
									<div class="category-info">
										<h3><a href="product-details.html">Cras neque metus</a></h3>
										<p>Nunc facilisis sagittis ullamcorper...</p>
										<div class="cat-price">$235.00</div>
										<div class="cat-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>								
									</div>
								</div>
								<!-- single block end -->
							</div>
							<div class="block-content">
								<!-- single block start -->
								<div class="single-block">
									<div class="block-image pull-left">
										<a href="product-details.html"><img src="images/block-cat/block-11.jpg" alt="" /></a>
									</div>
									<div class="category-info">
										<h3><a href="product-details.html">Donec ac tempus</a></h3>
										<p>Nunc facilisis sagittis ullamcorper...</p>
										<div class="cat-price">$235.00 <span class="old-price">$333.00</span></div>
										<div class="cat-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>								
									</div>
								</div>
								<!-- single block end -->
								<!-- single block start -->
								<div class="single-block">
									<div class="block-image pull-left">
										<a href="product-details.html"><img src="images/block-cat/block-12.jpg" alt="" /></a>
									</div>
									<div class="category-info">
										<h3><a href="product-details.html">Primis in faucibus</a></h3>
										<p>Nunc facilisis sagittis ullamcorper...</p>
										<div class="cat-price">$205.00</div>
										<div class="cat-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>								
									</div>
								</div>
								<!-- single block end -->
							</div>
							<div class="block-content">
								<!-- single block start -->
								<div class="single-block">
									<div class="block-image pull-left">
										<a href="product-details.html"><img src="images/block-cat/block-4.jpg" alt="" /></a>
									</div>
									<div class="category-info">
										<h3><a href="product-details.html">Occaecati cupiditate</a></h3>
										<p>Nunc facilisis sagittis ullamcorper...</p>
										<div class="cat-price">$105.00 <span class="old-price">$111.00</span></div>
										<div class="cat-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>								
									</div>
								</div>
								<!-- single block end -->
								<!-- single block start -->
								<div class="single-block">
									<div class="block-image pull-left">
										<a href="product-details.html"><img src="images/block-cat/block-9.jpg" alt="" /></a>
									</div>
									<div class="category-info">
										<h3><a href="product-details.html">Accumsan elit</a></h3>
										<p>Nunc facilisis sagittis ullamcorper...</p>
										<div class="cat-price">$165.00</div>
										<div class="cat-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>								
									</div>
								</div>
								<!-- single block end -->
							</div>
							<div class="block-content">
								<!-- single block start -->
								<div class="single-block">
									<div class="block-image pull-left">
										<a href="product-details.html"><img src="images/block-cat/block-7.jpg" alt="" /></a>
									</div>
									<div class="category-info">
										<h3><a href="product-details.html">Pellentesque habitant</a></h3>
										<p>Nunc facilisis sagittis ullamcorper...</p>
										<div class="cat-price">$80.00 <span class="old-price">$110.00</span></div>
										<div class="cat-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>								
									</div>
								</div>
								<!-- single block end -->
								<!-- single block start -->
								<div class="single-block">
									<div class="block-image pull-left">
										<a href="product-details.html"><img src="images/block-cat/block-3.jpg" alt="" /></a>
									</div>
									<div class="category-info">
										<h3><a href="product-details.html">Donec non est</a></h3>
										<p>Nunc facilisis sagittis ullamcorper...</p>
										<div class="cat-price">$560.00</div>
										<div class="cat-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>								
									</div>
								</div>
								<!-- single block end -->
							</div>
						</div>
						<!-- block carousel end -->
					</div>
					<!-- featured block end -->
				</div>
			</div>
		</div>
		<!-- block category area end -->
		<!-- testimonial area start -->
		<div class="testimonial-area lap-ruffel">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="crusial-carousel">
							<div class="crusial-content">
								<p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
								<span>BootExperts</span>
							</div>
							<div class="crusial-content">
								<p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
								<span>Lavoro Store!</span>
							</div>
							<div class="crusial-content">
								<p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
								<span>MR Selim Rana</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- testimonial area end -->
		<!-- Brand Logo Area Start -->
		<div class="brand-area">
			<div class="container">
				<div class="row">
					<div class="brand-carousel">
						<div class="brand-item"><a href="#"><img src="images/brand/bg1-brand.jpg" alt="" /></a></div>
						<div class="brand-item"><a href="#"><img src="images/brand/bg2-brand.jpg" alt="" /></a></div>
						<div class="brand-item"><a href="#"><img src="images/brand/bg3-brand.jpg" alt="" /></a></div>
						<div class="brand-item"><a href="#"><img src="images/brand/bg4-brand.jpg" alt="" /></a></div>
						<div class="brand-item"><a href="#"><img src="images/brand/bg5-brand.jpg" alt="" /></a></div>
						<div class="brand-item"><a href="#"><img src="images/brand/bg2-brand.jpg" alt="" /></a></div>
						<div class="brand-item"><a href="#"><img src="images/brand/bg3-brand.jpg" alt="" /></a></div>
						<div class="brand-item"><a href="#"><img src="images/brand/bg4-brand.jpg" alt="" /></a></div>
					</div>
				</div>
			</div>
		</div>
		<!-- Brand Logo Area End -->
		<!-- FOOTER START -->
		<footer>
			<!-- top footer area start -->
			<div class="top-footer-area">
				@include('layout.footer')
			</div>
			<!-- footer address area end -->
		</footer>
		<!-- FOOTER END -->
		
		<!-- JS -->


        <!-- jquery-1.11.3.min js
        	============================================ -->         
        	<script src="https://code.jquery.com/jquery-2.2.4.js"
        	integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
        	crossorigin="anonymous"></script>
 		<!-- bootstrap js
 			============================================ -->         
 			<script src="js/bootstrap.min.js"></script>

		<!-- Nivo slider js
			============================================ --> 		
			<script src="custom-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
			<script src="custom-slider/home.js" type="text/javascript"></script>

   		<!-- owl.carousel.min js
   			============================================ -->       
   			<script src="js/owl.carousel.min.js"></script>

		<!-- jquery scrollUp js 
			============================================ -->
			<script src="js/jquery.scrollUp.min.js"></script>

		<!-- price-slider js
			============================================ --> 
			<script src="js/price-slider.js"></script>

		<!-- elevateZoom js 
			============================================ -->
			<script src="js/jquery.elevateZoom-3.0.8.min.js"></script>

		<!-- jquery.bxslider.min.js
			============================================ -->       
			<script src="js/jquery.bxslider.min.js"></script>

		<!-- mobile menu js
			============================================ -->  
			<script src="js/jquery.meanmenu.js"></script>	

   		<!-- wow js
   			============================================ -->       
   			<script src="js/wow.js"></script>

        <!-- gmap js
        	============================================ -->       
        	<script src="js/gmap.js"></script>

   		<!-- plugins js
   			============================================ -->         
   			<script src="js/plugins.js"></script>

   		<!-- main js
   			============================================ -->           
   			<script src="js/main.js"></script>
        <script src="js/toastr.min.js"></script>
     



            @if(session('thongbao'))
            <script type="text/javascript">
                toastr.success('{{session('thongbao')}}', 'Thông Báo', {timeOut: 3000});
            </script>
            @endif


            @if(session('loi'))
            <script type="text/javascript">
                toastr.error('{{session('loi')}}', 'Thông Báo Lỗi', {timeOut: 3000});
            </script>
            @endif
        <!-- menu header fix top
        	============================================ -->   
        	<script type="text/javascript">
        		window.addEventListener("scroll", function(){
        			var header = document.querySelector("header");
        			header.classList.toggle("addfixtop", window.scrollY > 0);
        		})
        	</script>
        </body>
        </html>