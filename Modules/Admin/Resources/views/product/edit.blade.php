@extends('admin::layouts.master')
@section('title')
Chỉnh sửa sản phẩm
@endsection
@section('content')
<div class="">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
			<li class="breadcrumb-item"><a href="{{ route('admin.pro.list')}}">Quản Lý Sản Phẩm</a></li>
			<li class="breadcrumb-item active" aria-current="page">Sửa Sản Phẩm</li>
		</ol>
	</nav>
</div>
<div class="form-w3layouts">
	<!-- page start-->

	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Sửa Sản Phẩm
				</header>
				<div class="panel-body">
					<form role="form" action="{{ route('admin.pro.update', $product->id) }}"  enctype="multipart/form-data"  method="POST">
						@csrf
						@method('PUT')
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="name">Tên Sản Phẩm : <i style="color: red">(*)</i></label>
									<input type="text " class="form-control name" id="name" name="name" placeholder="Nhập tên sản phẩm..." value="{{ $product->name,old('name')}}">
									<small id="emailHelp" class="form-text text-muted " style="color: red;font-weight: bold;">{{ $errors->first('name') }}</small>
								</div>

								<div class="form-group">
									<label for="quantity">Số Lượng : <i style="color: red">(*)</i></label>
									<input type="number" class="form-control quantity" id="quantity" name="quantity" value="{{ $product->quantity, old('quantity')}}">
									<small id="emailHelp" class="form-text text-muted " style="color: red;font-weight: bold;">{{ $errors->first('quantity') }}</small>
								</div>
								<div class="form-group">
									<label for="price">Giá  : <i style="color: red">(*)</i></label>
									<input type="number" class="form-control price" id="price" name="price" value="{{ $product->price, old('price')}}">
									<small id="emailHelp" class="form-text text-muted " style="color: red;font-weight: bold;">{{ $errors->first('price') }}</small>
								</div>
								<div class="form-group">
									<label for="description">Mô Tả Sản Phẩm : <i style="color: red">(*)</i></label>
									<textarea name="description" class="form-control " id="motasanpham">{{ $product->description,old('description')}}</textarea>
									<small id="emailHelp" class="form-text text-muted " style="color: red;font-weight: bold;">{{ $errors->first('description') }}</small>
								</div>
								<div class="form-group">
									<label for="content">Nội Dung Chi Tiết Sản Phẩm :<i style="color: red">(*)</i></label>
									<textarea name="content" class="form-control " id="noidungspham">{{ $product->content, old('content')}}</textarea>
									<small id="emailHelp" class="form-text text-muted " style="color: red;font-weight: bold;">{{ $errors->first('content') }}</small>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="description_seo">Mô Tả SEO :<i style="color: red">(*)</i></label>
									<input type="text" class="form-control description_seo" id="description_seo" name="description_seo" value="{{ $product->description_seo, old('description_seo')}}">
									<small id="emailHelp" class="form-text text-muted " style="color: red;font-weight: bold;">{{ $errors->first('description_seo') }}</small>
								</div>
								<div class="form-group">
									<label for="keyword_seo">Từ Khóa SEO :<i style="color: red">(*)</i></label>
									<input type="text" class="form-control keyword_seo" id="keyword_seo" name="keyword_seo" value="{{ $product->keyword_seo,old('keyword_seo')}}">
									<small id="emailHelp" class="form-text text-muted " style="color: red;font-weight: bold;">{{ $errors->first('keyword_seo') }}</small>
								</div>
								<div class="form-group">
									<label for="category_id">Danh Mục Sản Phẩm :<i style="color: red">(*)</i></label>
									<select name="category_id" class="form-control">
										<option value="">---Chọn Danh Mục Sản Phẩm---</option>
										@foreach($list_category as $category)
										@if($category->id == $product->category_id)

										<option selected value="{{$category->id}}">{{$category->c_name}}</option>
										@else 
										<option value="{{$category->id}}">{{$category->c_name}}</option>
										@endif
										@endforeach
									</select>
									<small id="emailHelp" class="form-text text-muted " style="color: red;font-weight: bold;">{{ $errors->first('category_id') }}</small>
								</div>
								<div class="form-group">
									<label for="avatar">Avatar :</label>
									<input type="file" class="form-control avatar" id="avatar" name="avatar">
									<img src="{{ pare_url_file($product->avatar)}}" alt="" width="100px" height="100px">

									<small id="emailHelp" class="form-text text-muted " style="color: red;font-weight: bold;">{{ $errors->first('avatar') }}</small>
								</div>
								<div class="form-group">
									<label for="avatar">Các Ảnh Khác :</label>
									<input type="text" name="image_list" id="image_list">
									<a href="#modal-filess" data-toggle = "modal"    class="btn btn-success">Chọn Ảnh</a>
									<?php 
									$images = json_decode($product->image_list);
									?>
									@if(is_array($images))
									<div class="row">
										@foreach($images as $img )
										<div class="col-md-4">
											<img src="{{ $img}}" alt="" width="100px" height="100px">
										</div>
										@endforeach
									</div>
									@endif
								</div>
								<div class="form-group form-check">
									@if($product->hot == 1)
									<input type="checkbox" class="form-check-input"  name="hot" id="hot" value="1" checked="">
									@else
									<input type="checkbox" class="form-check-input"  name="hot" id="hot" value="1" >
									@endif

									<label class="form-check-label">Sản Phẩm Nổi Bật</label>
								</div>
								<button type="submit" class="btn btn-primary">Chỉnh Sửa</button>
							</div>
						</div>
						
					</form>
				</div>
			</section>
		</div>
	</div>

	@endsection
	<div class="modal fade" id="modal-filess">
		<div class="modal-dialog" style="width: 75%;">
			<div class="modal-content">
			{{-- <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Chọn các ảnh khác của sản phẩm.</h4>
			</div> --}}
			<div class="modal-body">
				<iframe src="{{ url('file')}}/dialog.php?akey=VmGGehrFd4hBaUV1yTOklJAqnLmQtNdKkCA3FEg&field_id=image_list" style="width: 100%; height: 500px; overflow-y: auto;border: 0; "></iframe>
			</div>
		</div>
	</div>
</div>