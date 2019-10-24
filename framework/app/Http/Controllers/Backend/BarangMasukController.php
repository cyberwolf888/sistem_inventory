<?php

namespace App\Http\Controllers\Backend;

use App\Models\BarangMasuk;
use App\Models\BarangMasukDetail;
use App\Models\StockBarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BarangMasukController extends Controller
{
    public function index()
    {
        return view('backend.barang_masuk.manage');
    }

    public function json_data()
    {
        $model = BarangMasuk::with(['vendor'])->orderBy('id','DESC')->get();
        return response()->json($model);
    }

    public function create()
    {
        $model = new BarangMasuk();
        return view('backend.barang_masuk.form', ['model'=>$model]);
    }

    public function store(Request $request)
    {
        $filter = [
            'id_vendor' => 'required',
            'no_faktur' => 'required',
            'total'  => 'required|numeric',
            'transaction_date' => 'required'
        ];
        $this->validate($request,$filter);

        $model = new BarangMasuk();
        $model->id_vendor = $request->id_vendor;
        $model->no_faktur = $request->no_faktur;
        $model->transaction_date = date( 'Y-m-d', strtotime(str_replace('/', '-', $request->transaction_date )));
        $model->total = $request->total;
        $model->description = $request->description;
        $model->status = $request->status;
        $model->save();

        foreach ($request->id_barang as $key => $id_barang){
            //create stock
            $stock = new StockBarang();
            $stock->id_barang = $id_barang;
            $stock->serial_number = strtoupper($request->serial_number[$key]);
            $stock->receive_date = $model->transaction_date;
            $stock->location = 'Rak Barang Masuk';
            $stock->status = 1;
            $stock->save();

            $detail_barang_masuk = new BarangMasukDetail();
            $detail_barang_masuk->id_barang_masuk = $model->id;
            $detail_barang_masuk->id_barang = $id_barang;
            $detail_barang_masuk->id_stock = $stock->id;
            $detail_barang_masuk->save();
        }

        return redirect()->route( 'backend.barang_masuk.manage');

    }

    public function edit($id)
    {
        //TODO edit barang keluar
    }

    public function detail($id)
    {
        $model = BarangMasuk::findOrFail($id);
        return view('backend.barang_masuk.detail', ['model'=>$model]);
    }
}
