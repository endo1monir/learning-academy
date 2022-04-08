<?php

namespace App\Http\Controllers\Admin;

use App\Cat;
use App\Course;
use App\Http\Controllers\Controller;
use App\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CourcesController extends Controller
{
    //
   //index
   public function index(){
    $data['cources']=Course::select('id','name','price','img')->orderBy('id','DESC')->paginate(5);
            return view('admin.cources.index')->with($data);
        }

        //create
        public function create(){
            $data['trainers']=Trainer::select('id','name')->get();
            $data['cats']=Cat::select('id','name')->get();
            return view('admin.cources.create')->with($data);
        }

    //store
        public function store(Request $request){
    $data=$request->validate(
        [
            'name'=>'required|max:50',
            'small_desc'=>'required|max:190',
            'desc'=>'required|string',
            'price'=>'required|integer',
            'trainer_id'=>'required|exists:trainers,id',
            'cat_id'=>'required|exists:cats,id',
            'img'=>'required|image|mimes:jpg,png,jpeg'
        ]
    );
    $new_name=$data['img']->hashName();
Image::make($data['img'])->resize(970,520)->save(public_path('uploads/cources/'.$new_name));
$data['img']=$new_name;
Course::create($data);
    return redirect(route('admin.cources.index'));
        }

    public function edit($id){

        $data['cource']=Course::select('id','name','small_desc','desc','cat_id','trainer_id','price','img')->where('id',$id)->get();
// ddd($data['tr'][0]->phone);
        $data['name']=$data['cource'][0]->name;
        $data['id']=$data['cource'][0]->id;
        $data['small_desc']=$data['cource'][0]->small_desc;
        $data['desc']=$data['cource'][0]->desc;
        $data['img']=$data['cource'][0]->img;
        $data['price']=$data['cource'][0]->price;
        $data['cat_id']=$data['cource'][0]->cat_id;
        $data['trainer_id']=$data['cource'][0]->trainer_id;
        $data['cats']=Cat::select('name','id')->get();
$data['trainers']=Trainer::select('name','id')->get();

    return view('admin.cources.edit')->with($data);
    }
    public function update($id,Request $request){
    $request->validate([

        'name'=>'required|max:50',
        'small_desc'=>'required|max:190',
        'desc'=>'required|string',
        'price'=>'required|integer',
        'trainer_id'=>'required|exists:trainers,id',
        'cat_id'=>'required|exists:cats,id',
        'img'=>'nullable|image|mimes:jpg,png,jpeg'
    ]);
    $new_name=Course::findOrFail($request->id)->img;
if($request->hasFile('img')){
Storage::disk('uploads')->delete('cources/'.$new_name);
$new_name=request('img')->hashName();
Image::make(request('img'))->resize(50,50)->save(public_path('uploads/cources/'.$new_name));
}

    Course::where('id',$id)->update([
        'name'=>request('name'),
        'small_desc'=>request('small_desc'),
        'desc'=>request('desc'),
'trainer_id'=>request('trainer_id'),
'cat_id'=>request('cat_id'),
'price'=>request('price'),
        'img'=>$new_name
    ]);
    return redirect(route('admin.cources.index'));
    }
    public function delete($id){
        $img=Course::findOrFail($id)->img;
        Storage::disk('uploads')->delete('cources/'.$img);
        Course::findOrFail($id)->delete();
    return back();
    }
}
