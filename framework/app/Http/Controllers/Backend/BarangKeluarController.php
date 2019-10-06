<?php

namespace App\Http\Controllers\Backend;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function tambah_barang(Request $request){

        if ($request->session()->exists('barang_keluar')) {
            $barang = $request->session()->get('barang_keluar');

        }else{
            $request->session()->put('barang_keluar', [$request->stock_barang]);
        }


    }
    public function hapus_barang(Request $request){

    }
}
