<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StudentController extends Controller
{
    public function students(){
        $students = DB::select('SELECT * FROM students');
        $student_course = DB::select('SELECT student_id,course_code FROM students_course');
        $courses = DB::select('SELECT * FROM courses');
        $students_registered = DB::select('SELECT student_id,course_code FROM `students_course`');
        return view('pages.students',compact('students','courses','student_course','students_registered'));
        // dd(array_search('PHM011',array_column($courses,'code')));

        // for ($i=0; $i < count($courses); $i++) {

        // }

        // dd($courses);

        // dd(array_search('PHM021', array_column($courses, 'code')));

        // $course_code_array = [];
        // foreach ($student_course as $s_c) {
        //     array_push( $course_code_array,$s_c->course_code);
        // }
    }

    public function assigncourse(Request $request){
        $student_id = $request->student_id;
        $course_code = $request->course_code;
        $student_work = (int)$request->work;
        $student_oral = (int)$request->oral;
        $student_exam = (int)$request->exam;
        // $student_total =  $student_work + $student_oral + $student_exam;

        $student_course = DB::select('INSERT INTO `students_course`(`student_id`, `course_code`, `student_work`, `student_oral`, `student_exam` ) VALUES('.$student_id.',"'.$course_code.'" ,'.$student_work.' , '.$student_oral.', '.$student_exam.')');
        return redirect()->route('AllStudents');
    }

    public function studentscoursegrades(){
        $courses = DB::select('SELECT * FROM courses');
        $courses_array = [];
        for ($i=0; $i < count($courses); $i++) {
            array_push($courses_array,$courses[$i]->code);
        }
        $student_course2 = DB::select('SELECT students.name AS "student_name", students.code AS "student_code", SUM(students_course.student_work) AS "total_work", SUM(students_course.student_oral) AS "total_oral", SUM(students_course.student_exam) AS "total_exam", (SUM(students_course.student_work) + SUM(students_course.student_oral) + SUM(students_course.student_exam)) AS "total" FROM `students_course` INNER JOIN students ON students.id = students_course.student_id GROUP BY students.code');
        $total_course_grade = DB::select('SELECT (SUM(courses.work) + SUM(courses.oral) + SUM(courses.exam)) AS "all_total" FROM courses');

        return view('pages.studentscoursesgrades',compact('courses','student_course2','courses_array','total_course_grade'));
    }

    public function exporttopdf(){
        $courses = DB::select('SELECT * FROM courses');
        $courses_array = [];
        for ($i=0; $i < count($courses); $i++) {
            array_push($courses_array,$courses[$i]->code);
        }
        $student_course2 = DB::select('SELECT students.name AS "student_name", students.code AS "student_code", SUM(students_course.student_work) AS "total_work", SUM(students_course.student_oral) AS "total_oral", SUM(students_course.student_exam) AS "total_exam", (SUM(students_course.student_work) + SUM(students_course.student_oral) + SUM(students_course.student_exam)) AS "total" FROM `students_course` INNER JOIN students ON students.id = students_course.student_id GROUP BY students.code');
        $total_course_grade = DB::select('SELECT (SUM(courses.work) + SUM(courses.oral) + SUM(courses.exam)) AS "all_total" FROM courses');

        $courses_grades = DB::select('SELECT courses.name,courses.code,(SUM(courses.work)+SUM(courses.oral)+SUM(courses.exam)) AS "total" FROM `courses` GROUP BY courses.code');
        $student_courses = DB::select('SELECT courses.name,courses.code,COUNT(students_course.student_id) AS "student_count" FROM `students_course` INNER JOIN courses ON courses.code = students_course.course_code GROUP BY students_course.course_code');
        $student_grades = DB::select('SELECT students.name, courses.code, ( students_course.student_work + students_course.student_oral + students_course.student_exam ) AS "grade" FROM `students_course` INNER JOIN courses ON courses.code = students_course.course_code INNER JOIN students ON students.id = students_course.student_id');
        $student_grades_courses = DB::select('SELECT courses.name as "course_name",students.name, courses.code, ( students_course.student_work + students_course.student_oral + students_course.student_exam ) AS "grade", ROUND((courses.work + courses.oral + courses.exam) / 2) AS "total", CASE WHEN ( students_course.student_work + students_course.student_oral + students_course.student_exam ) > ROUND((courses.work + courses.oral + courses.exam) / 2) THEN "Success" ELSE "Fail" END AS "status" FROM `students_course` INNER JOIN courses ON courses.code = students_course.course_code INNER JOIN students ON students.id = students_course.student_id WHERE courses.code in (SELECT students_course.course_code FROM students_course) ORDER BY students.name');
        $success_ratio = DB::select('SELECT courses.code, courses.name, COUNT(students.id) AS "success_count" FROM `students_course` INNER JOIN courses ON courses.code = students_course.course_code INNER JOIN students ON students.id = students_course.student_id WHERE (students_course.student_work + students_course.student_oral + students_course.student_exam ) > ROUND((courses.work + courses.oral + courses.exam) / 2) GROUP BY courses.code');
        return view('pages.exportpdf',compact('courses','student_course2','courses_array','total_course_grade','student_grades_courses','success_ratio'));

        // dd($student_grades_courses);
        // dd($student_courses);

    }

}


