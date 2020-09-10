@extends('layout.master')
@section('title')
Giỏ Hàng | LoShip
@endsection
@section('content')
</div>
<!-- breadcrumbs area start -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					{{-- <div class="col-md-12">
						<div class="container-inner">
							<ul>
								<li class="home">
									<a href="{{ route('home.index') }}">Trang Chủ</a>
									<span><i class="fa fa-angle-right"></i></span>
								</li>
								<li class="category3"><span>Giỏ Hàng Của Bạn</span></li>
							</ul>
						</div>
					</div> --}}
					<div class="col-md-12">
						<div class="area-title" style="margin-top: 35px;">
        					<h2>Giỏ Hàng Của Bạn</h2>
        				</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- breadcrumbs area end -->
		<!-- Shopping Table Container -->
		<div class="cart-area-start">
			<div class="container">
				<!-- Shopping Cart Table -->
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<?php 
							$content = Cart::content();
							
							?>
							<table class="cart-table">
								<thead>
									<tr>
										<th>Sản Phẩm</th>
										<th>Tên Sản Phẩm</th>
										
										<th>Giá</th>
										<th>Số Lượng</th>
										<th>Thành Tiền</th>
										<th></th>
									</tr>
								</thead>
								<tbody class="cart-items">
									<?php  $total =0 ?>
									@foreach( $content as $key=>$value)
										<tr class="cart-row">
											<td>
												<a href="#"><img src="{{ pare_url_file($value->options->image)}}" class="img-responsive" alt=""/></a>
											</td>
											<td>
												<h6>{{ $value->name }}</h6>
											</td>
											
											<td>
												<div class="cart-price">{{number_format($value->price)}} đ</div>
											</td>
											<td>
												<form action="{{route('cart.updateQty',$value->rowId)}}" method="post">
													@csrf
													@method('put')
													<input type="number" min="1" maxlength="10" value="{{ $value->qty}}" class="cart_quantity" name="cart_quantity">
													<input type="hidden"  value="{{ $value->rowId}}" name="rowId_cart" class="form-control">
													<input name="product_id_hidden" type="hidden" value="{{$value->id}}">
													<input type="submit" name="update_qty" value="Cập Nhật" class="btn-default btm-sm">
												</form>
											</td>
											<td>
												<div class="cart-subtotal">
													<?php 
														$subtotal = $value->price * $value->qty;
														$total += $subtotal;
														echo number_format($subtotal).'đ';
													?>
													
												</div>
											</td>
											<td>
												<form action="{{route('delete.cart',$value->rowId)}}" method="post">
													@csrf
													@method('delete')
													<button type="submit" class="btn btn-danger" ><i class="fa fa-times"></i></button>
												</form>
											</td>
										</tr>
										@endforeach
									@if($content->count()==0)
									<tr>
										<td colspan="6" style="text-align: center;" ><h4 style="color: red">Giỏ hàng của bạn trống</h4></td>

									</tr>
									@else
									<tr>
										<td class="actions-crt" colspan="7">
											<div class="">
												<div class="col-md-4 col-sm-4 col-xs-4 align-left"><a class="cbtn" href="{{ route('home.index' )}}">Xem Thêm Sản Phẩm</a></div>
												<div class="col-md-4 col-sm-4 col-xs-4 align-center"><a class="cbtn" href="#">Cập Nhật Giỏ Hàng</a></div>
												<div class="col-md-4 col-sm-4 col-xs-4 align-right"><a class="cbtn" href="{{ route('destroyCart')}}">Xóa Toàn Bộ Giỏ Hàng</a></div>
											</div>
										</td>
									</tr>
									@endif
								</tbody>
							</table>
						</div>

					</div>
				</div>
				<!-- Shopping Cart Table -->
				<!-- Shopping Coupon -->
				<div class="row">
					<div class="col-md-12 vendee-clue">
						<!-- Shopping Estimate -->
						{{-- <div class="shipping coupon">
							<h5>Estimate Shipping and Tax</h5>
							<p>Enter your destination to get a shipping estimate.</p>
							<form>
								<div class="shippingTitle"><p><span>*</span>Country</p></div>
								<div class="selectOption">
									<div class="selectParent">
										<select>
											<option value="">Please Select</option>
											<option value="1">Country 1</option>
											<option value="2">Country 2</option>
											<option value="1">Country 3</option>
											<option value="2">Country 4</option>
											<option value="1">Country 5</option>
											<option value="2">Country 6</option>
											<option value="1">Country 7</option>
											<option value="2">Country 8</option>
										</select>
									</div>
								</div>
								
								<div class="shippingTitle"><p>State/Province</p></div>
								<div class="selectOption">
									<div class="selectParent">
										<select>
											<option value="">Please Select</option>
											<option value="1">Region 1</option>
											<option value="2">Region 2</option>
											<option value="1">Region 3</option>
											<option value="2">Region 4</option>
											<option value="1">Region 5</option>
											<option value="2">Region 6</option>
											<option value="1">Region 7</option>
											<option value="2">Region 8</option>
										</select>
									</div>
								</div>
								
								<div class="shippingTitle"><p>Zip/Postal Code</p></div>
								<div class="selectOption">
									<input type="text">
								</div>
								<button type="submit">Get Quotes</button>
							</form>
						</div> --}}
						<div class="col-md-4"></div>
						<!-- Shopping Estimate -->
						<!-- Shopping Code -->
						@if(Cart::count() > 0)
						<div class="shipping coupon hidden-sm">
							<div class=""><h5> Mã Khuyến Mãi</h5></div>
							<p>Vui lòng nhập mã khuyến mãi nếu có.</p>
							<span style="color: red; font-weight: 600">
								
							</span>
							<form action="{{ route('check-coupon')}}" method="POST">
								@csrf
								<input type="text" class="coupon-input" name="couponCode">

								<button class="pull-left" type="submit">Thêm</button>
							</form>
						</div>
						@endif
						<!-- Shopping Code -->
						<!-- Shopping Totals -->
						<div class="shipping coupon cart-totals">

							@php  
								$coupon_number=0;
								$total_sum=0;
								$number='';
								if( Session::get('coupon') ){
									// dd(Session::get('coupon'));
									foreach( Session::get('coupon') as $cou ){
										if( $cou['condition'] == 1 ){
											$coupon_number = $cou['number'];
											$number =  $coupon_number. ' %';

											$total_sum = $total-( $total*$cou['number'] )/100;
											// dd($total_sum);
										}
										else if ($cou['condition'] == 0 ){
											$coupon_number = $cou['number'];
											$number = number_format($coupon_number).'đ';
											$total_sum = $total-$coupon_number;
										}
									}
								}else{
									$total_sum = $total ;
								}
								
							@endphp
							<ul>
								<li class="cartSubT">Thành Tiền :   
										 <span>
											@if(Cart::count()==0)
											0đ
											@else
											<?php 
												echo number_format($total).'đ';
											?>
											@endif
										</span>
								</li>
								<li class="cartSubT">Số Tiền Được Giảm :    
									<span>
										@if(Cart::count()==0)
											0đ
										@else
											@if(!$number)
												0đ
											@else
												{{ $number}}
											@endif
										@endif
										
									</span>
								</li>
								<li class="cartSubT cartSubTotal">Tổng Tiền Thanh Toán :
									     <span>
											@if(Cart::count()==0)
											0đ
											@else
											@if(!$number)
											<?php 
												echo number_format($total).'đ';
											?>
											@else
												{{number_format($total_sum)}} đ
										
											@endif
											@endif
											
										</span>
								</li>
								
							</ul>
						
								<a class="proceedbtn" href="{{ route('check-out')}}">Đặt Hàng</a>
							
							<div class="multiCheckout">
								<a href="#">Thanh toán với nhiều địa chỉ ( Nếu Có )</a>
							</div>
						</div>
						<!-- Shopping Totals -->
					</div>
				</div>
				<!-- Shopping Coupon -->
			</div>	
		</div>
		<!-- Shopping Table Container -->
		{{-- <!-- Delete Modal-->
  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bạn chắc chắn muốn xóa  <span class="title" style="font-style: italic; color: red;"></span> ? </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body" style="margin-left: 183px;">
          <button type="button" class="btn btn-success deletecoupon">Có</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
          <div>
          </div>
        </div>
      </div> --}}
@endsection
