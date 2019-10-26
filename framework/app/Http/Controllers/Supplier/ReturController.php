<?php

namespace App\Http\Controllers\Supplier;

use App\Models\Retur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ReturController extends Controller
{
    public function index()
    {
        return view('supplier.retur.manage');
    }

    public function json_data()
    {
        $model = Retur::where('id_supplier', Auth::user()->id)->orderBy('id','DESC')->get();
        return response()->json($model);
    }

    public function detail($id)
    {
        $model= Retur::findOrFail($id);
        return view('supplier.retur.detail',['model'=>$model]);
    }
}
