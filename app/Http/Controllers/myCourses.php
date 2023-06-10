<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class myCourses extends Controller
{
    public function getMyCourses($professorId)
{
    $courses = DB::table('course_reigesters')->select('course.Course_Code','course.courseName','course.Level'
    ,'course.Semester')
    ->join('professor', 'professor.professorId', '=', 'course_reigesters.professorId1')
    ->join('course', 'course.courseID', '=', 'course_reigesters.courseid')
    ->where('professor.professorId', '=', $professorId)->orderBy(DB::raw("
    CASE course.Level
        WHEN 'First Level' THEN 1
        WHEN 'Second Level' THEN 2
        WHEN 'Third Level' THEN 3
        WHEN 'Fourth Level' THEN 4
        ELSE 5
    END
    "))->orderBy(DB::raw("
    CASE course.Semester
        WHEN 'First' THEN 1
        WHEN 'Second' THEN 2
    
        ELSE 3
    END
    "))->get();
        return $courses;
}
}
