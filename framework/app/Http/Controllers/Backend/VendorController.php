<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function index()
    {
        return view('backend.vendor.manage');
    }

    public function json_data()
    {
        $model = Vendor::orderBy('id','DESC')->get();
        return response()->json($model);
    }

    public function create()
    {
        $model = new Vendor();
        return view('backend.vendor.form',['model'=>$model]);
    }

    public function store(Request $request)
    {
        $filter = [
            'name' => 'required',
            'no_telp' => 'required|alpha_num|max:12',
            'email' => 'required|email|max:50',
            'status' => 'required'
        ];
        $this->validate($request,$filter);

        $model = new Vendor();
        $model->name = $request->name;
        $model->no_telp = $request->no_telp;
        $model->email = $request->email;
        $model->status = $request->status;
        $model->save();

        return redirect()->route('backend.vendor.manage');
    }

    public function edit($id)
    {
        $model = Vendor::findOrFail($id);
        return view('backend.vendor.form',['model'=>$model, 'update'=>true]);
    }

    public function update(Request $request, $id)
    {
        $model = Vendor::findOrFail($id);

        $filter = [
            'name' => 'required',
            'no_telp' => 'required|alpha_num|max:12',
            'email' => 'required|email|max:50',
            'status' => 'required'
        ];
        $this->validate($request,$filter);

        $model->name = $request->name;
        $model->no_telp = $request->no_telp;
        $model->email = $request->email;
        $model->status = $request->status;
        $model->save();

        return redirect()->route('backend.vendor.manage');
    }
}
