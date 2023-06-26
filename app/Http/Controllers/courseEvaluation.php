<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class courseEvaluation extends Controller
{
    

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

//    public function getProfessorID(Request $request)
//    {
//     $professorID=DB::table('professor')->where('courseID', '=', $request->courseID)->get('professorId');
//     return $professorID;
//    }
public function getProfessorDetails( $studID,$courseID){
    $result = DB::table('course_reigesters')
    ->leftJoin('professor AS p1', 'course_reigesters.professorId1', '=', 'p1.professorId')
    ->leftJoin('professor AS p2', 'course_reigesters.professorId2', '=', 'p2.professorId')
    ->select('p1.professorId AS professorID1','p1.professorName AS professorName1', 'p2.professorId AS professorID2','p2.professorName AS professorName2')
    ->where('course_reigesters.studentId', '=', '20190022')
    ->where('course_reigesters.courseID', '=', '7')
    ->get();
       return    $result;

}


public function getTADetails( $studID,$courseID){
    $ta = DB::table('ta')
    ->join('course_reigesters', 'course_reigesters.TAId', '=', 'ta.TAId')
    ->join('student', 'course_reigesters.studentId', '=', 'student.studentId')
    ->join('group', function($join) {
        $join->on('course_reigesters.courseid', '=', 'group.courseId')
             ->on('course_reigesters.groupId', '=', 'group.groupNumber');
    })
    ->select('ta.TAId', 'ta.TAName')
    ->where('student.studentId', '=', $studID)
    ->where('course_reigesters.courseid', '=', $courseID)
    
    ->get();
    return $ta;

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

public function getStudentCourses($studID){
    $courses = DB::table('course_reigesters')
    ->select('course.courseName','course.courseID')
   
    ->join('student', 'student.studentId', '=', 'course_reigesters.studentId')
    ->join('course', 'course.courseID', '=', 'course_reigesters.courseid')
    ->where('student.studentId', '=', $studID)->get();
        return $courses;

}


}