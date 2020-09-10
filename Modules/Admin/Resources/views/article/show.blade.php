@extends('admin::layouts.master')
@section('title')
Chi Tiết Bài Viết
@endsection
@section('content')

<div class="">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Trang Chủ</a></li>
			<li class="breadcrumb-item"><a href="{{ route('admin.article.list')}}">Quản Lý Bài Viết</a></li>
			<li class="breadcrumb-item active" aria-current="page">Chi Tiết Bài Viết</li>
		</ol>
	</nav>
</div>
<div class="form-w3layouts">
	<!-- page start-->

	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Chi Tiết Bài Viết
				</header>
				<div class="panel-body">
						<div class="row">
							<div class="col-md-4">
								<img src="{{ $articles['avatar']}}" alt="" style="width: 310px">
							</div>
							<div class="col-md-8">
								<div class="title" style="text-transform:uppercase;font-size:25px;font-weight:600;">
									{{ $articles['title']}}
									
								</div>
								<div class="description">
									
									{!! $articles['description'] !!}
								</div>
							</div>
							<div class="col-md-12" style="margin-top: 10px">{!! $articles['content'] !!}</div>
						</div>
				</div>
			</section>
		</div>
	</div>
	
	@endsection