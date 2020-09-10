<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }
     public function login(Request $request)
    {
        $data = $request->only('email', 'password');
       
        if(Auth::attempt($data, $request->has('remember')))
        { 
            if(Auth::user()->role == 1)
                return redirect('admin')->with('thongbao', 'Đăng nhập thành công');
            else if(Auth::user()->role == 0)
                return redirect()->route('admin.cate.list')->with('thongbao', 'Đăng nhập thành công');
            // else if(Auth::user()->role == 3)
            //     return redirect()->route('orders.index')->with('thongbao', 'Đăng nhập thành công');
        }
        else
        {
            return redirect()->route('login.admin')->with('thongbao', 'Đăng nhập thất bại, vui lòng kiểm tra lại!');
        }
    }

    public function logout()
    {
        if(Auth::check())
        {
            Auth::logout();
            return redirect()->route('login.admin')->with('thongbao','Đăng xuất thành công');
        }
    }

    public function file()
    {
        return view('admin::file.list');
    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
