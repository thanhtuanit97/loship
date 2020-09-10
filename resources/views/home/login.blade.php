@extends('layout.master')
@section('title')
Đăng Nhập
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
								<li class="category3"><span>Đăng Nhập</span></li>
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
						<div class="customer-login my-account">
							<form action="{{ route('user.login')}}" method="post" class="login">
								@csrf
								<div class="form-fields">
									<h2>Đăng Nhập</h2>
									<p class="form-row form-row-wide">
										<label for="email">Email : <span style="color: red">*</span></label>
										<input type="text" class="input-text" name="email" id="email" value="">
										<span style="color: red; font-weight: 600;font-style: italic;">{{ $errors->first('email')}}</span>
									</p>
									<p class="form-row form-row-wide">
										<label for="password">Mật Khẩu : <span style="color: red" >*</span></label>
										<input class="input-text" type="password" name="password" id="password">
										<span style="color: red; font-weight: 600;font-style: italic;">{{ $errors->first('password')}}</span>
									</p>
								</div>
								<div class="form-action">
									<p class="lost_password"> <a href="#">Quên mật khẩu?</a></p>
									<p class="lost_password" style="margin-left:10px; font-style: italic;"> <a href="{{ route('register')}}">Bạn Chưa Có Tài Khoản?</a></p>
									<div class="actions-log">
										<input type="submit" class="button" name="login" value="Đăng Nhập">
									</div>
									<label for="rememberme" class="inline"> 
									<input name="rememberme" type="checkbox" id="rememberme" value="forever"> Nhớ mật khẩu </label>
								</div>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
@endsection
