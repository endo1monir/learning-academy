<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Intervention\Image\Image as ImageImage;

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
    Image::make($data['img'])->resize(50,50)->save(public_path('uploads/trainers/'.$new_name));
    $data['img']=$new_name;
    Trainer::create($data);
        return redirect(route('admin.trainer.index'));
            }

        public function edit($id){

            $data['tr']=Trainer::select('id','name','phone','spec','img')->where('id',$id)->get();
// ddd($data['tr'][0]->phone);
            $data['name']=$data['tr'][0]->name;
            $data['id']=$data['tr'][0]->id;
            $data['phone']=$data['tr'][0]->phone;
            $data['spec']=$data['tr'][0]->spec;
            $data['img']=$data['tr'][0]->img;

        return view('admin.trainers.edit')->with($data);
        }
        public function update($id,Request $request){
        $request->validate([
            'name'=>'required|max:20',
            'phone'=>'nullable|max:20',
            'spec'=>'required|max:15',
            'img'=>'nullable|image|mimes:png,jpg,jpeg'
        ]);
        $new_name=Trainer::findOrFail($request->id)->img;
if($request->hasFile('img')){
    Storage::disk('uploads')->delete('trainers/'.$new_name);
    $new_name=request('img')->hashName();
    Image::make(request('img'))->resize(50,50)->save(public_path('uploads/trainers/'.$new_name));
}

        Trainer::where('id',$id)->update([
            'name'=>request('name'),
            'phone'=>request('phone'),
            'spec'=>request('spec'),
            'img'=>$new_name

        ]);
        return redirect(route('admin.trainer.index'));
        }
        public function delete($id){
            $img=Trainer::findOrFail($id)->img;
            Storage::disk('uploads')->delete('trainers/'.$img   );
            Trainer::findOrFail($id)->delete();
        return back();
        }
}
