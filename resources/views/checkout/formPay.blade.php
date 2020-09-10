@extends('layout.master')
@section('title')
Thanh Toán | LoShip
@endsection
@section('content')
</div>
<!-- breadcrumbs area start -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="container-inner">
							<ul>
								<li class="home">
									<a href="{{ route('home.index') }}">Trang Chủ</a>
									<span><i class="fa fa-angle-right"></i></span>
								</li>
								<li class="home">
									<a href="{{ route('cart.index') }}">Giỏ Hàng</a>
									<span><i class="fa fa-angle-right"></i></span>
								</li>
								
								<li class="category3"><span>Thanh Toán</span></li>
							</ul>
						</div>
					</div>
					{{-- <div class="col-md-12">
						<div class="area-title" style="margin-top: 35px;">
        					<h2>Giỏ Hàng Của Bạn</h2>
        				</div>
					</div> --}}
				</div>
			</div>
		</div>
		
		<!-- breadcrumbs area end -->
		<div class="container wrapper">
            <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
             
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div>    
            <div class="row cart-body">
                <?php  $content = Cart::content(); 
                                    $total = 0;
                            ?>
                <form class="form-horizontal" method="POST" action="{{ route('order-place')}}">
                    @csrf
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Xem Lại Đơn Hàng <div class="pull-right"><small><a class="afix-1" href="{{ route('cart.index')}}">Chỉnh Sửa Đơn Hàng ( Nếu Cần)</a></small></div>
                        </div>
                        <div class="panel-body">

                        	<?php  $content = Cart::content(); 
                        			$total = 0;
                        	?>
                        	@foreach($content as $key=>$value)
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="{{ pare_url_file($value->options->image)}}" />
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12">{{ $value->name}}</div>
                                    <div class="col-xs-12"><small>Số Lượng :<span>{{ $value->qty}}</span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6><span>{{ number_format($value->price) }}</span>đ</h6>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>

                            <?php $subtotal =  $value->qty * $value->price ;
                            	  $total += $subtotal;

                            ?>
                            @endforeach
                            
                           
                           {{--  <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Subtotal</strong>
                                    <div class="pull-right"><span>$</span><span>200.00</span></div>
                                </div>
                                <div class="col-xs-12">
                                    <small>Shipping</small>
                                    <div class="pull-right"><span>-</span></div>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div> --}}
                            <div class="form-group">

                            @php  
                                $coupon_number=0;
                                $total_sum=0;
                                $number='';
                                $coupon_id = 0;
                                if( Session::get('coupon') ){
                                    // dd(Session::get('coupon'));
                                    foreach( Session::get('coupon') as $cou ){
                                        if( $cou['condition'] == 1 ){
                                            $coupon_id = $cou['id'];
                                            $coupon_number = $cou['number'];
                                            $number =  $coupon_number. ' %';

                                            $total_sum = $total-( $total*$cou['number'] )/100;
                                            // dd($total_sum);
                                        }
                                        else if ($cou['condition'] == 0 ){
                                            $coupon_id = $cou['id'];
                                            $coupon_number = $cou['number'];
                                            $number = number_format($coupon_number).'đ';
                                            $total_sum = $total-$coupon_number;
                                        }
                                    }
                                }else{
                                    $total_sum = $total ;
                                }
                                
                            @endphp
                                 <div class="col-xs-12">
                                    <strong>Số Tiền Được Giảm :</strong>
                                    <div class="pull-right"><span>
                                        @if(!$number)
                                            0đ
                                        @else
                                           
                                                {{ $number}}
                                                
                                            
                                        @endif
                                        
                                    </span></div>
                                    <input type="hidden" name="coupon_id" value="{{$coupon_id}}">
                                </div>
                                <div class="col-xs-12">
                                    <strong>Tổng Tiền Thanh Toán</strong>
                                    <div class="pull-right"><span name="total">
                                            @if(!$number)
                                          {{number_format($total)}}đ
                                            @else
                                                {{number_format($total_sum)}} đ
                                        
                                            @endif
                                    </span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Thông Tin Khách Hàng</div>
                        <div class="panel-body">
	                            {{-- <div class="form-group">
	                                <div class="col-md-12">
	                                    <h4>Shipping Address</h4>
	                                </div>
	                            </div> --}}
                            <div class="form-group">
                                <div class="col-md-12"><strong>Họ Tên :</strong></div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="name" value="{{get_data_user('web', 'name')}}" />
                                    <span style="color: red; font-weight: 600;font-style: italic;">{{ $errors->first('name')}}</span>
                                </div>
                            </div>
                          
                            <div class="form-group">
                                <div class="col-md-12"><strong>Địa Chỉ :</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="{{get_data_user('web', 'address')}}" />
                                     <span style="color: red; font-weight: 600;font-style: italic;">{{ $errors->first('address')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Số Điện Thoại :</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="phone" class="form-control" value="{{get_data_user('web', 'phone')}}" />
                                     <span style="color: red; font-weight: 600;font-style: italic;">{{ $errors->first('phone')}}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12"><strong>Ghi Chú ( Nếu Có ) :</strong></div>
                                <div class="col-md-12">
                                    <textarea name="note" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                                    @if( Session::get('coupon') )

                                    <input type="hidden" name="order_total" value="{{$total_sum}}">
                                    @else
                                     <input type="hidden" name="order_total" value="{{$total}}">
                                    @endif
                            <div class="form-group">
                                
                                <div class="col-md-12">

                                    @if($content->count()!=0)
                                    <button type="submit" class="pull-right payorder" style="border: none;padding: 5px 15px;color: #fff;background-color: #00c3ff;">THANH TOÁN</button>
                                    @endif
                                </div>
                            </div>
                           
                           
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                    <!--CREDIT CART PAYMENT-->
                   {{--  <div class="panel panel-info">
                        <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12"><strong>Card Type:</strong></div>
                                <div class="col-md-12">
                                    <select id="CreditCardType" name="CreditCardType" class="form-control">
                                        <option value="5">Visa</option>
                                        <option value="6">MasterCard</option>
                                        <option value="7">American Express</option>
                                        <option value="8">Discover</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Credit Card Number:</strong></div>
                                <div class="col-md-12"><input type="text" class="form-control" name="car_number" value="" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Card CVV:</strong></div>
                                <div class="col-md-12"><input type="text" class="form-control" name="car_code" value="" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>Expiration Date</strong>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="">
                                        <option value="">Month</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="">
                                        <option value="">Year</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <span>Pay secure using your credit card.</span>
                                </div>
                                <div class="col-md-12">
                                    <ul class="cards">
                                        <li class="visa hand">Visa</li>
                                        <li class="mastercard hand">MasterCard</li>
                                        <li class="amex hand">Amex</li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-submit-fix">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!--CREDIT CART PAYMENT END-->
                </div>
                
                </form>
            </div>
            <div class="row cart-footer">
        
            </div>
    </div>
@endsection
