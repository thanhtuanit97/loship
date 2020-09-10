@extends('admin::layouts.master')
@section('title')
  Chi tiết sản phẩm
@endsection
@section('content')
		
<div class="">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.pro.list')}}">Quản Lý Sản Phẩm</a></li>
          <li class="breadcrumb-item active" aria-current="page">Chi Tiết Sản Phẩm</li>
        </ol>
      </nav>
</div>
<div class="form-w3layouts">
	<!-- page start-->

	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Chi Tiết Sản Phẩm
				</header>
				<div class="panel-body">
					<table class="table table-bordered" id="dataTable"  cellspacing="0">
						@foreach($product as $pro)
							<tr>
					          <th style="width: 25%;">Tên Sản Phẩm :</th>
					          <td>{{$pro->name}}</td>
					        </tr>
					        <tr>
					          <th style="width: 25%;">Số Lượng  :</th>
					          <td>{{$pro->quantity}}</td>
					        </tr>
					        <tr>
					          <th style="width: 25%;">Giá :</th>
					          <td>{{number_format($pro->price).' '.'VND'}}</td>
					        </tr>
					        
					        <tr>
					          <th style="width: 25%;">Loại Sản Phẩm :</th>
					          <td>{{$pro->category_id ? $pro->category->c_name : ''}}</td>
					        </tr>
					        <tr>
					          <th style="width: 25%;">Mô Tả :</th>
					          <td>{!!$pro->description!!}</td>
					        </tr>
					        <tr>
					          <th style="width: 25%;">Nội Dung :</th>
					          <td>{!!$pro->content!!}</td>
					        </tr>
					        <tr>
					          <th style="width: 25%;">Ảnh Đại Diện :</th>
					          <td>
					          	<img src="{{pare_url_file($pro->avatar)}}" alt="" width="150px" height="150px">
					          </td>
					        </tr>
					         <tr>
					          <th style="width: 25%;">Các Ảnh Khác :</th>
					          <td>
					          	<?php 
					          		$images = json_decode($pro->image_list);
					          	 ?>
					          	@if(is_array($images))
					          	<div class="row">
					          		@foreach($images as $img )
										<div class="col-md-4">
											<img src="{{ $img}}" alt="" width="150px" height="150px">
										</div>
					          		@endforeach
					          	</div>
					          	@endif
					          </td>
					        </tr>
						@endforeach
					</table>
				</div>
			</section>
		</div>
	</div>

	@endsection