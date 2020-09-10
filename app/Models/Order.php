<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $guarded = [''];

    const DON_MOI = 0;
    const DA_XU_LY = 1;
    const DANG_GIAO = 2;
    const DA_GIAO = 3;
    const HUY_DON = 4;

   protected $trangthai = [
    0 =>[
        'name'=>'Đơn Mới',
        'class'=> 'label-primary'
    ],
    1 =>[
        'name'=>'Đã Xử Lý',
        'class'=> 'label-info'
    ],
    2 =>[
        'name'=>'Đang Giao',
        'class'=> 'label-default'
    ],
    3 =>[
        'name'=>'Đã Giao',
        'class'=> 'label-success'
    ],
    4=>[
         'name'=>'Hủy Đơn',
        'class'=> 'label-danger'
    ]
    ];


    public function getStatus()
    {
        return array_get($this->trangthai, $this->status, '[N\A]');
    }

    public function orderDetails()
    {
    	return $this->hasMany('App\Models\OrderDetails', 'order_id', 'id');
    }

    public function coupon()
    {
    	return $this->belongsTo('App\Models\Coupon', 'coupon_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

}
