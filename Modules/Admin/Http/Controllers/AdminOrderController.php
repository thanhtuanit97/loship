<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list_order = Order::with('user');
      

        //search theo ten khach hang
        if($request->name) $list_order->where('name', 'like', '%'.$request->name.'%');

        $list_order = $list_order->orderByDesc('id')->paginate(10);
        $viewData = [
            'list_order'=>$list_order
        ];
        return view('admin::order.list', $viewData);
    }

    public function fillterOrder($id)
    {
        $orderStatus = Order::where('status', $id)->get()->toArray();
        // dd($orderStatus);
        foreach($orderStatus as $key => $value) {
            ?>
               <tr>
                      <td><?php echo  $key+1 ?> </td>
                      <td><?php echo $value['name'] ?></td>
                      <td><?php echo $value['date']?></td>

                      <td><?php  echo number_format($value['order_total']).' '.'đ'?></td>
                      <td>
                        <?php  
                        if($value['status'] == 0) { ?>
                          <span class="text-ellipsis label label-primary">Đơn Mới </span>
                           <?php  } else if($value['status'] == 1) {?>
                          <span class="text-ellipsis label label-info"> Đã Xử Lý</span>
                          <?php  } else if($value['status'] == 2) { ?>
                            <span class="text-ellipsis label label-success"> Đã Giao</span>
                          <?php } else { ?>
                            <span class="text-ellipsis label label-danger"> Hủy Đơn</span>
                            <?php }  ?>
                      </td>
                      <td>
                        <button class="btn btn-default delete" title="Xóa đơn hàng" data-title ="<?php echo $value['name'] ?>"  data-toggle="modal" data-target="#delete" 
                        type="button" data-id="<?php echo $value['id'] ?>" ><i class="fa fa-times text-danger text"></i></button>

                        <a href=""><button class="btn btn-default" title="Xem chi tiết" data-title ="<?php echo $value['name'] ?>" 
                        type="button" data-id="<?php echo $value['id'] ?>" ><i class="fa fa-eye text-primary text"></i></button></a>
                          
                      </td>
                    </tr>
            <?php
        }
    }


  
   
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $list_orderInfor = Order::with('coupon')->with('user')->where('id', $id)->first();
        $list_orderDetails = OrderDetails::with('product')->where('order_id', $id)->get()->toArray();
        // dd($list_orderDetails);
        $viewData = [
            'list_orderInfor' => $list_orderInfor,
            'list_orderDetails'=>$list_orderDetails
        ];
         return view('admin::order.show', $viewData);
        
    }

    //xử lý trạng thái đơn hàng trong view order
        public function processOrder(Request $request, $id)
        {
            \Log::info(json_encode(Order::find($id)->toArray));
            Order::find($id)->update(['status'=>$request->status]);
            
            return response()->json(['success'=>'Cập Nhật Thành Công'],200);
        }

        public function status()
        {
            return view('admin::order.status');
        }


   
}
