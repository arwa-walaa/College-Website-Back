<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// mmm
class Top50Controller extends Controller
{
    public function getTopLevel50($level){ 
        $students = DB::table('student')->where('level', '=', $level)->orderBy("GPA","DESC")->get()->take(50);
        return $students;
    }

    public function getTopDept50($dept){ 
        $students = DB::table('student')->where('departmentCode', '=', $dept)->orderBy("GPA","DESC")->get()->take(50);
        return $students;
    }
    public function ExamHalls($student_id)
    {
        $Exam_Halls = DB::table('exam_halls')->where('Student_id', '=', $student_id)->get();
        return $Exam_Halls;
    }
    public function getTopCourse50($courseName){ 
        // $students = DB::table('student')->where('departmentCode', '=', $dept)->orderBy("GPA","DESC")->get()->take(3);
        $students = DB::table('course_reigesters')
        ->join('student', 'student.studentId', '=', 'course_reigesters.studentId')
        ->join('course', 'course.courseID', '=', 'course_reigesters.courseid')
        ->where('course.courseName', '=', $courseName)->orderBy("course_reigesters.Result","DESC")
        ->get()->take(50);
        return $students;
    }
    public function getAllCourses(){ 
        $courses = DB::table('course')->get();
        return $courses;
       
    }
    public function getAllDepartments(){ 
        $depts = DB::table('department')->get();
        return $depts;
       
    }
    /*SELECT student.studentName ,studentregister.grade , course.courseName from studentregister,student,course
        where studentregister.studentId=student.studentId and course.courseID=studentregister.courseid
        order by studentregister.grade;*/
}
