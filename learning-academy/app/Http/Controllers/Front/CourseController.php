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

        return view('courses.cat')->with($data);
    }
}
