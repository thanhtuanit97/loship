<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Product;
use App\Models\Rating;

class AdminRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $products = Product::select('id','name','total_number','total_rating')->with('ratings');
        //tim kiem spham 
        if($request->name) $products->where('name', 'like', '%'.$request->name.'%');
        $products = $products->orderbyDesc('id')->paginate(10);

        $viewData = [
            'products' => $products
        ];
        return view('admin::rating.list', $viewData);
    }

   
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $ratings = Rating::with('product')->with('user')->where('product_id', $id)->paginate(10);
        $products = Product::find($id);
        // dd($products);
        $viewData = [
            'ratings' => $ratings,
            'products' =>$products
        ];
        return view('admin::rating.show', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $ratings = Rating::find($id);
        $product_id = $ratings->product_id;

        if($ratings->delete())
        {
             $products = Product::find($product_id);
            $products->total_number -= $ratings->number;
            $products->total_rating -= 1;
            $products->save();
            return response()->json(['success'=>'Đã Xóa Đánh Giá Sản Phẩm Thành Công!']); 
        } else 
        {
            return response()->json(['errors'=>'Thất bại, vui lòng kiểm tra lại!']);
        }
    }
}
