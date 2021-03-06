@extends('admin::layouts.master')
@section('title')
  Thêm mới bài viết
@endsection
@section('content')
<div class="">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Trang Chủ</a></li>
			<li class="breadcrumb-item"><a href="{{ route('admin.article.list')}}">Quản Lý Bài Viết</a></li>
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
					Thêm Mới Bài Viết
				</header>
				<div class="panel-body">
					<form role="form" action="{{ route('admin.article.store') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-sm-8">
								<div class="form-group">
									<label for="name">Tên Bài Viết : <i style="color: red">(*)</i></label>
									<input type="text " class="form-control name" id="title" name="title"  value="{{ old('title')}}">
									<small id="emailHelp" class="form-text text-muted " style="color: red;font-weight: bold;">{{ $errors->first('title') }}</small>
								</div>

								<div class="form-group">
									<label for="quantity">Mô tả ngắn : <i style="color: red">(*)</i></label>
									<textarea name="description" class="form-control " id="motabaiviet">{{ old('description')}}</textarea>
									<small id="emailHelp" class="form-text text-muted " style="color: red;font-weight: bold;">{{ $errors->first('description') }}</small>
								</div>
								<div class="form-group">
									<label for="price">Nội Dung  : <i style="color: red">(*)</i></label>
									<textarea name="content" class="form-control " id="content">{{ old('content')}}</textarea>
									<small id="emailHelp" class="form-text text-muted " style="color: red;font-weight: bold;">{{ $errors->first('content') }}</small>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="description_seo">Meta Description :<i style="color: red">(*)</i></label>
									<input type="text" class="form-control description_seo" id="description_seo" name="description_seo" value="{{ old('description_seo')}}">
									<small id="emailHelp" class="form-text text-muted " style="color: red;font-weight: bold;">{{ $errors->first('description_seo') }}</small>
								</div>
								<div class="form-group">
									<label for="title_seo">Meta Title :<i style="color: red">(*)</i></label>
									<input type="text" class="form-control title_seo" id="title_seo" name="title_seo" value="{{ old('title_seo')}}">
									<small id="emailHelp" class="form-text text-muted " style="color: red;font-weight: bold;">{{ $errors->first('title_seo') }}</small>
							
								<div class="form-group" style="margin-top: 5px;">
									<label for="avatar">Avatar :<i style="color: red">(*)</i></label>
									<br>
									<input type="type" name="avatar" id="avatar">
									<a href="#modal-article" data-toggle = "modal"    class="btn btn-success">Chọn Ảnh</a>
									<small class="form-text text-muted " style="color: red;font-weight: bold;">{{ $errors->first('avatar') }}</small>
								</div>
								<button type="submit" class="btn btn-primary">Thêm Mới Bài Viết</button>
							</div>
						</div>
						
					</form>
				</div>
			</section>
		</div>
	</div>

	@endsection
@section('js')
<div class="modal fade" id="modal-article">
	<div class="modal-dialog" style="width: 75%;">
		<div class="modal-content">
			<div class="modal-body">
				<iframe src="{{ url('file')}}/dialog.php?akey=VmGGehrFd4hBaUV1yTOklJAqnLmQtNdKkCA3FEg&field_id=avatar" style="width: 100%; height: 500px; overflow-y: auto;border: 0; "></iframe>
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
