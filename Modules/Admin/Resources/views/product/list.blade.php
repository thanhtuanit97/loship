@extends('admin::layouts.master')
@section('title')
  Danh sách sản phẩm
@endsection
@section('content')
<style>
  .rating .active {
    color: #ff9705 !important;
  }
</style>
    <div class="table-agile-info">
        <div class="panel panel-default">
          <div class="panel-heading">
            Danh Sách Sản Phẩm
          </div>
          <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
              <select class="input-sm form-control w-sm inline v-middle">
                <option value="0">--Lọc Sản Phẩm--</option>
                <option value="1">Giá tăng dần</option>
                <option value="2">Giá giảm dần</option>
                {{-- <option value="3"></option> --}}
              </select>


              <a href=" {{ route('admin.pro.create')}}"><button type="button" class="btn btn-sm btn-success">
                Thêm Mới
              </button></a>
             
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
                  <div class="form-group">
                    <input type="text" id="myInput"  placeholder="Search for names.." class="input-sm form-control">
                  </div>
                  <div class="form-group">
                     <select name="cate" class="input-sm form-control w-sm inline v-middle">
                        <option value="">--Lọc Theo Danh Mục--</option>
                          @foreach($list_category as $cate)
                            <option value="{{ $cate->id}}" {{ \Request::get('cate') == $cate->id ? "selected ='selected'" : ""}}>{{ $cate->c_name}}</option>
                          @endforeach
                      </select>
                  </div>
                  <button type="submit" class="btn mb-2">Duyệt</button>
              </form>
              
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped b-t b-light">
              <thead style="text-align: center;">
                <tr>
                  {{-- <th style="width:20px;">
                    <label class="i-checks m-b-none">
                      <input type="checkbox"><i></i>
                    </label>
                  </th> --}}
                  <th>Avatar</th>
                  <th>Tên sản phẩm</th>
                  
                  <th>Giá</th>
                  <th >Trạng thái</th>
                  <th>Nổi Bật</th>
                  <th>Hành Động</th>
                </tr>
              </thead>
              <tbody id="myTable">
                @foreach ($list_product as $pro)
                <?php 
                  $age = 0;
                  if($pro->total_rating)
                  {
                    $age = round($pro->total_number / $pro->total_rating, 2);
                  }
                ?>
                  <tr>
                    {{-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> --}}

                    <td><img src="{{ pare_url_file($pro['avatar'])}}" alt="" width="100px" height="100px"> </td>

                    <td>{{ $pro['name'] }}
                      <br>
                      <span>
                         <?php if($pro['quantity'] == 0) { ?>
                     * Tình Trạng : <span style="color: red">  Hết Hàng </span>
                      <?php } else if($pro['quantity'] < 10) { ?>
                      * Tình Trạng : <span style="color: red">Sắp Hết Hàng </span>
                      <?php }?>
                      </span>
                      <br>
                      <span class="rating">
                        * Đánh Giá :
                        @for($i = 1; $i <=5 ; $i++)
                          <i class="fa fa-star {{ $i <= $age ? 'active' : '' }}" style="color:#999"></i>
                        @endfor
                      </span>
                     
                    </td>

                    

                    <td><span class="text-ellipsis"> {{ number_format($pro['price']).' '.'VND' }} </span></td>

                    <td>
                      <a href="{{ route('admin.get.action.product',['active',$pro->id])}}"><span class="text-ellipsis label {{ $pro->getStatus($pro['active'])['class'] }}">{{ $pro->getStatus($pro['active'])['name'] }}</span></a>
                    </td>
                    <td>
                      <a href="{{ route('admin.get.action.product',['hot',$pro->id])}}"><span class="text-ellipsis label {{ $pro->getHots($pro['hot'])['class'] }}">{{ $pro->getHots($pro['hot'])['name'] }}</span></a>
                    </td>
                    <td>
          
                     
                       <a href="{{route('admin.pro.edit', $pro->id)}}"><button class="btn btn-default" type="button" title="Chỉnh sửa sản phẩm" data-id="{{ $pro['id']  }}" ><i class="fa fa-check text-success text-active"></i></button></a>

                      <button class="btn btn-default delete" title="Xóa sản phẩm" data-title ="{{ $pro['name'] }}"  data-toggle="modal" data-target="#delete" 
                      type="button" data-id="{{ $pro['id'] }}" ><i class="fa fa-times text-danger text"></i></button>

                      <a href="{{ route('admin.pro.show', $pro->id)}}"><button class="btn btn-default" title="Xem chi tiết" data-title ="{{ $pro['name'] }}" 
                      type="button" data-id="{{ $pro['id'] }}" ><i class="fa fa-eye text-primary text"></i></button></a>
                        
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="pull-right" style="margin-top: 10px">{{ $list_product->links() }}</div>
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