<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use DB;

class AdminArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list_article = Article::paginate(10);

        //tim kiem theo ten bai viet

        if($request->title) $list_article->where('title','like','%'.$request->title.'%');

        // $list_article = $list_article->paginate(10);

        $viewData = [
            'list_article'=>$list_article,
        ];
        return view('admin::article.list', $viewData);
    }

    public function search(Request $request)
    {
        $keywords = $request->title;
        $list_article = Article::where('title', 'LIKE', '%'.$keywords.'%')->paginate(10);
        return view('admin::article.list', compact('list_article'));

    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::article.add');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreArticleRequest $request)
    {
        $data = $request->all();
        //chuyển đổi link hình ảnh , chỉ lấy mỗi tên
        $img = str_replace(url('uploads/articles').'/', '', $request->avatar);
        $request->merge(['avatar'=>$img]);
        $data['slug'] = str_slug($request->title);
        $data['date'] = now();
        if(Article::create($data))
        {
            return redirect()->route('admin.article.list')->with('thongbao','Tạo bài viết thành công!');
        }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $articles = Article::find($id);

        return view('admin::article.show',compact('articles'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin::article.edit' ,compact('article'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateArticleRequest $request, $id)
    {
        $data = $request->except('_token', '_method');
        //chuyển đổi link hình ảnh , chỉ lấy mỗi tên
        $img = str_replace(url('uploads/articles').'/', '', $request->avatar);
        $request->merge(['avatar'=>$img]);
        $data['slug'] = str_slug($request->title);
        $data['date'] = now();
         DB::table('articles')->where('id', $id)->update($data);
        return redirect()->route('admin.article.list')->with('thongbao','Chỉnh Sửa bài viết thành công!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        if($article->delete())
        {
            return response()->json(['success'=>'Bạn đã xóa thành công bài viết!']);
        }else
        {
            return response()->json(['errors'=>'Có lỗi , vui lòng kiểm tra lại']);
        }
    }

//HÀM LỌC BÀI VIẾT THEO TRẠNG THÁI ẨN HOẶC HIỆN
    public function FillterArticel($id)
    {
        $list_article = Article::where('active', $id)->get();
        // dd($list_article);
        foreach ($list_article as $art) 
        {
            ?>
                  <tr>
                    <td><?php echo $art['title'] ?> </td>

                    <td><?php echo $art['description'] ?></td>

                    <td>
                      <a href=""><span class="text-ellipsis label <?php echo $art->getStatus($art['active'])['class'] ?>"><?php echo $art->getStatus($art['active'])['name'] ?></span></a>
                    </td>
                    <td><?php echo $art['date'] ?></td>
                    <td>
                       <a href="<?php echo route('admin.article.edit', $art['id']) ?>"><button class="btn btn-default" type="button" title="Chỉnh sửa bài viết" data-id="<?php echo $art['id']  ?>" ><i class="fa fa-check text-success text-active"></i></button></a>

                      <button class="btn btn-default delete" title="Xóa bài viết" data-title ="<?php echo $art['name'] ?>"  data-toggle="modal" data-target="#delete" 
                      type="button" data-id="<?php echo $art['id'] ?>" ><i class="fa fa-times text-danger text"></i></button>

                      <a href="<?php echo route('admin.article.show', $art['id']) ?>"><button class="btn btn-default" title="Xem chi tiết" data-title ="<?php echo $art['name'] ?>" 
                      type="button" data-id="<?php echo $art['id'] ?>" ><i class="fa fa-eye text-primary text"></i></button></a>
                        
                    </td>
                  </tr>
                  <?php
        }
    
    }

//HÀM THAY ĐỔI TRẠNG THÁI BÀI VIẾT 0 ẨN 1 HIỆN
    public function unactivearticle($id)
    {
        Article::where('id', $id)->update(['active'=>0]);
        return redirect()->route('admin.article.list')->with('thongbao', 'Kích Hoạt Ẩn bài viết thành công');
    }

    public function activearticle($id)
    {
         Article::where('id', $id)->update(['active'=>1]);
        return redirect()->route('admin.article.list')->with('thongbao', 'Kích Hoạt Hiện bài viết thành công');
    }


}
