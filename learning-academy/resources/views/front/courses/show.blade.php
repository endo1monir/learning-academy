@extends('front.layout')
@section('content')
 <!-- breadcrumb start-->
 <section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner text-center">
                    <div class="breadcrumb_iner_item">
                        <h2>Course Details</h2>
                        <p>Home<span>/</span>Courses<span>/</span>{{$course[0]->cat->name}}<span>/</span>{{$course[0]->name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--================ Start Course Details Area =================-->
<section class="course_details_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 course_details_left">
                <div class="main_image">
                    <img class="img-fluid" src="{{ asset('uploads/courses/'.$course[0]->img) }}" alt="">
                </div>
                <div class="content_wrapper py-5">
                    {!! $course[0]->desc !!}
                </div>
            </div>


            <div class="col-lg-4 right-contents">
                <div class="sidebar_top">
                    <ul>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Trainer’s Name</p>
                                <span class="color">{{$course[0]->trainer->name}}</span>
                            </a>
                        </li>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Course Fee </p>
                                <span>{{$course[0]->price}}</span>
                            </a>
                        </li>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Available Seats </p>
                                <span>15</span>
                            </a>
                        </li>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Schedule </p>
                                <span>2.00 pm to 4.00 pm</span>
                            </a>
                        </li>

                    </ul>
                    <a href="#" class="btn_1 d-block">Enroll the course</a>
                </div>


            </div>
        </div>
    </div>
</section>
<!--================ End Course Details Area =================-->
@endsection
