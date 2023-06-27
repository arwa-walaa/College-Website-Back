<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TAController extends Controller
{
    public function returnTAScheudule($TAId, $Semeter)
{
    $schedule =DB::table('group')
    ->join('ta', 'ta.TAId', '=', 'group.TAId')
    ->join('course', 'course.courseID', '=', 'group.courseId')
    // ->join('course_reigesters', 'course.courseID', '=', 'course_reigesters.courseid')
    ->join('course_reigesters', 'course_reigesters.TAId', '=', 'group.TAId')
    ->select(
        'course.courseName',
       
        'group.startTime',
        'group.endTime',
        'group.slotDay',
        'group.slotPlace',
       
        'group.groupNumber',
    )
    ->where('ta.TAId', '=',$TAId )
    ->where('course.Semester', '=', $Semeter)
    ->where('course_reigesters.Year', '=', date('Y'))->distinct()
    ->get();
    
    return $schedule;
}
}
