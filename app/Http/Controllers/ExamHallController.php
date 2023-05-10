<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamHallController extends Controller
{
    public function ExamHalls($student_id)
    {
        $Exam_Halls = DB::table('exam_halls')->where('Student_id', '=', $student_id)->get();
        return $Exam_Halls;
    }
}
