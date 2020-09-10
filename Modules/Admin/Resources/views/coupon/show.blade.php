@extends('admin::layouts.master')

@section('title')
Chi Tiết mã giảm giá
@endsection

@section('content')
<div class="">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Trang Chủ</a></li>
			<li class="breadcrumb-item"><a href="{{ route('admin.coupon.list')}}">Quản Lý Mã Giảm Giá</a></li>
			<li class="breadcrumb-item active" aria-current="page">Chi Tiết Mã Giảm Giá</li>
		</ol>
	</nav>
</div>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Chi Tiết Mã Giảm Giá 
    </div>
    <div class="row w3-res-tb">
       <div class="col-sm-4">
        Danh sách giảm giá : <span style="font-weight: 600;color: #7dd10a;">{{ $list_coupon->name}}</span>
          <a href=""><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 2em ; color:#00bcd4" title="Thêm Sản Phẩm Cho Mã Giảm Giá" ></i></a>
      </div>
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>

      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>#</th>
            <th>
              @if($list_coupon->apply_type == 0)
                Tên Sản Phẩm
              @else
              Mã Code
              @endif
            </th>
            <th>Mức Giảm</th>
            <th>Ngày Bắt Đầu</th>
            <th>Ngày Kết Thúc</th>
            <th>Hành Động</th>
          </tr>
        </thead>
        <tbody>
        	
        	<tr>
        		<td>1</td>
        		<td>
              @if($list_coupon->apply_type == 0)
                  {{ $list_coupon->product->name}} 
              @else 
                  {{ $list_coupon->code}} ( {{$list_coupon->time_code}})
              @endif
            </td>
        		<td>
              @if($list_coupon->condition == 1)
                  {{ $list_coupon->number}} %
              @else
                 {{ number_format($list_coupon->number)}} đ
              @endif
            </td>
        		<td>{{ $list_coupon->start_date}}</td>
        		<td>{{ $list_coupon->end_date}}</td>
        		<td>
        			 <button class="btn btn-default delete" title="Xóa mã giảm giá" data-title ="{{ $list_coupon['name'] }}"  data-toggle="modal" data-target="#delete" 
                      type="button" data-id="{{ $list_coupon['id'] }}" ><i class="fa fa-times text-danger text"></i></button>
        		</td>
        	</tr>
        	
        </tbody>
      </table>
    </div>
   
  </div>
</div>

	@endsection
  <div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>