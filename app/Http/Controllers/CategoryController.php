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
    		]);
            if($request->price)
            {
                $price = $request->price;
                switch ($price) {
                    case '1':
                        $products->where('price','<',1000000);
                        break;
                     case '2':
                        $products->whereBetween('price', [1000000, 5000000]);
                        break;
                     case '3':
                        $products->whereBetween('price', [5000000, 8000000]);
                        break;
                     case '4':
                        $products->whereBetween('price', [8000000, 15000000]);
                            break;
                     case '5':
                        $products->where('price','>',15000000);
                            break;

                    
                    default:
                        // code...
                        break;
                }
            }

            if($request->orderby)
            {
                $orderby = $request->orderby;
                switch ($orderby) {
                    case 'desc':
                        $products->orderByDesc('id');
                        break;
                    case 'asc':
                        $products->orderBy('id','ASC');
                        break;
                    case 'price_max':
                          $products->orderByDesc('price');
                        break;
                    case 'price_min':
                    $products->orderBy('price','ASC');
                      
                        break;
                    default:
                        // code...
                        break;
                }
            }
            $products = $products->orderByDesc('id')->paginate(10);

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
