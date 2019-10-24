<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $title = ['1'=>'Owner','2'=>'Admin','3'=>'Supplier','4'=>'Petugas'];

    public function owner()
    {
        return view('backend.user.manage',['type'=>1, 'title'=>'Owner']);
    }

    public function admin()
    {
        return view('backend.user.manage',['type'=>2, 'title'=>'Admin']);
    }

    public function petugas()
    {
        return view('backend.user.manage',['type'=>4, 'title'=>'Petugas']);
    }

    public function supplier()
    {
        return view('backend.user.manage',['type'=>3, 'title'=>'Supplier']);
    }

    public function json_data($type)
    {
        $model = User::where('type',$type)->orderBy('id','DESC')->get();
        return response()->json($model);
    }

    public function create($type)
    {
        $model = new User();
        return view('backend.user.form',['model'=>$model, 'type'=>$type, 'title'=>$this->title[$type]]);
    }

    public function store(Request $request, $type)
    {

        $filter = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'no_telp' => 'required|unique:users',
            'address' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'isActive' => 'required'
        ];
        $this->validate($request,$filter);

        $model = new User();
        $model->name = $request->name;
        $model->email = $request->email;
        $model->no_telp = $request->no_telp;
        $model->address = $request->address;
        $model->password = Hash::make($request->password);
        $model->isActive = $request->isActive;
        $model->type = $type;
        $model->save();

        return redirect()->route( 'backend.user.'.strtolower( $this->title[$type]));
    }

    public function edit($id)
    {
        $model = User::findOrFail($id);
        return view('backend.user.form',['model'=>$model, 'type'=>$model->type, 'title'=>$this->title[$model->type], 'update'=>true]);
    }

    public function update(Request $request, $id)
    {
        $model = User::findOrFail($id);

        $filter = [
            'name' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
            'address' => 'required',
            'isActive' => 'required'
        ];
        if(!is_null( $request->password)){
            $filter['password'] = 'required|string|min:8|confirmed';
            $model->password = Hash::make($request->password);
        }
        if($model->email != $request->email){
            $filter['email'] = 'required|email|unique:users';
        }
        if($model->no_telp != $request->no_telp){
            $filter['no_telp'] = 'required|unique:users';
        }
        $this->validate($request,$filter);

        $model->name = $request->name;
        $model->email = $request->email;
        $model->no_telp = $request->no_telp;
        $model->address = $request->address;
        $model->isActive = $request->isActive;
        $model->save();

        return redirect()->route( 'backend.user.'.strtolower( $this->title[$model->type]));
    }
}
