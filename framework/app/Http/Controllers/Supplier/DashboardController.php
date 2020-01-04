<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data = DB::select( 'SELECT p.id_supplier, d.id_barang, sum(d.qty) AS jumlah, b.name, b.image
                            FROM pemesanan AS p
                            JOIN pemesanan_detail AS d ON d.id_pemesanan = p.id
                            JOIN barang AS b ON b.id = d.id_barang 
                            WHERE p.id_supplier = '.Auth::user()->id.' 
                            GROUP BY d.id_barang
                            ORDER BY jumlah DESC');
        $chart = ['data'=>'[','label'=>'['];
        foreach ($data as $row){
            $chart['data'].= $row->jumlah . ',';
            $chart['label'].= '"'. $row->name . '",';
        }
        $chart['data'] = substr( $chart['data'], 0,-1) . ']';
        $chart['label'] = substr( $chart['label'], 0,-1) . ']';
        return view('supplier.dashboard.index', ['chart'=>$chart, 'data'=>$data]);
    }
}
