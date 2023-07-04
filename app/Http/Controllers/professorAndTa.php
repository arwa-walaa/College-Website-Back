<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\student;

use Illuminate\Http\Request;

class professorAndTa extends Controller
{
    public function getMyCourses($professorId)
{
    $courses = DB::table('course_reigesters')
    ->select('course.Course_Code',
    'course.courseName','course.Level',
    'course.Semester','course.courseID','course.departmentCode')
    ->join('professor', 'professor.professorId', '=', 'course_reigesters.professorId1')
    ->join('course', 'course.courseID', '=', 'course_reigesters.courseid')
    ->where('professor.professorId', '=', $professorId)->distinct()
    ->get();
    return $courses;
}

public function getTACourses($TAId)
{
    $courses = DB::table('course_reigesters')
    ->select('course.Course_Code',
    'course.courseName','course.Level'
    ,'course.Semester')
    ->join('course', 'course.courseID', '=', 'course_reigesters.courseid')
    ->join('ta', 'course_reigesters.TAId', '=', 'ta.TAId')
    ->where('ta.TAId', '=', $TAId)->distinct()
    ->get();

    return $courses;
}
public function getCourseProfYears($professorId,$CourseId)
{
    $years = DB::table('course_reigesters')
    ->select('course_reigesters.Year')
    ->join('professor', 'professor.professorId', '=', 'course_reigesters.professorId1')
    ->join('course', 'course.courseID', '=', 'course_reigesters.courseid')
    ->where('professor.professorId', '=', $professorId) 
    ->where('course.courseID', '=', $CourseId)->distinct()
    ->get();
    return $years;
}
public function getCourseProfYears2($professorId,$courseName)
{
    $years = DB::table('course_reigesters')
    ->select('course_reigesters.Year')
    ->join('professor', 'professor.professorId', '=', 'course_reigesters.professorId1')
    ->join('course', 'course.courseID', '=', 'course_reigesters.courseid')
    ->where('professor.professorId', '=', $professorId) 
    ->where('course.courseName', '=', $courseName)->distinct()
    ->get();
    return $years;
}
public function getCourseTAYears($TAID,$courseName)
{
    $years = DB::table('course_reigesters')
    ->select('course_reigesters.Year')
    ->join('ta', 'ta.TAId', '=', 'course_reigesters.TAId')
    ->join('course', 'course.courseID', '=', 'course_reigesters.courseid')
    ->where('ta.TAId', '=', $TAID) 
    ->where('course.courseName', '=', $courseName)->distinct()
    ->get();
    return $years;
}
public function getCourseYears()
{
    $years = DB::table('course_reigesters')
    ->select('course_reigesters.Year')
    ->join('professor', 'professor.professorId', '=', 'course_reigesters.professorId1')
    ->join('course', 'course.courseID', '=', 'course_reigesters.courseid')
     
   ->distinct()
    ->get();
    return $years;
}

public function getMyStudents($professorId)
{
    $students = DB::table('course_reigesters')->select('course.courseName','student.Level'
    ,'course.Semester',
    'student.studentName','student.GPA','course_reigesters.grade')
    ->join('student', 'student.studentId', '=', 'course_reigesters.studentId')
    ->join('course', 'course.courseID', '=', 'course_reigesters.courseid')
    ->where('course_reigesters.professorId1', '=', $professorId)->get();
    
    return $students;
}
public function getGrades($professorId)
{
    $courses = DB::table('course_reigesters')->select('course_reigesters.grade')
    ->join('professor', 'professor.professorId', '=', 'course_reigesters.professorId1')
    // ->join('course', 'course.courseID', '=', 'course_reigesters.courseid')
    ->where('professor.professorId', '=', $professorId)->get();
        return $courses;
}

public function selectCourse($courseName){ 
    // $students = DB::table('student')->where('departmentCode', '=', $dept)->orderBy("GPA","DESC")->get()->take(3);
    $students = DB::table('course_reigesters')
    ->join('student', 'student.studentId', '=', 'course_reigesters.studentId')
    ->join('course', 'course.courseID', '=', 'course_reigesters.courseid')
    ->where('course.courseName', '=', $courseName)
    ->get();
    return $students;
}
public function selectGrade($grade){ 
    // $students = DB::table('student')->where('departmentCode', '=', $dept)->orderBy("GPA","DESC")->get()->take(3);
    $students = DB::table('course_reigesters')
    ->join('student', 'student.studentId', '=', 'course_reigesters.studentId')
    ->join('course', 'course.courseID', '=', 'course_reigesters.courseid')
    ->where('course_reigesters.grade', '=', $grade)
    ->get();
    return $students;
}


}
