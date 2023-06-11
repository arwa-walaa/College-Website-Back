<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TAController extends Controller
{
    public function returnTAScheudule($TAId)
{
    $schedule =DB::table('group')
    ->join('ta', 'ta.TAId', '=', 'group.TAId')
    ->join('course', 'course.courseID', '=', 'group.courseId')
    ->select(
        'course.courseName',
       
        'group.startTime',
        'group.endTime',
        'group.slotDay',
        'group.slotPlace',
       
        'group.groupNumber',
    )
    ->where('ta.TAId', '=',$TAId )
    ->get();
    
    return $schedule;
}
}
