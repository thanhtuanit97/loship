<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title','LoShip | TRang Chủ')</title>
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
       {{--  <div class="slider-area an-1 hm-1">
            
				@include('layout.banner')
			
		</div> --}}
        <!-- end home slider -->
		@yield('content')
		
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
               <script src="js/jquery-2.2.4.js"></script>
        
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
        
   		<!-- plugins js
		============================================ -->         
        <script src="js/plugins.js"></script>
        
   		<!-- main js
		============================================ -->           
        <script src="js/main.js"></script>
        <script src="js/toastr.min.js"></script>
       

         <!-- menu header fix top
		============================================ -->   
		<script type="text/javascript">
			window.addEventListener("scroll", function(){
				var header = document.querySelector("header");
				header.classList.toggle("addfixtop", window.scrollY > 0);
			})
		</script>

@if(session('thongbao'))
<script type="text/javascript">
    toastr.success('{{session('thongbao')}}', 'Thông Báo', {timeOut: 3000});
</script>
@endif


@if(session('error'))
<script type="text/javascript">
    toastr.error('{{session('error')}}', 'Thông Báo Lỗi', {timeOut: 3000});
</script>
@endif
    </body>
</html>