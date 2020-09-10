<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Http\Requests\StoreCouponRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Coupon;
use DB;


class AdminCouponController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $list_coupon = Coupon::with('product')->orderByDesc('id')->get();

        $viewData = [
            'list_coupon'=>$list_coupon,
        ];
        // dd($list_coupon);
        return view('admin::coupon.list', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $list_cate = Category::all();
        $list_pro = Product::select('id', 'name')->get();

        $viewData = [
            'list_cate'   => $list_cate,
            'list_pro'    => $list_pro
        ];
        return view('admin::coupon.add', $viewData);
    }

 

     public function applyType($id)
    { 
        $list_products= Product::select('id', 'name')->get();
        ?> <select id="" name="product_id"  class="form-control" >
                <option value="">---Chọn Sản Phẩm---</option>
                <?php if(isset($list_products)) {
                    foreach($list_products as $value) { ?>

                        <option value="<?php echo $value['id'] ?>" ><?php echo $value['name'] ?></option>
                  <?php  }  ?>                                      
            </select> 
            <?php } ?>
        <?php
    }

    public function applyType1($id)
    { 
       
      ?> <input type="text" class="form-control price"  name="code" value="<?php echo old('code') ?>" id="demo">
      <label for="">Số Lược Mã :</label> 
        <input type="text" name="time_code" value="<?php echo old('time_code') ?>" class="form-control">
      <?php
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreCouponRequest $request)
    {
        $data = $request->all();
        // dd($data);
        // dd($data);
        if(Coupon::create($data))
        {
            return redirect()->route('admin.coupon.list')->with('thongbao', 'Bạn đã thêm mã giảm giá thành công');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $list_coupon = Coupon::with('product')->find($id);
       
       
        $viewData = [
            'list_coupon'=>$list_coupon,
        ];
// dd($id_category);
        return view('admin::coupon.show', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $list_products= Product::select('id', 'name')->get();
        $coupons = Coupon::find($id);
        $viewData = [
            'coupons' =>$coupons,
            'list_products'=>$list_products
        ];
        return view('admin::coupon.edit', $viewData);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token', '_method');
        if( DB::table('coupons')->where('id', $id)->update($data))
        {
            return redirect()->route('admin.coupon.list')->with('thongbao', 'Sửa Mã Giảm Giá Thành Công');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $coupons = Coupon::find($id);
         if($coupons->delete())
        {
            return response()->json(['success'=>'Đã Xóa Mã Giảm Giá Thành Công!']);
        } else {
            return response()->json(['error'=>'Có Lỗi Vui Lòng Kiểm Tra Lại!']);
        }

    }
}
