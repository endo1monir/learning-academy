<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    //index
    public function index(){

        $data['students']=Student::select()->paginate();
        return view('admin.students.index')->with($data);

    }
//create
public function create(){
    return view('admin.students.create');
}
//store
public function store(Request $request){
$data=$request->validate([
    'name'=>'nullable|max:20',
    'email'=>'required|max:50|email|unique:students',
    'spec'=>'nullable|max:50'
]);
Student::create($data);
return redirect(route('admin.students.index'));
}
//edit
public function edit($id){
    $data['student']=Student::findOrFail($id);
    return view('admin.students.edit')->with($data);
}
public function update($id,Request $request){
    $request->validate([
        'name'=>'nullable|max:30',
        'email'=>'required|email|unique:students',
        'spec'=>'nullable|max:30'
    ]);
    Student::where('id',$id)->update(
        [
            'name'=>request('name'),
            'email'=>request('email'),
            'spec'=>request('spec')
        ]
    );
    return redirect(route('admin.students.index'));
}

public function delete($id){
Student::findOrFail($id)->delete();
return redirect(route('admin.students.index'));
}
public function show($id){
$data['cources']=Student::findOrFail($id)->courses;
$data['s_id']=$id;
$data['waited_cources']=DB::table('course_student')->where('student_id',$id)->pluck('status');
//ddd($data['waited_cources']);
return view('admin.students.show')->with($data);
}

public function approve($s_id,$c_id){
DB::table('course_student')->where('student_id',$s_id)->where('course_id',$c_id)->update([
    'status'=>'approve'
]);
return back();
}
public function reject($s_id,$c_id){
DB::table('course_student')->where('student_id',$s_id)->where('course_id',$c_id)->update([
    'status'=>'reject'
]);
return back();
}

public function addToCource($id){
$data['student_id']=$id;
$data['cources']=Course::all();
return view('admin.students.assign')->with($data);
}
public function assign($id,Request $request){
$request->validate([
'cources'=>'required|exists:courses,id'
]);

DB::table('course_student')->insert([
    'course_id'=>request('cources'),
    'student_id'=>$id
]);
return redirect(route('admin.students.showCources',['id'=>$id]));
}
}
