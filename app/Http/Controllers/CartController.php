<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Coupon;
use Session;
use Cart;
session_start();

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showCart()
    {
         $categories = Category::where(['c_active'=>Category::STATUS_PUBLIC])->get();

        return view('cart.cart', compact('categories'));
    }

    public function save_cart(Request $request)
    {
        $productID = $request->product_hidden;
        // dd($productID);

        $quantity = $request->qty;
        
        $priceSale = $request->priceSaleHidden;
        // dd($priceSale);

        $product_info = Product::where('id', $productID)->first();

        $data['id'] = $product_info->id;
        $data['name']=$product_info->name;
        $data['weight']=$product_info->price;
        $data['options']['image']=$product_info->avatar;

        if($request->qty>0){
            $data['qty']=$request->qty;
        }else{
            $data['qty']=1;
        }

        
        if($priceSale)
        {
            $data['price'] = $priceSale;
        }else {
            $data['price']=$product_info->price;
        }
        
          $content=Cart::content();
            foreach ($content as $key => $v_content) {

                if($v_content->id == $data['id']){
                    if($data['qty'] + $v_content->qty > $product_info->quantity){
                        $data['qty'] = $product_info->quantity - $v_content->qty;
                        if($data['qty'] == 0){
                            return redirect()->back()->with('thongbao', 'Đã Thêm Tối Đa Sản Phẩm Trong Kho Vào Giỏ Hàng Rồi');
                        }
                    }
                    if($data['qty']+$v_content->qty>10){
                        $data['qty'] = 10-$v_content->qty;
                        if($data['qty'] == 0){
                            return redirect()->back()->with('thongbao', 'Đã Thêm Tối Đa Sản Phẩm Trong Kho Vào Giỏ Hàng Rồi');
                        }
                    }
                }
            }

        if($data['qty']>$product_info->quantity){
                    $data['qty']=$product_info->quantity;
                    Cart::add($data);
                    return redirect()->back()->with('thongbao', ' Đã Thêm '.$data['qty'].' sản phẩm vào giỏ hàng');
                }else{
                    Cart::add($data);
                    return redirect()->back()->with('thongbao', 'Thêm '.$data['qty'].' sản phẩm vào giỏ hàng thành công');
                }
                // Cart::destroy();
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkCoupon(Request $request)
    {
        $data = $request->all();
        $coupon = Coupon::where('code', $data['couponCode'])->first();

        if($coupon)
        {
            if($coupon['time_code'] == 0)
            {
                return redirect()->back()->with('errors', 'Mã giảm giá đã hết.');
            } else if($coupon->expired)
            {
                return redirect()->back()->with('errors', 'Mã giảm giá hết hạn sử dụng');
            }
            //dem so luong ma giam gia
            $count_coupon = $coupon->count();
            // dd($count_coupon);
            if($count_coupon > 0)
            {
                $coupon_session=Session::get('coupon');
                if($coupon_session == true)
                {
                    $is_avaiable = 0;
                    if($is_avaiable == 0){
                        $cou[] = array(
                            'id'=> $coupon->id,
                            'code'=> $coupon->code,
                            'condition'=> $coupon->condition,
                            'number'=> $coupon->number,
                        );
                        Session::put('coupon',$cou);
                    }
                } else
                {
                    $cou[]=array(
                        'id'=> $coupon->id,
                        'code'=>$coupon->code,
                        'condition'=>$coupon->condition,
                        'number'=>$coupon->number,
                    );
                    Session::put('coupon',$cou);
                }
            }
            Session::save();
                return redirect()->back()->with('thongbao','Thêm Mã Giảm Giá Thành Công.');
        } else
        {
            return redirect()->back()->with('errors','Mã Giảm Giá Không Đúng.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCartQuantity(Request $request, $rowId)
    {
        $quantity = $request->cart_quantity;
        // dd($quantity);

        $id = $request->product_id_hidden;

        $product_info = Product::where('id',$id)->first();

        if($quantity > $product_info->quantity ){
            $quantity = $product_info->quantity; 
            Cart::update($rowId,$quantity);
            return redirect()->back()->with('thongbao','Vui Lòng không nhập quá số lượng sản phẩm trong kho');
        }

        Cart::update($rowId,$quantity);
        return redirect()->back()->with('thongbao','Cập Nhật Sản Phẩm Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCart($rowId)
    {
        Cart::update($rowId,0);
        return redirect()->back()->with('thongbao', 'xóa sản phẩm ra giỏ hàng thành công');

    }
    public function destroyCart()
    {
        Cart::destroy();
        return redirect()->back()->with('thongbao', 'Đã xóa toàn bộ giỏ hàng.');
    }
}
