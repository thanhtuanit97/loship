@extends('admin::layouts.master')
@section('title')
  Danh Sách Đánh Giá Sản Phẩm
@endsection
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
          <div class="panel-heading">
            Danh Sách Đánh Giá Sản Phẩm
          </div>
          <div class="row w3-res-tb">
            
            <div class="col-sm-6">
              <form class="form-inline" action="">
                  <div class="form-group">
                <input type="text" id="myInput"   class="input-sm form-control" placeholder="Search">
                
              </div>
                 
                  <button type="submit" class="btn mb-2">Tìm Kiếm</button>
              </form>
              
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
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
              <thead style="text-align: center;">
                <tr>
                  <th>STT</th>
                  <th>Tên Sản Phẩm</th>
                  <th>Tổng Số Đánh Giá</th>
                  <th>Điểm đánh giá ( Max = 5 )</th>
                  <th>Hành Động</th>
                </tr>
              </thead>
             
              <tbody id="myTable">
                @foreach( $products as $key => $value)
                 <?php 
                    $ageProduct = 0;
                    if($value->total_rating)
                    {
                      $ageProduct = round($value->total_number / $value->total_rating, 2);
                    }
                ?>  
                <tr class="rating-view">
                  <td>{{ $key+1}}</td>
                  <td>{{ $value->name}}</td>
                  <td>{{ $value->total_rating}}</td>
                  <td class="rating-number" style="font-size: 20px;">
                    @for($i = 1; $i <= 5; $i++)
                    <span><i class="fa fa-star {{ $i <= $ageProduct ? 'active' : '' }}"></i></span>
                    @endfor
                  </td>
                  <td>
                       <a href="{{ route('admin.rating.show', $value->id)}}"><button class="btn btn-default" title="Xem chi tiết" data-title ="{{ $value->name }}" 
                      type="button" data-id="{{ $value->id }}" ><i class="fa fa-eye text-primary text"></i></button></a>
                  </td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
            <div class="pull-right" style="margin-top: 10px">{{ $products->links() }}</div>
            
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