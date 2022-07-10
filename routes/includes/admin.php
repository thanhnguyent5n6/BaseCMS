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

    Route::group(['prefix' => 'bills'], function() {
        Route::get('/', 'Admin\BillController@index')->name('admin.bill.index');
        Route::post('/load', 'Admin\BillController@load')->name('admin.bill.load');
        Route::get('/detail/{id}', 'Admin\BillController@detail')->name('admin.bill.detail');
        Route::post('/change-status', 'Admin\BillController@changeStatus')->name('admin.bill.change_status');
        Route::post('/destroy', 'Admin\BillController@destroy')->name('admin.bill.destroy');
    });

    Route::group(['prefix' => 'setting'], function() {
        Route::get('/introduce', 'Admin\SettingController@introduce')->name('admin.setting.introduce');
        Route::get('/edit-introduct', 'Admin\SettingController@editIntroduce')->name('admin.setting.edit_introduce');
        Route::post('/update-introduct', 'Admin\SettingController@updateIntroduce')->name('admin.setting.update_introduce');
    });

    Route::group(['prefix' => 'suppliers'], function() {
        Route::get('/', 'Admin\SupplierController@index')->name('admin.supplier.index');
        Route::get('/create', 'Admin\SupplierController@create')->name('admin.supplier.create');
        Route::post('/store', 'Admin\SupplierController@store')->name('admin.supplier.store');
        Route::get('/show/{id}', 'Admin\SupplierController@show')->name('admin.supplier.show');
        Route::get('/edit/{id}', 'Admin\SupplierController@edit')->name('admin.supplier.edit');
        Route::post('/update', 'Admin\SupplierController@update')->name('admin.supplier.update');
        Route::post('/destroy', 'Admin\SupplierController@destroy')->name('admin.supplier.destroy');
    });

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

