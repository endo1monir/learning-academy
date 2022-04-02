<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    //
      //index
      public function index(){
        $data['trainers']=Trainer::select('id','name','phone','spec','img')->orderBy('id','DESC')->get();
                return view('admin.trainers.index')->with($data);
            }

            //create
            public function create(){
                return view('admin.trainers.create');
            }

        //store
            public function store(Request $request){
        $data=$request->validate(
            [
                'name'=>'required|max:50',
                'phone'=>'required|max:11',
                'spec'=>'required|max:15',
                'img'=>'required|image|mimes:jpg,png,jpeg'
            ]
        );
        $new_name=$data['img']->hashName();
        Image::make($data['img']->resize(50,50)->save(public_path('uploads/trainers/'.$new_name)));
        Trainer::create($data);
        return redirect(route('admin.trainer.index'));
            }

        public function edit($id){
            $data['tr']=Trainer::select('id','name')->where('id',$id)->get();
            $data['name']=$data['tr'][0]->name;
            $data['id']=$data['tr'][0]->id;
        return view('admin.tr.edit')->with($data);
        }
        public function update($id,Request $request){
        $request->validate([
            'name'=>'required|max:20'
        ]);
        Trainer::where('id',$id)->update(['name'=>request('name')]);
        return redirect(route('admin.trainer.index'));
        }
        public function delete($id){
            Trainer::findOrFail($id)->delete();
        return back();
        }
}
