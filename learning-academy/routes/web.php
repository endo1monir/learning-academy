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
        //cources
        Route::get('/cources','CourcesController@index')->name('admin.cources.index');
        Route::get('/cources/create','CourcesController@create')->name('admin.cources.create');
        Route::post('/cources/store','CourcesController@store')->name('admin.cources.store');
        Route::get('/cources/edit/{id}','CourcesController@edit')->name('admin.cources.edit');
        Route::post('/cources/update/{id}','CourcesController@update')->name('admin.cources.update');
        Route::get('/cources/delete/{id}','CourcesController@delete')->name('admin.cources.delete');

         //Students
         Route::get('/students','StudentsController@index')->name('admin.students.index');
         Route::get('/students/create','StudentsController@create')->name('admin.students.create');
         Route::post('/students/store','StudentsController@store')->name('admin.students.store');
         Route::get('/students/edit/{id}','StudentsController@edit')->name('admin.students.edit');
         Route::post('/students/update/{id}','StudentsController@update')->name('admin.students.update');
         Route::get('/students/delete/{id}','StudentsController@delete')->name('admin.students.delete');
Route::get('/students/showcources/{id}','StudentsController@show')->name('admin.students.showCources');
Route::get('/students/{s_id}/cources/{c_id}/approve','StudentsController@approve')->name('admin.students.approve');
Route::get('/students/{s_id}/cources/{c_id}/delete','StudentsController@reject')->name('admin.students.reject');
Route::get('/students/{id}/assign-to-course/','StudentsController@addToCource')->name('admin.students.addToCource');
Route::post('/students/{id}/assign','StudentsController@assign')->name('admin.students.assign');
});


});
