<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $list_category = Category::orderBy('id', 'desc')->paginate(5);
        $viewData = [
            'list_category'=>$list_category
        ];
        return view('admin::category.list', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    // public function create()
    // {
    //     return view('admin::create');
    // }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['c_slug'] =  \str_slug($request->c_name);
        if(Category::create($data))
        {
            return response()->json(['success'=>'Thêm Danh Mục Thành Công'], 200);
        } else
        {
            return response()->json(['errors'=>'Vui lòng kiểm tra lại '], 422);
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return response()->json($category, 200);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update([
            'c_name'=> $request->c_name, 
            'c_icon'=> $request->c_icon,
            'c_title_seo'=>$request->c_title_seo,
            'c_description_seo'=>$request->c_description_seo,
        ]);
        return response()->json(['success'=>'Sửa Danh Mục Thành Công']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if($category->delete())
        {
            return response()->json(['success'=>'Đã Xóa Thành Công!']);
        } else {
            return response()->json(['error'=>'Có Lỗi Vui Lòng Kiểm Tra Lại!']);
        }
    }
}
