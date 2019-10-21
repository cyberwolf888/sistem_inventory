<?php

namespace App\Http\Controllers\Backend;

use App\Models\Retur;
use App\Http\Controllers\Controller;
use App\Models\ReturDetail;
use App\Models\StockBarang;
use Illuminate\Http\Request;


class ReturController extends Controller
{
    public function index()
    {
        return view('backend.retur.manage');
    }

    public function json_data()
    {
        $model = Retur::with(['supplier'])->orderBy('id','DESC')->get();
        return response()->json($model);
    }

    public function create()
    {
        $model = new Retur();
        return view('backend.retur.form', ['model'=>$model]);
    }

    public function store(Request $request)
    {
        $filter = [
            'id_supplier' => 'required',
            'retur_date' => 'required',
            'description' => 'required',
            'status' => 'required'
        ];
        $this->validate($request,$filter);

        $model = new Retur();
        $model->id = $model->createID();
        $model->id_supplier = $request->id_supplier;
        $model->retur_date = date( 'Y-m-d', strtotime(str_replace('/', '-', $request->retur_date )));
        $model->description = $request->description;
        $model->status = $request->status;
        $model->save();

        foreach ( $request->id_stock as $id_stock ) {
            $stock = StockBarang::find($id_stock);
            $stock->status = 3;
            $stock->save();

            $detail = new ReturDetail();
            $detail->id_retur = $model->id;
            $detail->id_stock = $id_stock;
            $detail->save();
        }

        return redirect()->route( 'backend.retur.manage');
    }

    public function detail($id)
    {
        $model= Retur::findOrFail($id);
        return view('backend.retur.detail',['model'=>$model]);
    }
}
