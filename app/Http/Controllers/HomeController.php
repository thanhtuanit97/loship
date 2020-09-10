<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\checkLoginRequest;
use App\Http\Requests\checkRegisterequest;
use App\Models\Category;
use App\Models\Article;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\User;
use DB;
use Auth;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where(['c_active'=>Category::STATUS_PUBLIC])->get();

        $articles = Article::where(['active'=>Article::STATUS_PUBLIC])->orderByDesc('id')->limit(3)->get();

        $productHot = Product::where([
            'hot'=>Product::HOT_ON,
            'active'=>Product::STATUS_PUBLIC
        ])->with('coupons')->orderByDesc('id')->get();

        $productNew = Product::orderByDesc('id')->with('coupons')->limit(10)->get();

      
        // dd($productNew);

        $viewData = [
            'categories'=>$categories,
            'articles'=>$articles,
            'productHot'=>$productHot,
            'productNew'=>$productNew,
        ];
        
        return view('index', $viewData);
    }


    public function login(checkLoginRequest $request)
    {
        $data = $request->only('email', 'password');
        if(Auth::attempt($data, $request->has('rememberme')))
        {
            if(Auth::user()->role == 0){
                return redirect()->route('home.index')->with('thongbao', 'Đăng nhập thành công');
            }
            else if(Auth::user()->role == 1){
                return redirect('/admin')->with('thongbao', 'Đăng nhập thành công');
            }
        }
    }

    public function logout()
    {
        if(Auth::check())
        {
            Auth::logout();
            return redirect()->route('home.index')->with('thongbao','Đăng xuất thành công');
        }
    }

    public function register(checkRegisterequest $request)
    {
        $data = $request->only('name','address', 'phone','email' );
        $data['password'] = Hash::make($request->password);
        // dd($data);
       if(User::create($data)){
        return redirect()->route('login')->with('thongbao', 'Bạn đã đăng ký tài khoản thành công!');
       }
        

    }
    

    public function orderHistory()
    {
         $categories = Category::where(['c_active'=>Category::STATUS_PUBLIC])->get();
        return view('home.orderHistory', compact('categories'));
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
