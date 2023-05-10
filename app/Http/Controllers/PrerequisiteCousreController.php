<?php

namespace App\Http\Controllers;

use App\Models\prerequisiteCousre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrerequisiteCousreController extends Controller
{
    public function getCourses_Student($level,$semester,$department,$id)
    {
       $courses= DB::table('course as c')
        ->select('c.courseName', 'c.courseId','c.type')
        ->distinct()
        ->join('prerequisitecousre as pc', 'c.courseId', '=', 'pc.ID_COURSE')
        ->join('course_reigesters as sr', 'sr.courseId', '=', 'pc.ID_PREREQ_COURSE')
        ->where('sr.studentId', '=', $id)
        ->where('sr.Result', '>', 50)
        ->where('c.Level', '=', $level)
        ->where('c.departmentCode', '=', $department)
        ->where('c.Semester', '=', $semester)
        ->get();
      
        return  $courses; 
    }
   

    
    
}
