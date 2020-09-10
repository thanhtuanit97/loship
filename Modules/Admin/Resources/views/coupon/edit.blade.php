@extends('admin::layouts.master')
@section('title')
Sửa mã giảm giá
@endsection
@section('content')
<div class="">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Trang Chủ</a></li>
			<li class="breadcrumb-item"><a href="{{ route('admin.coupon.list')}}">Quản Lý Mã Giảm Giá</a></li>
			<li class="breadcrumb-item active" aria-current="page">Sửa Mã Giảm Giá</li>
		</ol>
	</nav>
</div>
<div class="form-w3layouts">
	<!-- page start-->

	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Sửa Mã Giảm Giá
				</header>
				<div class="panel-body">
					<form role="form" action="{{ route('admin.coupon.update', $coupons['id']) }}" method="post" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="row">
							<div class="col-sm-8">
								<div class="form-group">
									<label for="name">Tên Mã Giảm Giá : <i style="color: red">(*)</i></label>
									<input type="text " class="form-control name" id="name" name="name" value="{{ $coupons['name'],old('name')}}">
									<small id="emailHelp" class="form-text text-muted " style="color: red;font-weight: bold;">{{ $errors->first('name') }}</small>
								</div>
								<div class="form-group">	
									<div class="col-sm-6">
										<div class="form-group">
											<label for="condition">Loại Giảm giá  : <i style="color: red">(*)</i></label>
											<select name="condition" class="form-control" >
												<option value="">---Chọn loại giảm giá---</option>
												@if($coupons['condition'] == 0)
												<option value="0" selected="">Giảm theo tiền mặt</option>
												<option value="1" >Giảm theo %</option>
												@else 
												<option value="0" >Giảm theo tiền mặt</option>
												<option value="1"selected="" >Giảm theo %</option>
												@endif
											</select>
											<small id="emailHelp" class="form-text text-muted " style="color: red;font-weight: bold;">{{ $errors->first('condition') }}</small>
										</div>
										<div class="form-group">
											<label for="apply_type">Hình Thức Giảm  : <i style="color: red">(*)</i></label>
											<select name="apply_type" class="form-control" id="applyType">
												<option value="">---Chọn hình thức giảm---</option>
												@if($coupons['apply_type'] == 0)
												<option value="0" selected="">Giảm theo sản phẩm</option>
												<option value="1">MÃ CODE khác hàng</option>
												@else 
												<option value="0" >Giảm theo sản phẩm</option>
												<option value="1"selected="">MÃ CODE khác hàng</option>
												@endif
											</select>
											<small id="emailHelp" class="form-text text-muted " style="color: red;font-weight: bold;">{{ $errors->first('apply_type') }}</small>
										</div>
								</div>
								</div>
								<div class="form-group">	
									<div class="col-sm-6">
										<div class="form-group">
										<label for="number">Số Tiền Được Giảm  : <i style="color: red">(*)</i></label>
										<input type="text" class="form-control price"  name="number" value="{{ number_format($coupons['number']), old('number')}}">
										<small id="emailHelp" class="form-text text-muted " style="color: red;font-weight: bold;">{{ $errors->first('number') }}</small>
										</div>

										@if($coupons['apply_type'] == 0)
										<div class="form-group">
											<label for="">Sản Phẩm :</label>
											<select id="" name="product_id"  class="form-control" >
												<option value="">---Chọn Sản Phẩm---</option>
													@foreach($list_products as $value)
														@if($value->id == $coupons['product_id'])
															<option selected value="{{$value->id}}">{{$coupons->product->name}}</option>
														@else 
														<option value="{{$value->id}}">{{$coupons->product->name}}</option>
														@endif
													
													@endforeach                                    
											</select>
										</div>
										@else
										<div class="form-group">
											<label for="">Mã Code :</label>
											<input type="text" class="form-control price"  name="code" value="{{ $coupons['code'],old('code')}} " id="demo">
											<label for="">Số Lược Mã :</label> 
											<input type="text" name="time_code" value="{{ $coupons['time_code'],old('time_code')}} " class="form-control">
										</div>
										@endif

										{{-- <div class="form-group">
										<label for="price">Sản Phẩm  : <i style="color: red">(*)</i></label>
										<div id="demo1">
											<input type="" class="form-control price" id="" name="" value="" id="demo">
											
										</div>	
										<small id="emailHelp" class="form-text text-muted " style="color: red;font-weight: bold;">{{ $errors->first('price') }}</small>
										</div> --}}
								</div>
								</div>
								
								
								
								
								
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="start_date">Ngày Bắt Đầu :<i style="color: red">(*)</i></label>
									<input type="date" class="form-control" name="start_date" value="{{ $coupons['start_date'],old('start_date')}}">
									<small id="emailHelp" class="form-text text-muted " style="color: red;font-weight: bold;">{{ $errors->first('start_date') }}</small>
								</div>
								<div class="form-group">
									<label for="end_date">Ngày Kết Thúc :<i style="color: red">(*)</i></label>
									<input type="date" class="form-control " id="end_date" name="end_date" value="{{ $coupons['end_date'],old('end_date')}}">
									<small id="emailHelp" class="form-text text-muted " style="color: red;font-weight: bold;">{{ $errors->first('end_date') }}</small>
								</div>
								<div class="form-group form-check">
									<input type="checkbox" class="form-check-input"  name="hot" id="hot" value="1">
									<label class="form-check-label">Không bao giờ hết hạn</label>
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
