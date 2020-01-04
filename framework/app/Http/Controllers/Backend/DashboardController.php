<?php

namespace App\Http\Controllers\Backend;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $month = [1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        $omset = BarangKeluar::select(\DB::raw('SUM(total) AS omset, MONTH(transaction_date) AS bulan'))->where('status',1)->whereRaw('YEAR(transaction_date) = "'.date( 'Y').'"')->groupBy('bulan')->get();
        $jumlah_transaksi = BarangKeluar::select(\DB::raw('count(id) AS jumlah, MONTH(transaction_date) AS bulan'))->whereRaw('YEAR(transaction_date) = "'.date( 'Y').'"')->groupBy('bulan')->get();

        $result_omset = ['data'=>'[','label'=>'['];
        foreach ($omset as $row){
            $result_omset['data'].= $row->omset . ',';
            $result_omset['label'].= '"'. $month[$row->bulan] . '",';
        }
        $result_omset['data'] = substr( $result_omset['data'], 0,-1) . ']';
        $result_omset['label'] = substr( $result_omset['label'], 0,-1) . ']';

        $result_jumlah_transaksi = ['data'=>'[','label'=>'['];
        foreach ($jumlah_transaksi as $row){
            $result_jumlah_transaksi['data'].= $row->jumlah . ',';
            $result_jumlah_transaksi['label'].= '"'. $month[$row->bulan] . '",';
        }
        $result_jumlah_transaksi['data'] = substr( $result_jumlah_transaksi['data'], 0,-1) . ']';
        $result_jumlah_transaksi['label'] = substr( $result_jumlah_transaksi['label'], 0,-1) . ']';

        //dd( $result_jumlah_transaksi);
        return view('backend.dashboard.index',[
            'omset' => $result_omset,
            'jumlah_transaksi' => $result_jumlah_transaksi
        ]);
    }
}
