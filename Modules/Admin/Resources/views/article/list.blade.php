@extends('admin::layouts.master')
@section('title')
  Danh sách bài viết - tin tức
@endsection
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
          <div class="panel-heading">
            Danh Sách Bài Viết
          </div>
          <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
              <select class="input-sm form-control w-sm inline v-middle" id="fillterArticle">
                <option value="">---- Lọc Bài Viết ----</option>
                <option value="0">Bài Viết Ẩn</option>
                <option value="1">Bài Viết Hiện</option>
              </select>
              <a href=" {{ route('admin.article.create')}}"><button type="button" class="btn btn-sm btn-success">
                Tạo Bài Viết
              </button></a>
            </div>
            <div class="col-sm-1">
            </div>
            <div class="col-sm-6">
              <form class="form-inline" action="{{ route('admin.article.search')}}" method="post">
                @csrf
                  <div class="form-group">
                    <input type="text" class="form-control mb-2 mr-sm-2" id=""  value="{{\Request::get('title')}}" name="title" name="title">
                  </div>
                  <button type="submit" class="btn mb-2">Tìm Kiếm</button>
              </form>
              
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped b-t b-light">
              <thead style="text-align: center;">
                <tr>
                  <th style="width: 30%">Tên bài viết</th>
                  <th style="width: 30%">Mô Tả</th>
                  <th >Trạng thái</th>
                  <th>Ngày tạo </th>
                  <th>Hành Động</th>
                </tr>
              </thead>
              <tbody id="getArticle">
                @foreach ($list_article as $art)
                  <tr>
                    <td>{{ $art['title']}} </td>

                    <td>{!! $art['description'] !!}</td>

                    <td>
                      <?php 
                        if($art->active == 1){
                      ?>
                      <a href="{{route('admin.article.unactive',$art->id)}}"><span class="text-ellipsis label {{ $art->getStatus($art['active'])['class'] }}">{{ $art->getStatus($art['active'])['name'] }}</span></a>
                      <?php 
                        }else {
                      ?>
                      <a href="{{route('admin.article.active',$art->id)}}"><span class="text-ellipsis label {{ $art->getStatus($art['active'])['class'] }}">{{ $art->getStatus($art['active'])['name'] }}</span></a>
                      <?php } ?>

                      

                    </td>
                    <td>{{ $art['date']}}</td>
                    <td>
                       <a href="{{route('admin.article.edit', $art->id)}}"><button class="btn btn-default" type="button" title="Chỉnh sửa bài viết" data-id="{{ $art['id']  }}" ><i class="fa fa-check text-success text-active"></i></button></a>

                      <button class="btn btn-default delete" title="Xóa bài viết" data-title ="{{ $art['name'] }}"  data-toggle="modal" data-target="#delete" 
                      type="button" data-id="{{ $art['id'] }}" ><i class="fa fa-times text-danger text"></i></button>

                      <a href="{{ route('admin.article.show', $art->id)}}"><button class="btn btn-default" title="Xem chi tiết" data-title ="{{ $art['name'] }}" 
                      type="button" data-id="{{ $art['id'] }}" ><i class="fa fa-eye text-primary text"></i></button></a>
                        
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="pull-right" style="margin-top: 10px">{{ $list_article->links() }}</div>
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
          <button type="button" class="btn btn-success deletearticle">Có</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
          <div>
          </div>
        </div>
      </div>


@endsection