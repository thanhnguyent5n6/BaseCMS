<?php
Route::get('admin', function(){
    // di chuyển đến route admin/user
    return redirect()->route('admin.index');
});

Route::group(['prefix' => 'file'], function() {
    Route::post('/upload','FileController@upload')->name('file.upload');
});

Route::group(array('prefix'=>'admin','middleware'=>'auth'),function(){

    Route::get('/', 'Admin\AdminController@index')->name('admin.index');

    Route::group(['prefix' => 'users'], function() {
        Route::get('/','Admin\UserController@index')->name('admin.user.index');
    });

    Route::group(['prefix' => 'categories'], function() {
        Route::get('/', 'Admin\CategoryController@index')->name('admin.categories.index');
        Route::get('/create', 'Admin\CategoryController@create')->name('admin.categories.create');
        Route::post('/store', 'Admin\CategoryController@store')->name('admin.categories.store');
        Route::get('/show/{id}', 'Admin\CategoryController@show')->name('admin.categories.show');
        Route::get('/edit/{id}', 'Admin\CategoryController@edit')->name('admin.categories.edit');
        Route::post('/update', 'Admin\CategoryController@update')->name('admin.categories.update');
        Route::post('/destroy', 'Admin\CategoryController@destroy')->name('admin.categories.destroy');
    });

    Route::group(['prefix' => 'products'], function() {
        Route::get('/', 'Admin\ProductController@index')->name('admin.products.index');
        Route::get('/create', 'Admin\ProductController@create')->name('admin.products.create');
        Route::post('/store', 'Admin\ProductController@store')->name('admin.products.store');
        Route::get('/show/{id}', 'Admin\ProductController@show')->name('admin.products.show');
        Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('admin.products.edit');
        Route::post('/update', 'Admin\ProductController@update')->name('admin.products.update');
        Route::post('/destroy', 'Admin\ProductController@destroy')->name('admin.products.destroy');
    });

    Route::group(['prefix' => 'posts'], function() {
        Route::get('/', 'Admin\PostController@index')->name('admin.posts.index');
        Route::get('/create', 'Admin\PostController@create')->name('admin.posts.create');
        Route::post('/store', 'Admin\PostController@store')->name('admin.posts.store');
        Route::get('/show/{id}', 'Admin\PostController@show')->name('admin.posts.show');
        Route::get('/edit/{id}', 'Admin\PostController@edit')->name('admin.posts.edit');
        Route::post('/update', 'Admin\PostController@update')->name('admin.posts.update');
        Route::post('/destroy', 'Admin\PostController@destroy')->name('admin.posts.destroy');
    });


    Route::post('register', 'AdminAuth\AuthController@register');

    Route::get('interface',[
        'as'=>'quan-li',
        'uses'=>'AdminController@getInterface',
    ]);
    Route::get('product',[
        'as'=>'ql-sp',
        'uses'=>'AdminController@getProduct',
    ]);

    Route::get('product/{id}','AdminController@getProductByCategory');

    Route::get('product-type/{id}',[
        'as'=>'sp-theo-loai',
        'uses'=>"AdminController@getProductType",
    ]);
    Route::get('delete-product/{id}',[
        'as'=>'xoa-sp',
        'uses'=>'AdminController@getDelProduct',
    ]);
    Route::get('edit-product/{id}',[
        'as'=>'sua-sp',
        'uses'=>'AdminController@getEditProduct',
    ]);
    Route::post('edit-product/{id}',[
        'as'=>'sua-sp',
        'uses'=>'AdminController@postEditProduct',
    ]);
    Route::get('category',[
        'as'=>'danh-muc-sp',
        'uses'=>'AdminController@getCategory'
    ]);
    Route::get('add-product',[
        'as'=>'them-sp',
        'uses'=>'AdminController@getAddProduct',
    ]);
    Route::post('add-product',[
        'as'=>'them-sp',
        'uses'=>'AdminController@postAddProduct',
    ]);
    Route::get('search-product',[
        'as'=>'tim-kiem-sp',
        'uses'=>'AdminController@getSearchProduct',
    ]);
    // -------------- Danh muc san pham --------------------
    Route::get('edit-category/{id}',[
        'as'=>'sua-danh-muc',
        'uses'=>'AdminController@getEditCategory'
    ]);
    Route::post('edit-category/{id}',[
        'as'=>'sua-danh-muc',
        'uses'=>'AdminController@postEditCategory'
    ]);
    Route::get('edit-category',[
        'as'=>'them-danh-muc',
        'uses'=>'AdminController@getAddCategory'
    ]);
    Route::post('edit-category',[
        'as'=>'them-danh-muc',
        'uses'=>'AdminController@postAddCategory'
    ]);
    Route::get('delete-category/{id}',[
        'as'=>'xoa-danh-muc',
        'uses'=>'AdminController@getDelCategory'
    ]);
    // -------------- Đơn hàng --------------------
    Route::get('bill',[
        'as'=>'don-hang',
        'uses'=>'AdminController@getBill',
    ]);
    Route::get('delete-bill/{id}',[
        'as'=>'xoa-don-hang',
        'uses'=>'AdminController@getDelBill',
    ]);
    Route::get('bill_detail/{id}',[
        'as'=>'chi-tiet-don-hang',
        'uses'=>'AdminController@getBillDetail',
    ]);
    Route::post('change-bill/{status}','AdminController@changeStatusBill');

    Route::get('bill-deploying',[
        'as'=>'dang-giao-hang',
        'uses'=>'AdminController@getBillDeploying',
    ]);
    Route::get('bill-success',[
        'as'=>'thanh-cong',
        'uses'=>'AdminController@getBillSuccess',
    ]);
    Route::get('bill-false',[
        'as'=>'tra-lai',
        'uses'=>'AdminController@getBillFalse',
    ]);
    Route::get('bill-destroy',[
        'as'=>'xoa-don-hang',
        'uses'=>'AdminController@getBillDestroy',
    ]);
    // -------------- Tin tức --------------------
    Route::get('news',[
        'as'=>'tin-tuc',
        'uses'=>'AdminController@getNews'
    ]);
    Route::get('edit-news/{id}',[
        'as'=>'sua-tin-tuc',
        'uses'=>'AdminController@getEditNews',
    ]);
    Route::post('edit-news/{id}',[
        'as'=>'sua-tin-tuc',
        'uses'=>'AdminController@postEditNews',
    ]);
    Route::get('delete-news/{id}',[
        'as'=>'xoa-bai-viet',
        'uses'=>'AdminController@getDelNews',
    ]);
    Route::get('add-news',[
        'as'=>'them-tin-tuc',
        'uses'=>'AdminController@getAddNews',
    ]);
    Route::post('add-news',[
        'as'=>'them-tin-tuc',
        'uses'=>'AdminController@postAddNews',
    ]);
    Route::get('category-news',[
        'as'=>'danh-muc-tin-tuc',
        'uses'=>'AdminController@getCategoryNews',
    ]);

    Route::get('slide',[
        'as'=>'quan-li-slide',
        'uses'=>'AdminController@getSlide',
    ]);
    Route::get('edit-slide/{id}',[
        'as'=>'sua-slide',
        'uses'=>'AdminController@getEditSlide',
    ]);
    Route::post('edit-slide/{id}',[
        'as'=>'sua-slide',
        'uses'=>'AdminController@postEditSlide',
    ]);
    Route::get('add-slide',[
        'as'=>'them-slide',
        'uses'=>'AdminController@getAddSlide',
    ]);
    Route::post('add-slide',[
        'as'=>'them-slide',
        'uses'=>'AdminController@postAddSlide',
    ]);
    Route::get('delete-slide/{id}',[
        'as'=>'xoa-slide',
        'uses'=>'AdminController@getDelSlide'
    ]);
    // ------------------------- Super ------------------
    Route::get('user',[
        'as'=>'quan-li-thanh-vien',
        'uses'=>'AdminController@getUser',
    ])->middleware(['can:super']);
});

