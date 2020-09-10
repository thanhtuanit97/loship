@extends('admin::layouts.master')
@section('title')
Chi Tiết Đơn Hàng
@endsection
@section('content')

<div class="">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Trang Chủ</a></li>
			<li class="breadcrumb-item"><a href="{{ route('admin.order.list')}}">Quản Lý Đơn Hàng</a></li>
			<li class="breadcrumb-item active" aria-current="page">Chi Tiết Đơn Hàng</li>
		</ol>
	</nav>
</div>
<div class="form-w3layouts">
	<!-- page start-->

	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Chi Tiết Đơn Hàng
				</header>
				<div class="panel-body">
					<div class="container wrapper" style="margin-top: 0">
			            <div class="row cart-head">
			                <div class="container">
			              
			               
			                <div class="row">
			                    <p></p>
			                </div>
			                </div>
			            </div>    
			            <div class="row cart-body">
			                <form class="form-horizontal" method="post" action="">
			                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
			                    <!--REVIEW ORDER-->
			                    <div class="panel panel-info">
			                        <div class="panel-heading">
			                            Chi Tiết Đơn Hàng <div class="pull-right"><small><a class="afix-1" href="#">In Đơn Hàng</a></small></div>
			                        </div>
			                        <div class="panel-body">
										<?php $total = 0; ?>
			                        	@foreach($list_orderDetails as $orderDetails)
				                            <div class="form-group">
				                                <div class="col-sm-3 col-xs-3">
				                                    <img class="img-responsive" src="{{pare_url_file($orderDetails['product']['avatar'])}}" />
				                                </div>
				                                <div class="col-sm-6 col-xs-6">
				                                    <div class="col-xs-12"> {{ $orderDetails['product']['name']}}:</div>
				                                    <div class="col-xs-12"><small>Số Lượng x <span>{{ $orderDetails['quantity']}}</span></small></div>
				                                </div>
				                                <div class="col-sm-3 col-xs-3 text-right">
				                                    <h6>{{ number_format($orderDetails['price']).'đ' }}</h6>
				                                </div>
					                                <?php 
						                            	
						                            	$subtotal =  $orderDetails['quantity'] * $orderDetails['price'];
						                            	$total += $subtotal;
					                            	?>
				                            </div>
			                            <div class="form-group"><hr /></div>
			                            @endforeach

			                            <div class="form-group">
			                            	<!-- Lấy mã giảm giá để tính số tiền giảm -->
			                            	<?php 
			                            	$coupon_id = $list_orderInfor->coupon_id;
			                            	if($coupon_id > 0) {
			                            		$coupon_number = $list_orderInfor->coupon->number;
			                            		$coupon_condition = $list_orderInfor->coupon->condition;
			                            	}
			                            	?>  <div class="col-xs-12">
			                                    <strong>Tổng Tiền :</strong>
			                                    <div class="pull-right"><span>{{ number_format($total).'đ' }}</span></div>
			                                </div>
			                                <div class="col-xs-12">
			                                    <strong>Số Tiền Được Giảm : (Nếu Có)</strong>
			                                    <!-- Tính tiền giảm giá -->
					                            	 @if($coupon_id > 0)
					                                     <div class="pull-right"><span></span><span>
					                                     	
					                                     	@if( $coupon_condition == 0)
					                                     	{{ number_format($coupon_number).'đ'}}
					                                     	@else
					                                     	{{ $coupon_number.'%'}}
					                                     	@endif
					                                     </span></div>
					                                 @else
					                                 	 <div class="pull-right"><span></span><span>0đ</span></div>
					                                 @endif
			                                </div>
			                                <div class="col-xs-12">
			                                    <strong>Tổng Tiền Thanh Toán :</strong>
			                                    <div class="pull-right"><span></span><span>{{ number_format($list_orderInfor->order_total).'đ' }}</span></div>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                
			                    <!--REVIEW ORDER END-->
			                </div>
			                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
			                    <!--SHIPPING METHOD-->
			                    <div class="panel panel-info">
			                        <div class="panel-heading">Thông tin khách hàng</div>
			                        <div class="panel-body">
			                            <div class="form-group">
			                                <div class="col-md-12"><strong>Họ Tên Người Nhận :</strong></div>
			                                <div class="col-md-12">
			                                    <input type="text" class="form-control" name="name" value="{{ $list_orderInfor['user_name']}}" disabled="" />
			                                </div>
			                            </div>
			                            <div class="form-group">
			                                <div class="col-md-12"><strong>Địa Chỉ :</strong></div>
			                                <div class="col-md-12">
			                                    <input type="text" name="address" class="form-control" value="{{ $list_orderInfor['address']}}" disabled="" />
			                                </div>
			                            </div>
			                            <div class="form-group">
			                                <div class="col-md-12"><strong>Số Điện Thoại :</strong></div>
			                                <div class="col-md-12">
			                                    <input type="text" name="phone" class="form-control" value="{{ $list_orderInfor['phone']}}" disabled="" />
			                                </div>
			                            </div>
			                            <div class="form-group">
			                                <div class="col-md-12"><strong>Ghi Chú Đơn Hàng ( nếu có ):</strong></div>
			                                <div class="col-md-12">
			                                    <textarea name="note" cols="30" rows="4" class="form-control" disabled="">{{ $list_orderInfor['note']}}</textarea>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                    <!--SHIPPING METHOD END-->  
			                </div>
			                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  ">
			                 	
			                    <!--SHIPPING METHOD-->
			                    <div class="panel panel-info">
			                        <div class="panel-heading">Tình Trạng Đơn Hàng</div>
			                        <div class="accec" style="width: 10%;margin-left: 10px;margin-top: 10px;">
			                 		 <select class="form-control" id="xlydonhang" data-id="{{ $list_orderInfor['id']}}">
				                          <option value="" selected disabled>--Xử Lý--</option>
				                          <option value="0">Đơn Mới</option>
				                          <option value="1">Đã Xử Lý</option>
				                          <option value="2">Đang Giao</option>
				                          <option value="3">Đã Giao</option>
				                          <option value="4">Hủy Đơn</option>
			                        </select>
			                 	</div>
			                        <div class="breadcrumbss">
			                        <?php if($list_orderInfor['status'] == 0) { ?>
			                        	<a class="breadcrumb__step breadcrumb__step--active" >Đơn mới</a>
			                        	<a class="breadcrumb__step " >Đã Xử Lý</a>
			                        	<a class="breadcrumb__step" >Đang Giao</a>
			                        	<a class="breadcrumb__step" >Đã Giao Hàng</a>
			                        <?php } else if($list_orderInfor['status'] == 1) {?>
			                        	<a class="breadcrumb__step " >Đơn mới</a>
			                        	<a class="breadcrumb__step breadcrumb__step--active" >Đã Xử Lý</a>
			                        	<a class="breadcrumb__step" >Đang Giao</a>
			                        	<a class="breadcrumb__step" >Đã Giao Hàng</a>
			                         <?php } else if($list_orderInfor['status'] == 2) {?>
			                        	<a class="breadcrumb__step " >Đơn mới</a>
			                        	<a class="breadcrumb__step " >Đã Xử Lý</a>
			                        	<a class="breadcrumb__step breadcrumb__step--active" >Đang Giao</a>
			                        	<a class="breadcrumb__step" >Đã Giao Hàng</a>
			                        <?php } else if($list_orderInfor['status'] == 3) {?>
			                        	a class="breadcrumb__step " >Đơn mới</a>
			                        	<a class="breadcrumb__step " >Đã Xử Lý</a>
			                        	<a class="breadcrumb__step " >Đang Giao</a>
			                        	<a class="breadcrumb__step breadcrumb__step--active" >Đã Giao Hàng</a>
			                        <?php }?>

			                        </div>
			                    </div>
			                    <!--SHIPPING METHOD END-->  
			                </div>
			                </form>
			            </div>
			            <div class="row cart-footer">
			        
			            </div>
    				</div>
				</div>
			</section>
		</div>
	</div>
	
	@endsection