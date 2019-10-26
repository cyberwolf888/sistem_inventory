<?php

Auth::routes();

Route::get('/', function () {
    if(Auth::check()){
        if(Auth::user()->type == 3){
            return redirect()->route( 'supplier.dashboard');
        }else{
            return redirect()->route( 'backend.dashboard');
        }
    }
    return redirect('login');
});

Route::get('/home', function () {
    return redirect('/');
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
    Route::group(['prefix' => 'barang','middleware' => ['role:owner-access|admin-access|petugas-access'], 'as'=>'.barang'], function() {

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

    /*
   |--------------------------------------------------------------------------
   | Data Barang Masuk Web Routes
   |--------------------------------------------------------------------------
   */
    Route::group(['prefix' => 'barang-masuk','middleware' => ['role:owner-access|admin-access'],'as'=>'.barang_masuk'], function() {
        Route::get('/', 'Backend\BarangMasukController@index')->name('.manage');
        Route::any('/json_data', 'Backend\BarangMasukController@json_data')->name('.json_data');
        Route::get('/create', 'Backend\BarangMasukController@create')->name('.create');
        Route::post('/create', 'Backend\BarangMasukController@store')->name('.store');
        Route::get('/detail/{id}', 'Backend\BarangMasukController@detail')->name('.detail');
    });

    /*
   |--------------------------------------------------------------------------
   | Data Barang Keluar Web Routes
   |--------------------------------------------------------------------------
   */
    Route::group(['prefix' => 'barang-keluar','middleware' => ['role:owner-access|admin-access'],'as'=>'.barang_keluar'], function() {
        Route::get('/', 'Backend\BarangKeluarController@index')->name('.manage');
        Route::any('/json_data', 'Backend\BarangKeluarController@json_data')->name('.json_data');
        Route::get('/create', 'Backend\BarangKeluarController@create')->name('.create');
        Route::post('/create', 'Backend\BarangKeluarController@store')->name('.store');
        Route::get('/detail/{id}', 'Backend\BarangKeluarController@detail')->name('.detail');

        Route::get('/terima/{id}', 'Backend\BarangKeluarController@terima_pembayaran')->name('.terima_pembayaran');
        Route::get('/tolak/{id}', 'Backend\BarangKeluarController@tolak_pembayaran')->name('.tolak_pembayaran');
        Route::post('/kirim_pesanan/{id}', 'Backend\BarangKeluarController@kirim_pesanan')->name('.kirim_pesanan');
        Route::get('/batalkan_pesanan/{id}', 'Backend\BarangKeluarController@batalkan_pesanan')->name('.batalkan_pesanan');
    });

    /*
   |--------------------------------------------------------------------------
   | Data Retur Web Routes
   |--------------------------------------------------------------------------
   */
    Route::group(['prefix' => 'retur','middleware' => ['role:owner-access|admin-access'],'as'=>'.retur'], function() {
        Route::get('/', 'Backend\ReturController@index')->name('.manage');
        Route::any('/json_data', 'Backend\ReturController@json_data')->name('.json_data');
        Route::get('/create', 'Backend\ReturController@create')->name('.create');
        Route::post('/create', 'Backend\ReturController@store')->name('.store');
        Route::get('/detail/{id}', 'Backend\ReturController@detail')->name('.detail');
        Route::get('/kirim-gudang/{id}', 'Backend\ReturController@kirim_gudang_vendor')->name('.kirim_gudang_vendor');
        Route::get('/proses-gudang/{id}', 'Backend\ReturController@proses_gudang_vendor')->name('.proses_gudang_vendor');
        Route::get('/selesai/{id}', 'Backend\ReturController@selesai')->name('.selesai');
    });

    /*
  |--------------------------------------------------------------------------
  | Data Pengguna Web Routes
  |--------------------------------------------------------------------------
  */
    Route::group(['prefix' => 'user','as'=>'.user'], function() {
        Route::get('/owner', 'Backend\UserController@owner')->middleware('role:owner-access')->name('.owner');
        Route::get('/admin', 'Backend\UserController@admin')->middleware('role:owner-access')->name('.admin');
        Route::get('/petugas', 'Backend\UserController@petugas')->middleware('role:owner-access')->name('.petugas');
        Route::get('/supplier', 'Backend\UserController@supplier')->middleware('role:owner-access')->name('.supplier');

        Route::any('/json_data/{type}', 'Backend\UserController@json_data')->middleware('role:owner-access')->name('.json_data');
        Route::get('/create/{type}', 'Backend\UserController@create')->middleware('role:owner-access')->name('.create');
        Route::post('/create/{type}', 'Backend\UserController@store')->middleware('role:owner-access')->name('.store');
        Route::get('/edit/{id}', 'Backend\UserController@edit')->name('.edit');
        Route::post('/edit/{id}', 'Backend\UserController@update')->name('.update');
    });
});

/*
|--------------------------------------------------------------------------
| Supplier Web Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'supplier', 'middleware' => 'auth', 'as'=>'supplier'], function() {

    Route::get('/', 'Supplier\DashboardController@index')->name('.dashboard');

    /*
   |--------------------------------------------------------------------------
   | Pemsanan Web Routes
   |--------------------------------------------------------------------------
   */
    Route::group(['prefix' => 'pemesanan','middleware' => ['role:supplier-access'],'as'=>'.pemesanan'], function() {
        Route::get('/', 'Supplier\PemesananController@index')->name('.manage');
        Route::any('/json_data', 'Supplier\PemesananController@json_data')->name('.json_data');
        Route::any('/data_barang', 'Supplier\PemesananController@data_barang')->name('.data_barang');
        Route::any('/check_stock', 'Supplier\PemesananController@check_stock')->name('.check_stock');
        Route::get('/create', 'Supplier\PemesananController@create')->name('.create');
        Route::post('/create', 'Supplier\PemesananController@store')->name('.store');
        Route::get('/detail/{id}', 'Supplier\PemesananController@detail')->name('.detail');
        Route::get('/batalkan/{id}', 'Supplier\PemesananController@batalkan_pesanan')->name('.batalkan_pesanan');
        Route::get('/konfirmasi/{id}', 'Supplier\PemesananController@kondirmasi_pesanan')->name('.kondirmasi_pesanan');
    });

    /*
   |--------------------------------------------------------------------------
   | Pembayaran Web Routes
   |--------------------------------------------------------------------------
   */
    Route::group(['prefix' => 'pembayaran','middleware' => ['role:supplier-access'],'as'=>'.pembayaran'], function() {
        Route::get('/{id_pemesanan}', 'Supplier\PembayaranController@create')->name('.create');
        Route::post('/{id_pemesanan}', 'Supplier\PembayaranController@store')->name('.store');
    });

    /*
   |--------------------------------------------------------------------------
   | Data Retur Web Routes
   |--------------------------------------------------------------------------
   */
    Route::group(['prefix' => 'retur','middleware' => ['role:supplier-access'],'as'=>'.retur'], function() {
        Route::get('/', 'Supplier\ReturController@index')->name('.manage');
        Route::any('/json_data', 'Supplier\ReturController@json_data')->name('.json_data');
        Route::get('/detail/{id}', 'Supplier\ReturController@detail')->name('.detail');
    });

});
