<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class courseEvaluation extends Controller
{
    // public $courseID;
    // public $professorID;
    // public $TAID;

    Public function insertCourseEvaluation(Request $request)
   {
       
//   $courseID=DB::table('_course')->where('courseName', '=', $request->courseName)->get('courseID');
//     $professorID=DB::table('professor')->where('professorName', '=', $request->professorName)->get('professorID');
    // $TAID=DB::table('_t_a')->where('TAName', '=', $request->TAName)->get('TAId ');
        DB::table('evaluation')->insert ([
            'contentRate' => $request-> contentRate,
            'isRepeated'=> $request-> isRepeated,
            'isClear'=> $request-> isClear,
            'relevantToObjectives'=> $request-> relevantToObjectives,
            'preparetionForFutureCourses'=> $request-> preparetionForFutureCourses,
            'courseID'=> $request->courseID,

            'engagedStudents' => $request-> engagedStudents,
            'conveiedMaterial'=> $request-> conveiedMaterial,
            'isClearAgenda'=> $request-> isClearAgenda,
            'teacherEffectiveness'=> $request-> teacherEffectiveness,
            'communicationSkills'=> $request-> communicationSkills,
            'professorId'=> $request-> professorId,
       
            'TAengagedStudents' => $request-> engagedStudents,
            'TAconveiedMaterial'=> $request-> conveiedMaterial,
            'TAisClearAgenda'=> $request-> isClearAgenda,
            'TAteacherEffectiveness'=> $request-> teacherEffectiveness,
            'TAcommunicationSkills'=> $request-> communicationSkills,
            'TAId'=> $request-> TAId,
           // 'TAId'=>$TAID,
   ]);
       
       return response('Data has been inserted successfully');
   }

   public function getCourseID(Request $request)
   {
    $courseID=DB::table('course')->where('courseName', '=', $request->courseName)->get('courseID');
    return $courseID;
   }

   public function getProfessorID(Request $request)
   {
    $professorID=DB::table('professor')->where('courseID', '=', $request->courseID)->get('professorId');
    return $professorID;
   }

   public function getTAID(Request $request)
   {
    $TAID=DB::table('ta')->where('courseID', '=', $request->courseID)->get('TAId');
    return $TAID;
   }

   Public function getCourseDetails(Request $request){

    $professorName = DB::table('professor')->where('courseID', '=', $request->courseID)->get('professorName');
    $TAName = DB::table('ta')->where('courseID', '=', $request->courseID)->get('TAName');
    $courseName=DB::table('course')->where('courseID', '=', $request->courseID)->get('courseName');

    

    return [
        'professorName' => $professorName,
        'TAName' => $TAName,
        'courseName'=>$courseName
    ];
   }

   public function getFeedbacks($courseName , $teacherId) {
    $courseID = DB::table('course')->where('courseName', '=', $courseName)->pluck('courseID');
    $feedbacks = DB::table('evaluation')->select('contentRate', 'isRepeated', 'isClear',  'relevantToObjectives', 'preparetionForFutureCourses',
    'engagedStudents', 'conveiedMaterial', 'isClearAgenda', 'teacherEffectiveness', 'communicationSkills', 
    'TAengagedStudents', 'TAconveiedMaterial', 'TAisClearAgenda', 'TAteacherEffectiveness', 'TAcommunicationSkills')
    ->where('professorId','=',$teacherId)
    ->orWhere('TAId','=',$teacherId)
    ->where('courseID', '=',  $courseID)
    ->get();

    

    return response()->json($feedbacks);
}



//    Public function insertProfessorEvaluation(Request $request)
//    {
//         DB::table('prof_evaluation')->insert ([
//         'engagedStudents' => $request-> engagedStudents,
//         'conveiedMaterial'=> $request-> conveiedMaterial,
//         'isClearAgenda'=> $request-> isClearAgenda,
//         'teacherEffectiveness'=> $request-> teacherEffectiveness,
//         'communicationSkills'=> $request-> communicationSkills,
        
//        ]);

//        return response('Data has been inserted successfully');
//    }
//    Public function insertTAEvaluation(Request $request)
//    {
//         DB::table('_t_a_evaluation')->insert ([
//             'engagedStudents' => $request-> engagedStudents,
//             'conveiedMaterial'=> $request-> conveiedMaterial,
//             'isClearAgenda'=> $request-> isClearAgenda,
//             'teacherEffectiveness'=> $request-> teacherEffectiveness,
//             'communicationSkills'=> $request-> communicationSkills,
            
//        ]);

//        return response('Data has been inserted successfully');
//    }
}