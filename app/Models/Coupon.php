<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';

    protected $guarded = [''];

   

    public function product()
    {
    	return $this->belongsTo('App\Models\Product','product_id', 'id');
    }

    public function order()
    {
        return $this->hasMany('App\Models\Order', 'coupon_id', 'id');
    }

    //hàm check hạn sử dụng của mã giảm giá
    public function getExpiredAttribute(){

    	//dd(date('Y-m-d'), $this->end_date);

    	return date('Y-m-d') > $this->end_date ? true : false;	

    }
}
