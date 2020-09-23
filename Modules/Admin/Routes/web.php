<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin'], function() {
    Route::get('/', 'AdminController@index')->name('admin.index');
    
    //login, logout
    Route::view('/dang-nhap', 'admin::login')->name('login.admin');
    Route::post('/login', 'AdminController@login')->name('admin.login');
    Route::get('/logout', 'AdminController@logout')->name('admin.logout');


    //file
    Route::get('file','AdminController@file')->name('admin.file.add');

    //category
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'AdminCategoryController@index')->name('admin.cate.list');
        Route::post('/create', 'AdminCategoryController@store')->name('admin.cate.create');
        Route::delete('/delete/{id}', 'AdminCategoryController@destroy')->name('admin.cate.delete');
        Route::get('/edit/{id}','AdminCategoryController@edit')->name('admin.cate.edit');
        Route::put('/update/{id}','AdminCategoryController@update')->name('admin.cate.update');
    });

    //product
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', 'AdminProductController@index')->name('admin.pro.list');
        Route::get('/create', 'AdminProductController@create')->name('admin.pro.create');
		Route::post('/create', 'AdminProductController@store')->name('admin.pro.store');
		Route::delete('/delete/{id}', 'AdminProductController@destroy')->name('admin.pro.delete');
        Route::get('/edit/{id}','AdminProductController@edit')->name('admin.pro.edit');
        Route::put('/update/{id}','AdminProductController@update')->name('admin.pro.update');
        Route::get('show/{id}', 'AdminProductController@show')->name('admin.pro.show');
        Route::get('/{action}/{id}', 'AdminProductController@action')->name('admin.get.action.product');
    });

    //article
     Route::group(['prefix' => 'articles'], function () {
        Route::get('/', 'AdminArticleController@index')->name('admin.article.list');
        Route::get('/create', 'AdminArticleController@create')->name('admin.article.create');
        Route::post('/create', 'AdminArticleController@store')->name('admin.article.store');
        Route::delete('/delete/{id}','AdminArticleController@destroy')->name('admin.article.delete');
        Route::get('/edit/{id}','AdminArticleController@edit')->name('admin.article.edit');
        Route::put('/update/{id}','AdminArticleController@update')->name('admin.article.update');
        Route::get('/show/{id}', 'AdminArticleController@show')->name('admin.article.show');
        Route::get('unactive-article/{id}', 'AdminArticleController@unactivearticle')->name('admin.article.unactive');
        Route::get('active-article/{id}', 'AdminArticleController@activearticle')->name('admin.article.active');
        Route::get('fillterArticel/{id}', 'AdminArticleController@FillterArticel')->name('admin.article.fillterArticel');
        
    });
    
    //coupon
    Route::group(['prefix' => 'coupons'], function () {
        Route::get('/', 'AdminCouponController@index')->name('admin.coupon.list');
        Route::get('/create', 'AdminCouponController@create')->name('admin.coupon.create');
        Route::get('/applyType/{id}', 'AdminCouponController@applyType')->name('admin.coupon.fill');
        Route::get('/applyType1/{id}', 'AdminCouponController@applyType1')->name('admin.coupon.fill1');
        Route::post('/create', 'AdminCouponController@store')->name('admin.coupon.store');
        Route::get('/show/{id}', 'AdminCouponController@show')->name('admin.coupon.show');
        Route::get('/edit/{id}','AdminCouponController@edit')->name('admin.coupon.edit');
        Route::put('/update/{id}','AdminCouponController@update')->name('admin.coupon.update');
        Route::delete('delete/{id}','AdminCouponController@destroy')->name('admin.coupon.delete');
    });

    //order
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', 'AdminOrderController@index')->name('admin.order.list');
        Route::get('/fillterOrder/{id}', 'AdminOrderController@fillterOrder')->name('admin.order.fillter');
        Route::get('/chi-tiet-don-hang/{id}', 'AdminOrderController@show')->name('admin.order.show');
        Route::post('/xu-ly-don-hang/{id}/process','AdminOrderController@processOrder')->name('admin.order.process');
        Route::get('trang-thai-don-hang', 'AdminOrderController@status')->name('admin.order.status');
    });

    //đánh giá sản phẩm
     Route::group(['prefix' => 'ratings'], function () {
        Route::get('/', 'AdminRatingController@index')->name('admin.rating.list');
        Route::get('/chi-tiet-danh-gia/{id}','AdminRatingController@show')->name('admin.rating.show');
        Route::delete('/delete/{id}', 'AdminRatingController@destroy')->name('admin.rating.delete');
       
    });

});


