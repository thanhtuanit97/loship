<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Product;


class RatingController extends Controller
{
    public function saveRating(Request $request, $id)
    {
    	if( $request->ajax())
    	{

    		Rating::insert([
    			'product_id'  => $id,
    			'user_id'     => get_data_user('web'),
    			'number'      => $request->number,
    			'content'     => $request->content,
    			'created_at'  =>now(),
    			'updated_at'  =>now()
    		]);

    		$product = Product::find($id);
    		$product->total_number += $request->number;
    		$product->total_rating += 1;
    		$product->save();

    		return response()->json(['success'=>'1'], 200);

    	}
    }
}
