<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Message;
use App\NewsLetter;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    //
public function newsletter(Request $request){
    $data=$request->validate([
        'email'=>'required | email'
    ]
    );
NewsLetter::create($data);
return back();
}
public function contact( Request $request ){
$data=$request->validate([
    'name'=>'required|string|max:191',
    'email'=>'required|email|max:191',
    'subject'=>'nullable|string',
    'message'=>'required|string|max:191'
]);
Message::create($data);
return back();
}

public function enroll(Request $request){
$data=$request->validate([
    'name'=>'nullable|string|max:191',
    'email'=>'required|email|max:191',
    'speciality'=>'required|string',
    'course_id'=>'required|exists:courses,id'
]);
$student=Student::create([
    'name'=>$data['name'],
    'email'=>$data['email'],
    'spec'=>$data['speciality']
]);
DB::table('course_student')->insert([
'course_id'=>$data['course_id'],
'student_id'=>$student->id,
'created_at'=>now(),
'updated_at'=>now()
]);
return back();
}

}
