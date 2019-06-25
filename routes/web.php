<?php

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

Route::get('/', function () {
    return view('index');
});

Route::get('/students','StudentController@students')->name('AllStudents');
Route::post('/assigncourse','StudentController@assigncourse')->name('AssignCourse');
Route::get('/studentscoursegrades','StudentController@studentscoursegrades')->name('StudentCourseGrades');
Route::get('/studentscourse','CourseController@index')->name('StudentCourseIndex');
Route::get('/studentscourse/fetch_data','CourseController@fetch_data')->name('StudentCourse');
Route::post('/studentscourse/update_data','CourseController@update_data')->name('UpdateStudentCourse');
Route::get('/exporttopdf','StudentController@exporttopdf')->name('ExportPDF');
