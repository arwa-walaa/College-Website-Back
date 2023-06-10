<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfessorController extends Controller
{
    public function returnProfScheudule($professorID)
{
    $schedule =DB::table('course')
    ->join('course_professor', 'course.courseID', '=', 'course_professor.courseID')
    ->select(
        'course.courseName',
        'course.startTime1',
        'course.endTime1',
        'course.startTime2',
        'course.endTime2',
        'course.slotday1',
        'course.slotday2',
        'course.slotPlace1',
        'course.slotPlace2',
        
    )
    ->where('course_professor.professorID', '=', $professorID)
    ->get();
    
    return $schedule;
}
public function returnAllPlaces(){
    $results = DB::table('course')
            ->select('slotPlace1')
            ->distinct()
            ->union(DB::table('course')
                    ->select('slotPlace2')
                    ->distinct())
            ->get();
            return $results;

}
public function returnPlaceScheduale($place){

$results = DB::table('course')
    ->select('slotday1', 'startTime1', 'endTime1', 'slotPlace1','courseName')
    ->where('slotPlace1', $place)
    ->union(DB::table('course')
        ->select('slotday2', 'startTime2', 'endTime2', 'slotPlace2','courseName')
        ->where('slotPlace2', $place)
    )
    
    ->get();
   return $results; 



}
}
