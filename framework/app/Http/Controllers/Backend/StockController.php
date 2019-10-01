<?php

namespace App\Http\Controllers\Backend;

use App\Models\StockBarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    public function index()
    {
        return view('backend.stock.manage');
    }

    public function json_data()
    {
        $model = StockBarang::with(['barang'])->orderBy('id','DESC')->get();
        return response()->json($model);
    }

    public function create()
    {
        $model = new StockBarang();
        return view('backend.stock.form',['model'=>$model]);
    }

}
