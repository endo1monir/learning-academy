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

Route::namespace('Admin')->prefix('dashboard')->group(function (){

    Route::get('/login','AuthController@login')->name('admin.login');

    Route::post('/dologin','AuthController@doLogin')->name('admin.doLogin');
    Route::middleware('adminAuth:admin')->group(function(){
        Route::get('','HomeController@index')->name('admin.home');
        Route::get('/logout','AuthController@logout')->name('admin.logout');
        //cats
        Route::get('/cats','CatController@index')->name('admin.cat.index');
        Route::get('/cats/create','CatController@create')->name('admin.cat.create');
        Route::post('/cats/store','CatController@store')->name('admin.cat.store');
        Route::get('/cats/edit/{id}','CatController@edit')->name('admin.cat.edit');
        Route::post('/cats/update/{id}','CatController@update')->name('admin.cat.update');
        Route::get('/cats/delete/{id}','CatController@delete')->name('admin.cat.delete');
        //trainer
        Route::get('/trainer','TrainerController@index')->name('admin.trainer.index');
        Route::get('/trainer/create','TrainerController@create')->name('admin.trainer.create');
        Route::post('/trainer/store','TrainerController@store')->name('admin.trainer.store');
        Route::get('/trainer/edit/{id}','TrainerController@edit')->name('admin.trainer.edit');
        Route::post('/trainer/update/{id}','TrainerController@update')->name('admin.trainer.update');
        Route::get('/trainer/delete/{id}','TrainerController@delete')->name('admin.trainer.delete');


    });


});
