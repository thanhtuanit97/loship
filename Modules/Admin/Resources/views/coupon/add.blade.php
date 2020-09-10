@extends('admin::layouts.master')
@section('title')
Thêm mới mã giảm giá
@endsection
@section('content')
<div class="">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('admin.index')}}">Trang Chủ</a></li>
			<li class="breadcrumb-item"><a href="{{ route('admin.coupon.list')}}">Quản Lý Mã Giảm Giá</a></li>
			<li class="breadcrumb-item active" aria-current="page">Thêm Mới</li>
		</ol>
	</nav>
</div>
<div class="form-w3layouts">
	<!-- page start-->

	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Thêm Mới Mã Giảm Giá
				</header>
				<div class="panel-body">
					<form role="form" action="{{ route('admin.coupon.store') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="row">

							@if($errors->has('code'))
							<div class="alert alert-danger">{{ $errors->first('code') }}</div>
							@endif
							<?php if(isset($_POST['condition'])) echo $_POST['condition'] ?>
							<div class="col-sm-8">
								<div class="form-group">
									<label for="name">Tên Mã Giảm Giá : <i style="color: red">(*)</i></label>
									<input type="text " class="form-control name" id="name" name="name" value="{{ old('name')}}">
									@if($errors->has('name'))
									<div class="alert alert-danger">{{ $errors->first('name') }}</div>
									@endif
								</div>
								
								
								<div class="form-group">	
									<div class="col-sm-6">
										<div class="form-group">
											<label for="condition">Loại Giảm giá  : <i style="color: red">(*)</i></label>
											<select name="condition" class="form-control" >
												<option value="">---Chọn loại giảm giá---</option>
												<option value="0" > Giảm theo tiền mặt</option>
												<option value="1" >Giảm theo %</option>
												
											</select>
											@if($errors->has('condition'))
											<div class="alert alert-danger">{{ $errors->first('condition') }}</div>
											@endif
										</div>
										<div class="form-group">
											<label for="apply_type">Hình Thức Giảm  : <i style="color: red">(*)</i></label>
											<select name="apply_type" class="form-control" id="applyType">
												<option value="">---Chọn hình thức giảm---</option>
												<option value="0">Giảm theo sản phẩm</option>
												<option value="1">MÃ CODE khác hàng</option>
												
											</select>
											@if($errors->has('apply_type'))
											<div class="alert alert-danger">{{ $errors->first('apply_type') }}</div>
											@endif
										</div>
									</div>
								</div>
								<div class="form-group">	
									<div class="col-sm-6">
										<div class="form-group">
											<label for="number">Số Tiền Được Giảm  : <i style="color: red">(*)</i></label>
											<input type="text" class="form-control price"  name="number" value="{{ old('number')}}">
											@if($errors->has('number'))
											<div class="alert alert-danger">{{ $errors->first('number') }}</div>
											@endif
										</div>
										<div class="form-group">
											<label for="price">Sản Phẩm  : <i style="color: red">(*)</i></label>
											<div id="demo1">
												<input type="" class="form-control price" id="" name="" value="" id="demo">

											</div>	

										</div>
									</div>
								</div>
								
								
								
								
								
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="start_date">Ngày Bắt Đầu :<i style="color: red">(*)</i></label>
									<input type="date" class="form-control" name="start_date" value="{{ old('start_date')}}">
									@if($errors->has('start_date'))
									<div class="alert alert-danger">{{ $errors->first('start_date') }}</div>
									@endif
								</div>
								<div class="form-group">
									<label for="end_date">Ngày Kết Thúc :<i style="color: red">(*)</i></label>
									<input type="date" class="form-control " id="end_date" name="end_date" value="{{ old('end_date')}}">
									@if($errors->has('end_date'))
									<div class="alert alert-danger">{{ $errors->first('end_date') }}</div>
									@endif
								</div>
								<button type="submit" class="btn btn-primary">Thêm Mới</button>
							</div>
						</div>
						
					</form>
				</div>
			</section>
		</div>
	</div>

	@endsection
	@section('js')
	<div class="modal fade" id="modal-files">
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

<script src="tinymce/tinymce.min.js"></script>
<script src="tinymce/config.js"></script>
<script type="text/javascript">
	// $('#modal-files').on('hide.bs.modal', function(){
	// 	var _imgs = $('input#image_list').val();
	// 	console.log(_imgs);
	// });
</script>

@endsection
