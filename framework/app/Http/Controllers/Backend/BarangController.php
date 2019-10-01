<?php

namespace App\Http\Controllers\Backend;

use App\Models\DetailBarang;
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        return view('backend.barang.manage');
    }

    public function json_data()
    {
        $model = Barang::with(['category','vendor'])->orderBy('id','DESC')->get();
        return response()->json($model);
    }

    public function create()
    {
        $model = new Barang();
        return view('backend.barang.form',['model'=>$model]);
    }

    public function store(Request $request)
    {
        $filter = [
            'name' => 'required|max:50',
            'sku' => 'required|max:50',
            'price' => 'required|numeric',
            'warranty' => 'required|numeric',
            'image' => 'required|file|mimes:jpeg,bmp,png,jpg',
            'status' => 'required'
        ];
        $this->validate($request,$filter);

        $file = $request->file('image');
        $path = base_path().'/../images';
        $file_name = md5(microtime(true)).'.'.$file->getClientOriginalExtension();
        $file->move($path,$file_name);

        $model = new Barang();
        $model->name = $request->name;
        $model->id_category = $request->id_category;
        $model->sku = $request->sku;
        $model->price = $request->price;
        $model->id_vendor = $request->id_vendor;
        $model->warranty = $request->warranty;
        $model->status = $request->status;
        $model->image = $file_name;
        $model->save();

        foreach ($request->detail_option as $key=>$option){
            $detail = new DetailBarang();
            $detail->id_barang = $model->id;
            $detail->option = $option;
            $detail->value = $request->detail_value[$key];
            $detail->save();
        }
        return redirect()->route('backend.barang.data.manage');
    }

    public function edit($id)
    {
        $model = Barang::findOrFail($id);
        return view('backend.barang.form',['model'=>$model,'update'=>true]);
    }

    public function update(Request $request, $id)
    {
        $model = Barang::findOrFail($id);
        $filter = [
            'name' => 'required|max:50',
            'sku' => 'required|max:50',
            'price' => 'required|numeric',
            'warranty' => 'required|numeric',
            //'image' => 'required|file|mimes:jpeg,bmp,png,jpg',
            'status' => 'required'
        ];
        if($request->has( 'image')){
            $filter['image'] = 'required|file|mimes:jpeg,bmp,png,jpg';
        }
        $this->validate($request,$filter);
        if($request->has( 'image')){
            $file = $request->file('image');
            $path = base_path().'/../images';
            File::delete($path.'/'.$model->image);
            $file_name = md5(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move($path,$file_name);
            $model->image = $file_name;
        }

        $model->name = $request->name;
        $model->id_category = $request->id_category;
        $model->sku = $request->sku;
        $model->price = $request->price;
        $model->id_vendor = $request->id_vendor;
        $model->warranty = $request->warranty;
        $model->status = $request->status;
        $model->save();

        DetailBarang::where('id_barang', $model->id)->delete();
        foreach ($request->detail_option as $key=>$option){
            $detail = new DetailBarang();
            $detail->id_barang = $model->id;
            $detail->option = $option;
            $detail->value = $request->detail_value[$key];
            $detail->save();
        }
        return redirect()->route('backend.barang.data.manage');
    }
}
