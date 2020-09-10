@extends('admin::layouts.master')
@section('title')
  Danh sách trạng thái đơn hàng
@endsection
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
          <div class="panel-heading">
            Danh Sách trạng thái đơn hàng
          </div>
          <div class="row w3-res-tb">
            
            <div class="col-sm-6">
              <form class="form-inline" action="">
                  <div class="form-group">
                    <input type="text" class="form-control mb-2 mr-sm-2" id=""  value="{{\Request::get('name')}}" name="name">
                  </div>
                 
                  <button type="submit" class="btn mb-2">Tìm Kiếm</button>
              </form>
              
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped b-t b-light">
              <thead style="text-align: center;">
                <tr>
                  <th>STT</th>
                  <th>Tên Trạng Thái</th>
                  <th>Mã Quy Định</th>
                  <th>Mô Tả Trạng Thái</th>
                </tr>
              </thead>
              <tbody id="viewOrder">
                <tr>
                  <td>1</td>
                  <td><span class=" label label-primary">Đơn Mới</span></td>
                  <td>0</td>
                  <td>Đơn hàng mới tạo.</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td><span class=" label label-info">Đã Xử Lý</span></td>
                  <td>1</td>
                  <td>Đơn hàng đã được shop xử lý duyệt đơn hàng và giao cho bộ phận vận chuyển.</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td><span class=" label label-default">Đang Giao</span></td>
                  <td>2</td>
                  <td>Đơn hàng đang được bộ phận vận chuyển giao đến cho khách hàng.</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td><span class=" label label-success">Đã Giao</span></td>
                  <td>3</td>
                  <td>Đơn hàng đã được giao thành công cho khách hàng.</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td><span class=" label label-danger">Hủy Đơn</span></td>
                  <td>4</td>
                  <td>Đơn hàng bị hủy vì một số lý do nào đó.</td>
                </tr>
              </tbody>
            </table>
            <div class="pull-right" style="margin-top: 10px"></div>
          </div>
   
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