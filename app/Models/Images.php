<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';
    protected $fillable = [
    	'id', 'product_id', 'path_image'
    ];


    public function product()
    {
    	return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}
