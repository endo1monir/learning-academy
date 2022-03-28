<?php

namespace App\Http\Controllers\Front;

use App\Cat;
use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function cat($id){
        $data['cat']=Cat::findOrFail($id);
        $data['courses']=Course::where('cat_id',$id)->with(['cat','trainer'])->paginate(3);

        return view('front.courses.cat')->with($data);
    }

    public function show($id,$c_id){
$data['course']=Course::where('id',$c_id)->with(['cat','trainer'])->get();
// ddd($data['course'][0]->id);
return view('front.courses.show')->with($data);
}
}
