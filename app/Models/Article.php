<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    
   	protected $guarded = ['']; 

   	const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    protected $status = [
        1 =>[
            'name'=>'Hiển Thị',
            'class'=> 'label-primary'
        ],
        0 =>[
            'name'=>'Ẩn',
            'class'=> 'label-default'
        ]
        ];
    public function getStatus() {
        return array_get($this->status, $this->active, '[N\A]');
    }
}
