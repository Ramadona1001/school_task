<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class CourseController extends Controller
{

    public function index(){
        $courses = DB::select('SELECT * FROM courses');
        $student_course = DB::select('SELECT students_course.id, students_course.student_id, students_course.course_code, students_course.student_work, students_course.student_oral, students_course.student_exam, students.name AS "student_name", students.code AS "student_code", courses.name AS "course_name", courses.work AS "course_work", courses.oral AS "course_oral", courses.exam AS "course_exam" FROM `students_course` INNER JOIN students ON students.id = students_course.student_id INNER JOIN courses ON courses.code = students_course.course_code');
        return view('pages.courses',compact('courses','student_course'));
        // dd($student_course);
    }

    public function fetch_data(Request $request){

        if($request->ajax())
        {
            $courses = DB::select('SELECT * FROM courses');
            $student_course = DB::select('SELECT students_course.id, students_course.student_id, students_course.course_code, students_course.student_work, students_course.student_oral, students_course.student_exam, students.name AS "student_name", students.code AS "student_code", courses.name AS "course_name", courses.work AS "course_work", courses.oral AS "course_oral", courses.exam AS "course_exam" FROM `students_course` INNER JOIN students ON students.id = students_course.student_id INNER JOIN courses ON courses.code = students_course.course_code');
            echo json_encode($student_course);
        }

        // $courses = DB::select('SELECT * FROM courses');
        // $student_course = DB::select('SELECT students_course.id, students_course.student_id, students_course.course_code, students_course.student_work, students_course.student_oral, students_course.student_exam, students.name AS "student_name", students.code AS "student_code", courses.name AS "course_name", courses.work AS "course_work", courses.oral AS "course_oral", courses.exam AS "course_exam" FROM `students_course` INNER JOIN students ON students.id = students_course.student_id INNER JOIN courses ON courses.code = students_course.course_code');
        // return view('pages.courses',compact('courses','student_course'));
    }

    function update_data(Request $request)
    {

            $work = $request->input('work');
            $oral = $request->input('oral');
            $exam = $request->input('exam');
            $id = $request->input('id');


            DB::select('UPDATE `students_course` SET `student_work`='.$work.',`student_oral`='.$oral.',`student_exam`='.$exam.' WHERE id ='.$id);
    }
}
