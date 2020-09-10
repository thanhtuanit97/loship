@extends('layout.master')
@section('title')
Đăng Ký
@endsection
@section('content')
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
								<li class="category3"><span>Đăng Ký Tài Khoản</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- account-details Area Start -->
		<div class="customer-login-area" >
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-xs-12" style="margin-left: 22em;">
						<div class="customer-register my-account">
							<form method="post" class="register" action="{{ route('user.register')}}">
								@csrf
								<div class="form-fields">
									<h2>Đăng Ký Tài Khoản</h2>
									<p class="form-row form-row-wide">
										<label for="name">Họ Tên : <span class="required">*</span></label>
										<input type="text" class="input-text" name="name" id="name" value="">
										<span style="color: red; font-weight: 600;; font-style: italic;">{{ $errors->first('name') }}</span>
									</p>
									<p class="form-row form-row-wide">
										<label for="address">Địa Chỉ :<span class="required">*</span></label>
										<input type="text" class="input-text" name="address" id="address">
										<span style="color: red; font-weight: 600;; font-style: italic;">{{ $errors->first('address') }}</span>
									</p>
									<p class="form-row form-row-wide">
										<label for="phone">Số Điện Thoại : <span class="required">*</span></label>
										<input type="text" class="input-text" name="phone" id="phone">
										<span style="color: red; font-weight: 600;; font-style: italic;">{{ $errors->first('phone') }}</span>
									</p>
									<p class="form-row form-row-wide">
										<label for="email">Email : <span class="required">*</span></label>
										<input type="email" class="input-text" name="email" id="email">
										<span style="color: red; font-weight: 600;; font-style: italic;">{{ $errors->first('email') }}</span>
									</p>
									<p class="form-row form-row-wide">
										<label for="password">Mật Khẩu : <span class="required">*</span></label>
										<input type="password" class="input-text" name="password" id="password">
										<span style="color: red; font-weight: 600;; font-style: italic;">{{ $errors->first('password') }}</span>
									</p>
									
								</div>
								<div class="form-action">
									<div class="actions-log">
										<input type="submit" class="button" name="register" value="Đăng Ký">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
