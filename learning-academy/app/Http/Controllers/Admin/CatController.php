<?php

namespace App\Http\Controllers\Admin;

use App\Cat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatController extends Controller
{
    //index
    public function index(){
$data['cats']=Cat::select('id','name')->orderBy('id','DESC')->get();
        return view('admin.cats.index')->with($data);
    }

    //create
    public function create(){
        return view('admin.cats.create');
    }

//store
    public function store(Request $request){
$data=$request->validate(
    [
        'name'=>'required|max:20'
    ]
);
Cat::create($data);
return redirect(route('admin.cat.index'));
    }

public function edit($id){
    $data['cats']=Cat::select('id','name')->where('id',$id)->get();
    $data['name']=$data['cats'][0]->name;
    $data['id']=$data['cats'][0]->id;
return view('admin.cats.edit')->with($data);
}
public function update($id,Request $request){
$request->validate([
    'name'=>'required|max:20'
]);
Cat::where('id',$id)->update(['name'=>request('name')]);
return redirect(route('admin.cat.index'));
}
public function delete($id){
    Cat::findOrFail($id)->delete();
return back();
}
}
