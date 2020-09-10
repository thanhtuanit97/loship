<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;
use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productDetail($id)
    {
       $categories = Category::where(['c_active'=>Category::STATUS_PUBLIC])->get();
       $products   = Product::where('id', $id)->with('coupons')->first();
       $ratings    = Rating::with('user')->where('product_id', $id)->orderbyDesc('id')->get();

       //đếm số rating theo từng sao theo từng sản phẩm 
       $ratingsDashboard = Rating::groupBy('number')
       ->where('product_id', $id)
       ->select(DB::raw('count(number) as total'),DB::raw('sum(number) as sum'))
       ->addSelect('number')
       ->get()
       ->toArray();
      

       //trường hợp các sao k có đánh giá thì sẽ gán cho nó mảng rỗng
       $arrayRatings= []; 

       if(!empty($ratingsDashboard)) // nếu có giá trị mảng ratingsDashboard
       {
        for($i = 1; $i <= 5; $i++)//lặp từ 1-5 tương ứng vs 1* đên 5*
        {
            $arrayRatings[$i] = [ //khai bao mặc định mảng arayRatings là một mảng rỗng
                "total" => 0,
                "sum" => 0,
                "number" => 0
            ];
            // dd($arrayRatings);
            foreach($ratingsDashboard as $items) //lặp qua giá trị vừa lấy được ở trên
            {
                if($items['number'] == $i ) //nếu như giá trị number bằng vị trí thứ $i
                {
                    $arrayRatings[$i] = $items; // giá trị mảng thứ i bằng chính item đó
                    continue;//bỏ qua vòng lặp tiếp tục thực hiện
                }
            }
        }
       }
     
        $viewData =[ 
            'categories'        =>$categories,
            'products'          =>$products,
            'ratings'           =>$ratings,
            'arrayRatings'      =>$arrayRatings,
        ];

        return view('product.productDetail', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
