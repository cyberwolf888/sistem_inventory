<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class KategoriController extends Controller
{
    public function index()
    {
        return view('backend.kategori.manage');
    }

    public function json_data()
    {
        $model = Category::orderBy('id','DESC')->get();
        return response()->json($model);
    }

    public function create()
    {
        $model = new Category();
        return view('backend.kategori.form',['model'=>$model]);
    }

    public function store(Request $request)
    {
        $filter = [
            'name' => 'required',
            'status' => 'required'
        ];
        $this->validate($request,$filter);

        $model = new Category();
        $model->name = $request->name;
        $model->status = $request->status;
        $model->save();

        return redirect()->route('backend.kategori.manage');
    }

    public function edit($id)
    {
        $model = Category::findOrFail($id);
        return view('backend.kategori.form',['model'=>$model, 'update'=>true]);
    }

    public function update(Request $request, $id)
    {
        $model = Category::findOrFail($id);

        $filter = [
            'name' => 'required',
            'status' => 'required'
        ];
        $this->validate($request,$filter);

        $model->name = $request->name;
        $model->status = $request->status;
        $model->save();

        return redirect()->route('backend.kategori.manage');
    }
}
