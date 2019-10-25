<?php

namespace App\Http\Controllers\Backend;

use App\Models\BarangKeluar;
use App\Models\BarangKeluarDetail;
use App\Models\StockBarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class BarangKeluarController extends Controller
{
    public function index()
    {
        return view('backend.barang_keluar.manage');
    }

    public function json_data()
    {
        $model = BarangKeluar::with(['supplier'])->orderBy('id','DESC')->get();
        return response()->json($model);
    }

    public function create()
    {
        $model = new BarangKeluar();
        return view('backend.barang_keluar.form', ['model'=>$model]);
    }

    public function store(Request $request)
    {
        $filter = [
            'id_supplier' => 'required',
            'transaction_date' => 'required',
            'total'  => 'required|numeric',
            'status' => 'required',
            'id_stock' => 'required'
        ];
        $this->validate($request,$filter);

        $model = new BarangKeluar();
        $model->id = $model->createID();
        $model->id_supplier = $request->id_supplier;
        $model->transaction_date = date( 'Y-m-d', strtotime(str_replace('/', '-', $request->transaction_date )));
        $model->total = $request->total;
        $model->description = $request->description;
        $model->status = $request->status;
        $model->save();

        foreach ( $request->id_stock as $id_stock ) {
            $stock = StockBarang::find($id_stock);
            $stock->status = 2;
            $stock->save();

            $detail = new BarangKeluarDetail();
            $detail->id_barang_keluar = $model->id;
            $detail->id_barang = $stock->id_barang;
            $detail->id_stock = $id_stock;
            $detail->save();
        }

        return redirect()->route( 'backend.barang_keluar.manage');
    }

    public function edit($id)
    {
        //TODO edit barang keluar
    }

    public function detail($id)
    {
        $model = BarangKeluar::findOrFail($id);
        return view('backend.barang_keluar.detail', ['model'=>$model]);
    }

    public function terima_pembayaran($id)
    {
        $model = BarangKeluar::findOrFail($id);
        if(!is_null($model->pemesanan) && !is_null($model->pemesanan->pembayaran)){
            $model->status = 3;
            $model->save();

            return redirect()->back();
        }
    }

    public function tolak_pembayaran($id)
    {
        $model = BarangKeluar::findOrFail($id);
        if(!is_null($model->pemesanan) && !is_null($model->pemesanan->pembayaran)){

            $path = base_path().'/../images';
            File::delete($path.'/'.$model->pemesanan->pembayaran->images);
            $model->pemesanan->pembayaran->delete();

            //TODO Send Notif tolak pembayaran


            return redirect()->back();
        }
    }

    public function kirim_pesanan()
    {
        //TODO kirim pesanan
    }

    public function batalkan_pesanan()
    {
        //TODO batalkan pesanan
    }
}
