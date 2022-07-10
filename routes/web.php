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

use \Illuminate\Support\Facades\Route;

Route::auth();

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/', function(){
    // di chuyển đến route admin/user
    return redirect()->route('portal.index');
});

Route::get('/','Portal\PageController@index')->name('portal.index');
Route::get('add-to-cart/{id}','Portal\PageController@postAddToCart')->name('portal.add_to_cart');
Route::get('by-now/{id}','Portal\PageController@buyNow')->name('portal.by_now');

Route::get('san-pham','Portal\ProductController@index')->name('portal.product.index');
Route::post('load-products','Portal\ProductController@loadProducts')->name('portal.load_product_page');
Route::get('san-pham/{slug}','Portal\ProductController@detail')->name('portal.product.detail');

Route::get('danh-muc/{slug}','Portal\PageController@loadByCategory')->name('portal.load_by_category');
Route::post('load-product-in-category','Portal\PageController@loadProductByCategory')->name('portal.load_product_by_category');


Route::post('/load-cart','Portal\PageController@loadCart')->name('portal.load_cart');
Route::post('/remove-cart-item','Portal\PageController@removeCartItem')->name('portal.remove_cart_item');

Route::get('/checkout','Portal\CheckoutController@getCheckout')->name('portal.checkout.index');
Route::post('post-checkout','Portal\CheckoutController@postCheckout')->name('portal.post.checkout');

Route::get('/gioi-thieu','Portal\PageController@introduce')->name('portal.introduce');
Route::get('/lien-he','Portal\PageController@contact')->name('portal.contact');

Route::post('/tim-kiem','Portal\PageController@globalSearch')->name('portal.global_search');

Route::group(['prefix' => 'post'], function() {
    Route::get('/','Portal\PostController@index')->name('portal.post');
    Route::post('/load','Portal\PostController@load')->name('portal.post.load');
    Route::get('/{slug}','Portal\PostController@detail')->name('portal.post.detail');
});

include_once(base_path() . '/routes/includes/login.php');
include_once(base_path() . '/routes/includes/admin.php');