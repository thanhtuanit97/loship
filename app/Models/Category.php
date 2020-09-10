<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'c_name', 'c_slug', 'c_icon', 'c_avatar', 'c_active', 'c_total_product', 
        'c_title_seo', 'c_description_seo', 'c_keyword_seo'
    ];

    
    
    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

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
    public function getStatus() {
        return array_get($this->status, $this->c_active, '[N\A]');
    }



    public function products()
    {
        return $this->hasMany('App\Models\Product','category_id','id');
    }
   
}
