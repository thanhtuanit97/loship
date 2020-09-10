<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function getproductbycate(Request $request)
    {
    	$url = $request->segment(2);
    	$url = preg_split('/(-)/i', $url);

    	if($id = array_pop($url))
    	{
    		$products = Product::where([
    			'category_id' => $id,
    			'active' 	  => Product::STATUS_PUBLIC
    		])->orderByDesc('id')->paginate(10);

    		$categories = Category::where(['c_active'=>Category::STATUS_PUBLIC])->get();
    		$category_by_id = Category::find($id);

    		$viewData = [
    		'products'	=> $products,
    		'categories'	=> $categories,
    		'category_by_id'=>$category_by_id,
    		];

    		return view('product.productwithcate', $viewData);
    	}
    	
    	return redirect('/');
    }
}
