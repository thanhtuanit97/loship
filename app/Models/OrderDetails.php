<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'order_details';
    protected $guarded = [''];

    public function order()
    {
    	return $this->belongsTo('App\Models\Order', 'order_id', 'id');
    }

    public function product()
    {
    	return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}
