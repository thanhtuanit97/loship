(function ($) {
 "use strict";
	/*-------------------------------------------
	scrollUp
	-------------------------------------------- */	
	jQuery.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });
	/*-------------------------------------------
	mobile menu
	-------------------------------------------- */
	$('.mobile-menu').meanmenu();	
	/*--------------------------
	 features-curosel
	----------------------------*/
	$(".features-curosel").owlCarousel({
		autoPlay: false, 
		slideSpeed:2000,
		items : 4,
		pagination:false,
		navigation:true,
		navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		itemsDesktop : [1199,4],
		itemsDesktopSmall : [979,3],
		itemsMobile : [767,1],
		rewindNav : false,
		lazyLoad : true
	});
	
	$(".featuresthree-curosel").owlCarousel({
		autoPlay: false, 
		slideSpeed:2000,
		items : 3,
		pagination:false,
		navigation:true,
		navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [979,2],
		itemsMobile : [767,1],
		rewindNav : false,
		lazyLoad : true
	});
	
	$(".block-carousel").owlCarousel({
		autoPlay: false, 
		slideSpeed:2000,
		items : 1,
		pagination:false,
		navigation:false,
		navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
        itemsDesktop : [1200,1],
        itemsTablet : [991,2],
        itemsTabletSmall : [767,1],
        itemsMobile : [480,1],
		rewindNav : false,
		lazyLoad : true
	});
	
	$(".crusial-carousel").owlCarousel({
		autoPlay: false, 
		slideSpeed:2000,
		items : 1,
		pagination:true,
		navigation:false,
		navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		itemsDesktop : [1199,1],
		itemsDesktopSmall : [979,1],
		itemsMobile : [767,1],
		rewindNav : false,
		lazyLoad : true
	});
	
	$(".utmost-carousel").owlCarousel({
		autoPlay: false, 
		slideSpeed:2000,
		items : 2,
		pagination:false,
		navigation:true,
		navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		itemsDesktop : [1199,2],
		itemsDesktopSmall : [979,1],
		itemsMobile : [767,1],
		rewindNav : false,
		lazyLoad : true
	});
	
	$(".brand-carousel").owlCarousel({
		autoPlay: false, 
		slideSpeed:2000,
		items : 5,
		pagination:false,
		navigation:false,
		navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		itemsDesktop : [1199,5],
		itemsDesktopSmall : [979,4],
		itemsMobile : [767,2],
		rewindNav : false,
		lazyLoad : true
	});
	
	/*---------------------------------------
	home 2 left category menu
	----------------------------------------- */	
	$('.category-heading').on( "click", function(){
		$('.category-menu-list').slideToggle(300);
	});
	/*-------------------------------------------
	countdown
	-------------------------------------------- */	
	$('[data-countdown]').each(function() {
	  var $this = $(this), finalDate = $(this).data('countdown');
	  $this.countdown(finalDate, function(event) {
		$this.html(event.strftime('<span class="cdown years"><span class="time-count">%-Y</span> <p>Years</p></span> <span class="cdown days"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hour</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>Min</p></span> <span class="cdown second"> <span class="time-count">%S</span> <p>Sec</p></span>'));
	  });
	});
	/*-------------------------------------------
	price range slider
	-------------------------------------------- */		  
		$( "#slider-range" ).slider({
			range: true,
			min: 40,
			max: 600,
			values: [ 60, 570 ],
		slide: function( event, ui ) {
			$( "#amount" ).val( "£" + ui.values[ 0 ] + " - £" + ui.values[ 1 ] );
			}
		});
		$( "#amount" ).val( "£" + $( "#slider-range" ).slider( "values", 0 ) +
			" - £" + $( "#slider-range" ).slider( "values", 1 ) );
	/*-------------------------------------------
	elevateZoom
	-------------------------------------------- */	
	$("#zoom1").elevateZoom({
		gallery:'gallery_01', 
		cursor: 'pointer', 
		galleryActiveClass: "active", 
		imageCrossfade: true
	});
	/*-------------------------------------------
	bxSlider
	-------------------------------------------- */	
	$('.bxslider').bxSlider({
		slideWidth: 80,
		slideMargin:15,
		minSlides: 3,
		maxSlides: 4,
		pager: false,
		speed: 500,
		pause: 3000,
		adaptiveHeight: false
	});
})(jQuery);

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//danh gia san pham
$(function(){
		//lấy ion star về
		let listStar = $(".list_start .fa");
		//khai báo một list các nội dung text
		list_raiting_text = {
				1 : 'Không Thích',
				2 : 'Tạm Được',
				3 : 'Bình Thường',
				4 : 'Rất Tốt',
				5 : 'Tuyệt Vời Quá',
			};
		//ap dụng sự kiện cho listStar
		listStar.mouseover(function(event) {
			/* Act on the event */
			//lay giá trị của từng sao về
			let number = $(this).attr('data-key');
			//khi mouse phải xóa class của nó đi
			listStar.removeClass('rating_active');
			//gán giá trị number cho trường rating
			$('.number_rating').val(number);
			//lặp listStar để bắt sự kiện mouse và add class vào ngôi sao theo key đã được lấy về 
				$.each(listStar,function(key, value) {
					if( key +1 <= number) // key+1 là vì vòng lặp từ index = 0, mà giá trị sao mình lặp từ 1.
					{
						$(this).addClass('rating_active');//add class
					}
					});
			//show nội dụng tương thích với giá trị của mỗi sao.
			$(".list_text").text('').text(list_raiting_text[number]).show();

		});

		$('.js_raiting_action').click(function(event) {
			/* Act on the event */
			event.preventDefault();
			if( $(".form-rating").hasClass('hide'))
			{
				$(".form-rating").addClass('active').removeClass('hide');
			} else
			{
				$(".form-rating").addClass('hide').removeClass('active');
			}
		});
	
		$('.js_rating_product').click(function(event) {
			/* Act on the event */
			event.preventDefault();
			let content = $('#ra_content').val();
			let number = $('.number_rating').val();
			let url = $(this).attr('href');
			
			if( content && number)
			{
				$.ajax({
					url: url,
					type: 'POST',
					data: {
						content : content ,
						number : number
					},
				})
				.done(function(result) {
					if(result.success == 1)
					{
						alert("Gửi Đánh Giá Thành Công.")
						location.reload();
					}
					console.log(result);
				});
				
			}
		});

		
	});


//bat su kien submit form loc san pham 

	$('.orderby').change(function(event) {
		/* Act on the event */
		$('#form-order').submit();
	});

//lưu sản phẩm vừa xem xuống local storage
$(function() {
	//lay id san pham
	let productID = $('#content_product').attr('data-id');
	//lay  gia tri trong storage
	let products = localStorage.getItem('products');
	console.log(productID);
	console.log(products);
if(typeof(productID) !== 'undefined'){
	if(products == null )
	{

		arrayProducts = new Array();
		arrayProducts.push(productID);
		localStorage.setItem('products',JSON.stringify(arrayProducts));
	} else {
		
		//chuyen ve mang
		products = $.parseJSON(products);
		if( products.indexOf(productID) == -1)
		{
			products.push(productID);
			localStorage.setItem('products',JSON.stringify(products));
		}
		console.log(products);
	}
}
});

//hiển thị sản phẩm vừa xem ra trang chủ
$(function(){

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
checkRenderProduct = false;
	$(document).on('scroll',  function() {
		event.preventDefault();
		/* Act on the event */
		
		if($(window).scrollTop() > 150 && checkRenderProduct == false)
		{
			checkRenderProduct = true;
			let products = localStorage.getItem('products');
			products = $.parseJSON(products);
			console.log(products);
			if(products.length > 0)
			{
				$.ajax({
					url: 'ajax/view-san-pham',
					method: "POST",
					data: {id: products},
					success : function(result){
						console.log(result);
						$('#product_view').html('').append(result.data);
					}
				})
				
				
			}
		}
	});
	
})

