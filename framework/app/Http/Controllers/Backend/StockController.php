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

    public function store(Request $request)
    {
        $filter = [
            'serial_number' => 'required',
            'receive_date' => 'required',
            'location' => 'required'
        ];
        $this->validate($request,$filter);
        $model = new StockBarang();
        $model->id_barang = $request->id_barang;
        $model->serial_number = $request->serial_number;
        $model->receive_date = date( 'Y-m-d', strtotime(str_replace('/', '-', $request->receive_date )));
        $model->location = $request->location;
        $model->status = $request->status;
        $model->save();

        return redirect()->route('backend.barang.stock.manage');
    }

    public function edit($id)
    {
        $model = StockBarang::findOrFail($id);
        return view('backend.stock.form',['model'=>$model, 'update'=>true]);
    }

    public function update(Request $request, $id)
    {
        $model = StockBarang::findOrFail($id);

        $filter = [
            'serial_number' => 'required',
            'receive_date' => 'required',
            'location' => 'required'
        ];
        $this->validate($request,$filter);

        $model->id_barang = $request->id_barang;
        $model->serial_number = $request->serial_number;
        $model->receive_date = date( 'Y-m-d', strtotime(str_replace('/', '-', $request->receive_date )));
        $model->location = $request->location;
        $model->status = $request->status;
        $model->save();

        return redirect()->route('backend.barang.stock.manage');
    }
}
