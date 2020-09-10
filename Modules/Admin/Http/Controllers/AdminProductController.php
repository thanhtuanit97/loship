<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use DB;
use File;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list_product = Product::with('category');
        $list_category = Category::get();

        //search product
        if($request->name) $list_product->where('name', 'like', '%'.$request->name.'%');
        //lọc theo danh mục
        if($request->cate) $list_product->where('category_id', $request->cate);

        $list_product = $list_product->orderByDesc('id')->paginate(10);

        $viewData = [
            'list_product'=>$list_product,  
            'list_category'=>$list_category
        ];
        return view('admin::product.list', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $list_category = Category::get();
        return view('admin::product.add', compact('list_category'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreProductRequest $request)
    {

        if($request->hasFile('avatar'))
        {
            $file = upload_image('avatar');
            if(isset($file['name']))
            {
                $data = $request->all();
                $data['slug'] = str_slug($request->name);
                $data['avatar'] = $file['name'];
                Product::create($data);
                return redirect()->route('admin.pro.list')->with('thongbao','Bạn đã Thêm sản phẩm thành công!');
            }
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
       $product = Product::with('category')->where('id',$id)->with('coupons')->get();  
       // dd($product);    
        $list_category = Category::with('products')->get();
       $viewData = [
        'product'=>$product,
        'list_category'=>$list_category
        ];
        // dd($product);
        return view('admin::product.show', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $list_category = Category::with('products')->get();
        $viewData = [
            'product'=>$product,
            'list_category'=>$list_category
        ];
        return view('admin::product.edit', $viewData);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateProductRequest $request, $id)
    {

        $data = $request->except('_token', '_method');
        if($request->hasFile('avatar'))
        {
            $file = upload_image('avatar');
            if(isset($file['name']))
            {
                $data['slug'] = str_slug($request->name);
                $data['avatar'] = $file['name'];
                 DB::table('products')->where('id', $id)->update($data);
                return redirect()->route('admin.pro.list')->with('thongbao','Bạn đã sửa sản phẩm thành công!');
            }
        }
          DB::table('products')->where('id', $id)->update($data);
        return redirect()->route('admin.pro.list')->with('thongbao','Bạn đã sửa sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        File::delete('uploads/product/'.$product['image_list']);
        if($product->delete())
        {
            return response()->json(['success'=>'Đã Xóa Sản Phẩm Thành Công!']);
        } else {
            return response()->json(['error'=>'Có Lỗi Vui Lòng Kiểm Tra Lại!']);
        }
    }

    public function action($action, $id)
    {
        if($action)
        {
            $products = Product::find($id);
            switch ($action) {
                case 'active':
                    $products->active = $products->active ? 0 :1;
                    
                    break;
                case 'hot':
                    $products->hot = $products->hot ? 0 :1;
                   
                    break;
            }
            $products->save();
        }
        return redirect()->back();
    }
}
