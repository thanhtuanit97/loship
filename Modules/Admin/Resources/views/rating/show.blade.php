@extends('admin::layouts.master')

@section('title')
Chi Tiết Đánh Giá Sản Phấm
@endsection

@section('content')
<div class="">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Trang Chủ</a></li>
			<li class="breadcrumb-item"><a href="{{ route('admin.rating.list')}}">Quản Lý Đánh Giá Sản Phẩm</a></li>
			<li class="breadcrumb-item active" aria-current="page">Chi Tiết Đánh Giá Theo Sản Phẩm</li>
		</ol>
	</nav>
</div>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Chi Tiết Đánh Giá Theo Sản Phẩm
    </div>
    <div class="row w3-res-tb">
       <div class="col-sm-6">
        Tên Sản Phẩm : <span style="font-weight: 600;color: #7dd10a;"> 
      
      {{ $products->name}}
   
        </span>
      </div>
      <div class="col-sm-3 m-b-xs">
                      
      </div>

      <div class="col-sm-3">
       <select class="input-sm form-control w-sm inline v-middle">
          <option  selected disabled="">-- Lọc Đánh Giá--</option>
          <option value="0">Điểm Tăng Dần</option>
          <option value="1">Điểm Thấp Dần</option>
        </select>
        <button class="btn btn-sm btn-default">Lọc</button>  
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>STT</th>
            <th>Người Đánh Giá</th>
            <th>Nội Dung</th>
            <th> Điểm Đánh Giá</th>
            <th>Hành Động</th>
          </tr>
        </thead>
        <tbody>
        
        	@foreach($ratings as $key => $value)
          <?php 
              $ageProducts = $value->number;
             
          ?> 
          <tr>
            <td>{{ $key+1}}</td>
            <td>{{ $value->user->name}}</td>
            <td>{{ $value->content}}</td>
            <td class="rating-show">
              @for($i = 1; $i <= 5; $i++)
              <i class="fa fa-star {{ $i <= $ageProducts ? 'active' : ''}}"></i>
              @endfor
            </td>
             <td>
               <button class="btn btn-default delete" title="Xóa đánh giá" data-title ="{{ $value->user->name }}"  data-toggle="modal" data-target="#delete" 
                      type="button" data-id="{{ $value->id }}" ><i class="fa fa-times text-danger text"></i></button>
            </td>
          </tr>

          @endforeach   

        </tbody>
      </table>
      <div class="pull-right" style="margin-top: 10px">{{ $ratings->links() }}</div>
    </div>
   
  </div>
</div>
 <!-- Delete Modal-->
  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bạn chắc chắn muốn Xóa đánh giá của  <span class="title" style="font-style: italic; color: red;"></span> ? </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body" style="margin-left: 183px;">
          <button type="button" class="btn btn-success deleterating">Có</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
          <div>
          </div>
        </div>
      </div>
	@endsection
 