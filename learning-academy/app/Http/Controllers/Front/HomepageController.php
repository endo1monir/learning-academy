<?php

namespace App\Http\Controllers\Front;

use App\Course;
use App\Http\Controllers\Controller;
use App\SiteContent;
use App\Student;
use App\Test;
use App\Trainer;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    //
    public function index(){
        $data['banner']=SiteContent::select('content')->where('name','banner')->first();
$data['banner']=json_decode($data['banner']->content);
$data['advance']=SiteContent::select('content')->where('name','advance')->first();
$data['advance']=json_decode($data['advance']->content);
$data['courses']=Course::select('id','name','small_desc','cat_id','img','trainer_id')
        ->orderBy('id','asc')
        ->take(3)
        ->get();
$data['courses_count']=Course::count();
$data['trainers_count']=Trainer::count();
$data['students_count']=Student::count();
$data['tests']=Test::all();
        return view('front.index')->with($data);
    }
}
