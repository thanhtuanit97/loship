@extends('admin::layouts.master')
@section('title')
  Danh sách danh mục
@endsection
@section('content')

    <div class="table-agile-info">
        <div class="panel panel-default">
          <div class="panel-heading">
            Danh Sách Danh Mục Sản Phẩm
          </div>
          <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
              <select class="input-sm form-control w-sm inline v-middle">
                <option value="0">Chọn tất cả</option>
                <option value="1">Xóa mục đã chọn</option>
                <option value="2">Bulk edit</option>
                <option value="3">Export</option>
              </select>
              <button class="btn btn-sm btn-default">Xử Lý</button> 

              <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#addcate">
                Thêm Mới
              </button>
             
            </div>
            <div class="col-sm-4">
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
                  <th style="width:20px;">
                    <label class="i-checks m-b-none">
                      <input type="checkbox"><i></i>
                    </label>
                  </th>
                  <th>Tên danh mục</th>
                  <th>Title Seo</th>
                  <th>Trạng Thái</th>
                  <th style="width:30px;"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($list_category as $cate)
                  <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>{{ $cate['c_name'] }}</td>
                    <td><span class="text-ellipsis"> {{ $cate['c_title_seo'] }} </span></td>
                    <td><span class="text-ellipsis label {{ $cate->getStatus($cate['c_active'])['class'] }}">{{ $cate->getStatus($cate['c_active'])['name'] }}</span></td>
                    <td>
                      
                      <button class="btn btn-default editcate"  data-toggle="modal" data-target="#edit" 
                      type="button" data-id="{{ $cate['id'] }}" ><i class="fa fa-check text-success text-active"></i></button>
                      <button class="btn btn-default delete" data-title ="{{ $cate['c_name'] }}"  data-toggle="modal" data-target="#delete" 
                      type="button" data-id="{{ $cate['id'] }}" ><i class="fa fa-times text-danger text"></i></button>
                        
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="pull-right" style="margin-top: 10px">{{ $list_category->links() }}</div>
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

       <!-- Modal addcate -->
<div class="modal fade" id="addcate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; font-size: 20px;">Thêm Mới Danh Mục Sản Phẩm</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row" style="margin: 5px">
                <div class="col-lg-12">
                    <form >
                        <div class="form-group">
                          <label >Tên danh mục : <i style="color: red">(*)</i></label>
                          <input type="text" class="form-control c_name" placeholder="Nhập tên danh mục" name="c_name" value="{{ old('c_name') }}">
                              
                        </div>
                        <div class="form-group">
                          <label >Icon : <i style="color: red">(*)</i></label>
                          <input type="text" class="form-control c_icon" placeholder="Chọn icon" name="c_icon" value="{{ old('c_icon') }}">
                        </div>
                        <div class="form-group">
                          <label >Meta title : <i style="color: red">(*)</i></label>
                          <input type="text" class="form-control c_title_seo" placeholder="Nhập title seo" name="c_title_seo" value="{{ old('c_title_seo') }}">
                        </div>
                        <div class="form-group">
                          <label >Meta Description : <i style="color: red">(*)</i></label>
                          <input type="text" class="form-control c_description_seo" placeholder="Nhập description seo" name="c_description_seo" value="{{ old('c_description_seo') }}">
                        </div>
                        <div class="form-group form-check">
                          <input type="checkbox" class="form-check-input"  name="c_hot">
                          <label class="form-check-label"  >Nổi Bật</label>
                        </div>
                        <button type="button" class="btn btn-primary pull-right" id="addcategory">Thêm Mới</button>
                      </form>
                </div>
            </div>
            
        </div>
      </div>
    </div>
  </div>
  <!-- Modal edit -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; font-size: 20px;">Chỉnh Sửa Danh Mục Sản Phẩm <span class="title" style="font-style: italic; color: red;"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row" style="margin: 5px">
              <div class="col-lg-12">
                  <form >
                      <div class="form-group">
                        <label >Tên danh mục : <i style="color: red">(*)</i></label>
                        <input type="text" class="form-control c_name" id="c_name" placeholder="Nhập tên danh mục" name="c_name" value="{{ old('c_name') }}">
                      </div>
                      <div class="form-group">
                        <label >Icon : <i style="color: red">(*)</i></label>
                        <input type="text" class="form-control c_icon" id="c_icon" placeholder="Chọn icon" name="c_icon" value="{{ old('c_icon') }}">
                      </div>
                      <div class="form-group">
                        <label >Meta title : <i style="color: red">(*)</i></label>
                        <input type="text" class="form-control c_title_seo" id="c_title_seo" placeholder="Nhập title seo" name="c_title_seo" value="{{ old('c_title_seo') }}">
                      </div>
                      <div class="form-group">
                        <label >Meta Description : <i style="color: red">(*)</i></label>
                        <input type="text" class="form-control c_description_seo" id="c_description_seo" placeholder="Nhập description seo" name="c_description_seo" value="{{ old('c_description_seo') }}">
                      </div>
                      <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input"  name="c_hot">
                        <label class="form-check-label"  >Nổi Bật</label>
                      </div>
                      <button type="button" class="btn btn-primary pull-right" id="updatecate" data-id="">Sửa</button>
                    </form>
              </div>
          </div>
          
      </div>
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
          <button type="button" class="btn btn-success deletecate">Có</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
          <div>
          </div>
        </div>
      </div>
<!-- Edit Modal-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa Học Sinh : <span class="title" style="font-style: italic"></span></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row" style="margin: 5px">
          <div class="col-lg-12">
            <form role="form"  >
                  <fieldset class="form-group">
                      <label>Họ Và Tên : <i style="color: red">*</i>  </label>
                      <input class="form-control name" id="name" name="name" >
                    <span class="errorName" style="color: red; font-size: 1rem;"></span>
                  </fieldset>


                  <fieldset class="form-group">
                      <label>Email : <i style="color: red">*</i> </label>
                      <input class="form-control email" id="email" name="email" >  
                      <span class="errorEmail" style="color: red; font-size: 1rem;"></span>
                  </fieldset>

                  <fieldset class="form-group">
                      <label>Địa Chỉ : <i style="color: red">*</i> </label>
                      <input class="form-control address" id="address" name="address" >
                      <span class="errorAddress" style="color: red; font-size: 1rem;"></span>
                  </fieldset>

                  <fieldset class="form-group">
                      <label>Số Điện Thoại : <i style="color: red">*</i> </label>
                      <input class="form-control phone" id="phone" name="phone" >
                      <span class="errorPhone" style="color: red; font-size: 1rem;"></span>
                  </fieldset>

                  
              </form>
          </div>
        </div>
         <div class="modal-footer">
              <button type="button" class="btn btn-success updatestudent" data-id ="">Sửa</button>
              
              {{-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> --}}
          </div>
      </div>
      
    </div>
  </div>
</div>

@endsection