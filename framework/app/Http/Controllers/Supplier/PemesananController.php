<?php

namespace App\Http\Controllers\Supplier;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\Pemesanan;
use App\Models\PemesananDetail;
use App\Models\StockBarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PemesananController extends Controller
{
    public function index()
    {
        return view('supplier.pemesanan.manage');
    }

    public function json_data()
    {
        $model = Pemesanan::where('id_supplier',\Auth::user()->id)->with(['barang_keluar'])->orderBy('id','DESC')->get();
        return response()->json($model);
    }

    public function data_barang(Request $request)
    {
        $model = Barang::where('status',1)->orderBy('id','DESC');

        if($request->has( 'q')){
            $model = Barang::where('status',1)
                                ->where( 'name', 'like', '%' . $request->q . '%')
                                ->orderBy('id','DESC');
        }
        return response()->json($model->get());
    }

    public function check_stock(Request $request)
    {
        $stock_barang = StockBarang::where('id_barang', $request->id_barang)->where('status',1)->count();
        return $stock_barang;
    }

    public function create()
    {
        $model = new Pemesanan();
        return view('supplier.pemesanan.form',['model'=>$model]);
    }

    public function store(Request $request)
    {
        $filter = [
            'address' => 'required',
            'description' => 'required',
            'total'  => 'required|numeric',
            'id_stock' => 'required',
            'qty_stock' => 'required'
        ];
        $this->validate($request,$filter);
        $bk = new BarangKeluar();
        $bk->id = $bk->createID();
        $bk->id_supplier = \Auth::user()->id;
        $bk->transaction_date = date( 'Y-m-d');
        $bk->total = $request->total;
        $bk->description = $request->description;
        $bk->status = 2;
        $bk->save();

        $pemesanan = new Pemesanan();
        $pemesanan->id = $pemesanan->createID();
        $pemesanan->id_supplier = \Auth::user()->id;
        $pemesanan->id_barang_keluar = $bk->id;
        $pemesanan->address = $request->address;
        $pemesanan->description = $request->description;
        $pemesanan->save();

        foreach ( $request->id_stock as $key => $id_stock ) {
            $barang = Barang::find($id_stock);
            $detail = new PemesananDetail();
            $detail->id_pemesanan = $pemesanan->id ;
            $detail->id_barang = $id_stock;
            $detail->price = $barang->price;
            $detail->qty = $request->qty_stock[$key];
            $detail->save();
        }

        return redirect()->route('supplier.pemesanan.manage');
    }

    public function detail($id)
    {
        $model = Pemesanan::findOrFail($id);
        return view('supplier.pemesanan.detail', ['model'=>$model]);
    }

    public function batalkan_pesanan($id)
    {
        $model = Pemesanan::findOrFail($id);
        $model->barang_keluar->status = 5;
        $model->barang_keluar->save();

        return redirect()->back();
    }

    public function kondirmasi_pesanan($id)
    {
        $model = Pemesanan::findOrFail($id);
        $model->barang_keluar->status = 1;
        $model->barang_keluar->save();

        return redirect()->back();
    }

}
