<?php

namespace App\Http\Controllers\Supplier;

use App\Models\Pembayaran;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PembayaranController extends Controller
{
    public function create($id_pemesanan)
    {
        $pemesanan = Pemesanan::findOrFail($id_pemesanan);
        return view('supplier.pembayaran.form', ['pemesanan'=>$pemesanan]);
    }

    public function store(Request $request, $id_pemesanan)
    {
        $pemesanan = Pemesanan::findOrFail($id_pemesanan);
        $filter = [
            'image' => 'required|file|mimes:jpeg,bmp,png,jpg'
        ];
        $this->validate($request,$filter);

        $file = $request->file('image');
        $path = base_path().'/../images';
        $file_name = md5(microtime(true)).'.'.$file->getClientOriginalExtension();
        $file->move($path,$file_name);

        $model = new Pembayaran();
        $model->id_transaksi = $pemesanan->id;
        $model->images = $file_name;
        $model->save();

        return redirect()->route( 'supplier.pemesanan.detail', $pemesanan->id);
    }
}
