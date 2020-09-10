<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckInforOrderRequest;
use Auth;
use Cart;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Coupon;
use Session;
use Mail;
use App\Mail\OrderBillMail;
class CheckOutController extends Controller
{
    public function checkout()
    {
    	return view('checkout.formPay');
    }

    public function order_place(CheckInforOrderRequest $request)
    {
    	//lấy thông tin trừ trang web về
    	$data_order = $request->all();
    	// dd($data_order);
    	$content= Cart::content();
    	// if($content['coupon_id'])
    	// {
    	// 	$number = Coupon::find($order['coupon_id']);

    	// }
    	// // dd($data_order);
    	$order= array();

    	  //lưu thông tin đơn hàng cho bảng order
		$order['name']=Auth::user()->name;
		$order['user_id']=Auth::user()->id;
		$order['order_total']=$data_order['order_total'];
		$order['status']="0";
		$order['date']=now();
		$order['address']=$request->address;
		$order['phone']=$request->phone;
		$order['user_name']=$request->name;	
		$order['coupon_id'] = $data_order['coupon_id'];	
		$order['note'] = $data_order['note'];

		//tạo đơn hàng và lưu vào 1 biên ten mOder
		$mOrder = Order::create($order);

		//check nếu có coupon thì phải trừ số lượng coupon trong DB ra.
		if($order['coupon_id']){
			$coupon_time = Coupon::find($order['coupon_id']);
			$coupon['time_code'] = $coupon_time['time_code']-1;
			Coupon::find($order[ 'coupon_id'])->update($coupon);
		}


		//lấy order_id ra
		$order_id=$mOrder->id;


		 //lưu thông tin cho bảng orderDetails
		$order_details=[];
		foreach ($content as $key => $v_content) { //lặp giỏ hàng của mình ra
			$order_detail['order_id']=$order_id;
			$order_detail['product_id']=$v_content->id;
			//xử lý số lượng ( kiểm tra số lượng trong giỏ hàng so với số lượng trong DB)
			$product = Product::find($v_content->id);

			$data['quantity'] = $product['quantity']-$v_content->qty;
			//nếu không thõa mãn thì return tbao lỗi
			if($data['quantity'] < 0){
				return redirect()->back()->with('thongbao','Sản Phẩm trong kho còn không còn đúng số lượng bạn đã đặt');
			}
			//nếu thõa thì update lại số lượng sản phẩm khi đặt hàng thành công.
			Product::find($v_content->id)->update($data);
			///
			$order_detail['quantity']=$v_content->qty;
			$order_detail['price']=$v_content->price;
			$order_details[$key]=OrderDetails::create($order_detail);		
		}
        
		mail::to(Auth::user()->email)->send(new OrderBillMail($mOrder,$order_details));
		Cart::destroy();
		Session::forget('coupon');
		return redirect()->route('home.index')->with('thongbao','Đặt Hàng Thành Công');
	}
    	
    
}
