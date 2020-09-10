@extends('layout.master')
@section('title')
{{ $article_byID->title}}
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
								<li class="category3"><span>Tin Tức</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="noidung">
			<div class="container"  style="border-radius: 1px solid gray;">
				<div class="row">
					<div class="col-sm-7">
						<h4 style="margin-top: 15px;line-height: 25px;">{{  $article_byID->title }}</h4>
						<div class="noidung-chinh">
							<p>{!! $article_byID->content !!}</p>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection