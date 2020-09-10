<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $guarded = ['']; // tương tự như fillable , nhưng gọn hơn.

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    const HOT_ON = 1;
    const HOT_OFF = 0;

    protected $status = [
        1 =>[
            'name'=>'Public',
            'class'=> 'label-primary'
        ],
        0 =>[
            'name'=>'Private',
            'class'=> 'label-default'
        ]
        ];

    protected $noibat = [
        1 =>[
            'name'=>'Nổi Bật',
            'class'=> 'label-success'
        ],
        0 =>[
            'name'=>'Không',
            'class'=> 'label-default'
        ]
    ];

    public function getStatus() {
        return array_get($this->status, $this->active, '[N\A]');
    }

    public function getHots() {
        return array_get($this->noibat, $this->hot, '[N\A]');
    }


    public function category(){
        return $this->belongsTo('App\Models\Category','category_id','id');
    }

    public function coupons()
    {
        return $this->hasMany('App\Models\Coupon', 'product_id', 'id');
    }
    
    public function OrderDetails()
    {
        return $this->hasMany('App\Models\OrderDetails', 'product_id', 'id');
    }
    public function ratings()
    {
        return $this->hasMany('App\Models\Rating','product_id','id');
    }
}
