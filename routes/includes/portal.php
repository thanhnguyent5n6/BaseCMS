<?php

Route::get('/', function(){
    // di chuyển đến route admin/user
    return redirect()->route('portal.index');
});

Route::get('/index','Portal\PageController@index')->name('portal.index');
Route::get('add-to-cart/{id}','Portal\PageController@postAddToCart')->name('portal.add_to_cart');
Route::get('by-now/{id}','Portal\PageController@buyNow')->name('portal.by_now');

Route::get('product/{slug}','Portal\ProductController@detail')->name('portal.product.detail');

Route::get('category/{slug}','Portal\PageController@loadByCategory')->name('portal.load_by_category');
Route::post('load-product-in-category','Portal\PageController@loadProductByCategory')->name('portal.load_product_by_category');


Route::post('/load-cart','Portal\PageController@loadCart')->name('portal.load_cart');
Route::post('/remove-cart-item','Portal\PageController@removeCartItem')->name('portal.remove_cart_item');

Route::get('/checkout','Portal\CheckoutController@getCheckout')->name('portal.checkout.index');
Route::post('post-checkout','Portal\CheckoutController@postCheckout')->name('portal.post.checkout');

Route::get('/introduce','Portal\PageController@introduce')->name('portal.introduce');
Route::get('/contact','Portal\PageController@contact')->name('portal.contact');

Route::group(['prefix' => 'post'], function() {
    Route::get('/','Portal\PostController@index')->name('portal.post');
    Route::post('/load','Portal\PostController@load')->name('portal.post.load');
    Route::get('/{slug}','Portal\PostController@detail')->name('portal.post.detail');
});

/*Route::get('/', function () {
    return view('index');
});
Route::get('index',[
    'as'=>'trang-chu',
    'uses'=>'PageController@getIndex',
]);
Route::get('product-type/{type}',[
    'as'=>'loai-san-pham',
    'uses'=>'PageController@getProductType',
]);
Route::get('about',[
    'as'=>'gioi-thieu',
    'uses'=>'PageController@getAbout',
]);
Route::get('contacts',[
    'as'=>'lien-he',
    'uses'=>'PageController@getContacts',
]);
Route::get('product/{id}',[
    'as'=>'chitietsanpham',
    'uses'=>'PageController@getProductDetail',
]);

Route::post('add-to-cart/{id}',[
    'as'=>'them-gio-hang',
    'uses'=>'PageController@postAddToCart',
]);
Route::get('delete-cart/{id}',[
    'as'=>'xoa-gio-hang',
    'uses'=>'PageController@getDelItemCart',
]);

Route::get('checkout','Portal\CheckoutController@getCheckout')->name('checkout');
Route::post('post-checkout','Portal\CheckoutController@postCheckout')->name('post.checkout');

Route::get('signup','Portal\LoginController@getSignup')->name('dang-ky');
Route::post('post-signup','Portal\LoginController@postSignup')->name('dang-ky');
Route::get('signin','Portal\LoginController@getSignin')->name('dang-nhap');
Route::post('post-signin','Portal\LoginController@postSignin')->name('dang-nhap');
Route::get('signout','Portal\LoginController@postSignout')->name('dang-xuat');

Route::get('search',[
    'as'=>'tim-kiem',
    'uses'=>'PageController@getSearch',
]);

Route::get('/home','PageController@getIndex');
Route::get('','PageController@getIndex');*/
