<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::namespace('Front')->group(function(){
    Route::get('/','HomepageController@index')->name('front.homepage');
    Route::get('/cat/{id}','CourseController@cat')->name('cat');
    Route::get('/cat/{id}/course/{c_id}','CourseController@show')->name('front.show');
    Route::get('/contact','ContactController@index')->name('front.contact');
    Route::post('/message/newsletter','MessageController@newsletter')->name('front.message.newsletter');
    Route::post('/message/contact','MessageController@contact')->name('front.message.contact');
    Route::post('/message/enroll','MessageController@enroll')->name('front.message.enroll');


});


