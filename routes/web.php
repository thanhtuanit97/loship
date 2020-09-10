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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
 //login, logout
 Route::view('/login', 'home.login')->name('login');
 Route::view('register', 'home.register')->name('register');
 Route::post('/login', 'HomeController@login')->name('user.login');
 Route::get('/logout', 'HomeController@logout')->name('user.logout');
 Route::post('register', 'HomeController@register')->name('user.register');

//home
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/lich-su-mua-hang','HomeController@orderHistory')->name('order.hostory');

//contact
Route::get('lien-he', 'ContactController@index')->name('contact.index');


//hien thi bai viet chi tiet
Route::group(['prefix' => 'tin-tuc'], function () {
	Route::get('tin-tuc-thi-truong-24h','ArticleController@viewAllArticle')->name('article.index');
	Route::get('/{slug}-{id}','ArticleController@show')->name('article.show.byID');
});


//product
Route::get('/productDetails/{id}','ProductController@productDetail')->name('product-details');

//cate
Route::get('/danh-muc/{slug}-{id}', 'CategoryController@getproductbycate')->name('cate-with-product');

//cart
Route::get('/cart', 'CartController@showCart')->name('cart.index'); //show giỏ hàng
Route::post('save-cart','CartController@save_cart')->name('cart.save');//add giỏ hàng
Route::put('update-cart/{rowId}','CartController@updateCartQuantity')->name('cart.updateQty'); //cập nhật giỏ hàng
Route::delete('deleteCart/{rowId}', 'CartController@deleteCart')->name('delete.cart');//xóa sản phẩm khỏi giỏ hàng
Route::post('check-coupon','CartController@checkcoupon')->name('check-coupon'); //check mã giảm giá
Route::get('deleteCart','CartController@destroyCart')->name('destroyCart');//xóa toàn bộ giỏ hàng

//check out
 Route::group(['prefix' => 'gio-hang', 'middleware'=>'checkloginuser'], function () {
    Route::get('thanh-toan','CheckOutController@checkout')->name('check-out');
    Route::post('thanh-toan', 'CheckOutController@order_place')->name('order-place');
});

//rating san pham

  Route::group(['prefix' => 'ajax', 'middleware'=>'checkloginuser'], function () {
    Route::post('/danh-gia-san-pham/{id}', 'RatingController@saveRating')->name('saveRating');
});
