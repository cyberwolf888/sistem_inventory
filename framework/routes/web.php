<?php

Auth::routes();

Route::get('/', function () {
    return redirect('login');
});

Route::get('/home', function () {
    return redirect('backend');
});

/*
|--------------------------------------------------------------------------
| Backend Web Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'backend', 'middleware' => 'auth', 'as'=>'backend'], function() {
    Route::get('/', 'Backend\DashboardController@index')->name('.dashboard');

    /*
    |--------------------------------------------------------------------------
    | Kategori Web Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'kategori','middleware' => ['role:owner-access|admin-access'], 'as'=>'.kategori'], function() {
        Route::get('/', 'Backend\KategoriController@index')->name('.manage');
        Route::any('/json_data', 'Backend\KategoriController@json_data')->name('.json_data');
        Route::get('/create', 'Backend\KategoriController@create')->name('.create');
        Route::post('/create', 'Backend\KategoriController@store')->name('.store');
        Route::get('/update/{id}', 'Backend\KategoriController@edit')->name('.edit');
        Route::post('/update/{id}', 'Backend\KategoriController@update')->name('.update');
    });

    /*
    |--------------------------------------------------------------------------
    | Vendor Web Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'vendor','middleware' => ['role:owner-access|admin-access'], 'as'=>'.vendor'], function() {
        Route::get('/', 'Backend\VendorController@index')->name('.manage');
        Route::any('/json_data', 'Backend\VendorController@json_data')->name('.json_data');
        Route::get('/create', 'Backend\VendorController@create')->name('.create');
        Route::post('/create', 'Backend\VendorController@store')->name('.store');
        Route::get('/update/{id}', 'Backend\VendorController@edit')->name('.edit');
        Route::post('/update/{id}', 'Backend\VendorController@update')->name('.update');
    });


    /*
    |--------------------------------------------------------------------------
    | Barang Web Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'barang','middleware' => ['role:owner-access|admin-access'], 'as'=>'.barang'], function() {

        /*
        |--------------------------------------------------------------------------
        | Data Barang Web Routes
        |--------------------------------------------------------------------------
        */
        Route::group(['prefix' => 'data','as'=>'.data'], function() {
            Route::get('/', 'Backend\BarangController@index')->name('.manage');
            Route::any('/json_data', 'Backend\BarangController@json_data')->name('.json_data');
            Route::get('/create', 'Backend\BarangController@create')->name('.create');
            Route::post('/create', 'Backend\BarangController@store')->name('.store');
            Route::get('/update/{id}', 'Backend\BarangController@edit')->name('.edit');
            Route::post('/update/{id}', 'Backend\BarangController@update')->name('.update');
        });

        /*
        |--------------------------------------------------------------------------
        | Stock Barang Web Routes
        |--------------------------------------------------------------------------
        */
        Route::group(['prefix' => 'stock','as'=>'.stock'], function() {
            Route::get('/', 'Backend\StockController@index')->name('.manage');
            Route::any('/json_data', 'Backend\StockController@json_data')->name('.json_data');
            Route::get('/create', 'Backend\StockController@create')->name('.create');
            Route::post('/create', 'Backend\StockController@store')->name('.store');
            Route::get('/update/{id}', 'Backend\StockController@edit')->name('.edit');
            Route::post('/update/{id}', 'Backend\StockController@update')->name('.update');
        });
    });


});
