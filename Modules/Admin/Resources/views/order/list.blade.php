@extends('admin::layouts.master')
@section('title')
  Danh sách đơn hàng
@endsection
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
          <div class="panel-heading">
            Danh Sách Đơn Hàng
          </div>
          <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
              <select class="input-sm form-control w-sm inline v-middle" id="FillterOrder">
                <option value="" selected="">--Lọc Đơn Hàng--</option>
                <option value="0">Đơn Mới</option>
                <option value="1">Đã Xử Lý</option>
                <option value="2">Đã Giao</option>
                <option value="3">Hủy Đơn</option>
              </select>
            </div>
            <div class="col-sm-1">
            </div>
            <div class="col-sm-6">
              {{-- <form action="" class="form-inline">
                <div class="input-group">
                <input type="text" class="input-sm form-control" placeholder="Search" name="name" value="{{\Request::get('name')}}">
                <select name="" class="input-sm form-control w-sm inline v-middle">
                  <option value="">--Lọc Theo Danh Mục--</option>
                  @foreach($list_category as $cate)
                  <option value="{{ $cate->id}}">{{ $cate->c_name}}</option>
                  @endforeach
                </select>
                <span class="input-group-btn">
                  <button class="btn btn-sm btn-default" type="submit">Go!</button>
                </span>
              </div>
              </form> --}}
              <form class="form-inline" action="">
               <div class="input-group">
                <input type="text" id="myInput"   class="input-sm form-control" placeholder="Search">
                
              </div>
              
              
            </form>
              
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped b-t b-light">
              <thead style="text-align: center;">
                <tr>
                  <th>STT</th>
                  <th>Tên Người Đặt Hàng</th>
                  
                  <th>Ngày Đặt</th>
                  <th>Tổng Tiền</th>
                  <th>Trạng Thái</th>
                  <th>Hành Động</th>
                </tr>
              </thead>
              <tbody class="viewOrder" id="myTable">
            @foreach($list_order as $key => $value)
               <tr>
                      <td>{{ $key+1}}</td>
                      <td>{{ $value['name'] }}</td>
                      <td>{{ $value['date']}}</td>

                      <td>{{ number_format($value['order_total']).' '.'đ'}}</td>
                      <td>
                          <span class="text-ellipsis label {{ $value->getStatus($value['status'])['class'] }}">{{ $value->getStatus($value['status'])['name'] }}</span>
                      </td>
                      <td>
                        <button class="btn btn-default delete" title="Xóa đơn hàng" data-title ="{{ $value['name'] }}"  data-toggle="modal" data-target="#delete" 
                        type="button" data-id="{{ $value['id'] }}" ><i class="fa fa-times text-danger text"></i></button>

                        <a href="{{ route('admin.order.show',$value['id'])}}"><button class="btn btn-default" title="Xem chi tiết" data-title ="{{ $value['name'] }}" 
                        type="button" data-id="{{ $value['id'] }}" ><i class="fa fa-eye text-primary text"></i></button></a>
                          
                      </td>
                    </tr>
            @endforeach
              </tbody>
            </table>
            <div class="pull-right" style="margin-top: 10px">{{ $list_order->links() }}</div>
          </div>
          {{-- <footer class="panel-footer">
            <div class="row">
              
              <div class="col-sm-5 text-center">
                <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
              </div>
              <div class="col-sm-7 text-right text-center-xs">                
                <ul class="pagination pagination-sm m-t-none m-b-none">
                  <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                  <li><a href="">1</a></li>
                  <li><a href="">2</a></li>
                  <li><a href="">3</a></li>
                  <li><a href="">4</a></li>
                  <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                </ul>
              </div>
            </div>
          </footer> --}}
        </div>
      </div>

 

<!-- Delete Modal-->
  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bạn chắc chắn muốn xóa  <span class="title" style="font-style: italic; color: red;"></span> ? </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body" style="margin-left: 183px;">
          <button type="button" class="btn btn-success deletepro">Có</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
          <div>
          </div>
        </div>
      </div>


@endsection