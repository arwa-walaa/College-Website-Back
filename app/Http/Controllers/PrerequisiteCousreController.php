<?php

namespace App\Http\Controllers;

use App\Models\prerequisiteCousre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrerequisiteCousreController extends Controller
{
    public function getCourses_Student($level,$semester,$id)
    {
    //    $courses= DB::table('course as c')
    //     ->select('c.courseName', 'c.courseId','c.type')
    //     ->distinct()
    //     ->join('prerequisitecousre as pc', 'c.courseId', '=', 'pc.ID_COURSE')
    //     ->join('course_reigesters as sr', 'sr.courseId', '=', 'pc.ID_PREREQ_COURSE')
    //     ->where('sr.studentId', '=', $id)
    //     ->where('sr.Result', '>', 50)
    //     ->where('c.Level', '=', $level)
       
    //     ->where('c.Semester', '=', $semester)
    //     ->get();
    $courses = DB::table('course as c')
        ->select('c.courseName', 'c.courseId','c.type')
        ->distinct()
        ->join('prerequisitecousre as pc', 'c.courseId', '=', 'pc.ID_COURSE')
        ->join('course_reigesters as sr', 'sr.courseId', '=', 'pc.ID_PREREQ_COURSE')
        ->where('sr.studentId', '=', $id)
        ->where('sr.Result', '>', 50)
        ->where('c.Level', '=', $level)
        ->where('c.Semester', '=', $semester)
        ->whereNotIn('c.courseId', function($query) use ($id) {
            $query->select('courseId')
                ->from('course_reigesters')
                ->where('studentId', '=', $id);
        })
        ->get();
      
        return  $courses; 
    }
   

    
    
}
