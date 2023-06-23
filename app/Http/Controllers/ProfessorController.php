<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfessorController extends Controller
{
    public function returnProfScheudule($professorID)
{
    
    $schedule =DB::table('course')
    ->join('course_reigesters', 'course.courseID', '=', 'course_reigesters.courseid')
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
    ->where('course_reigesters.professorId1', '=', $professorID)
    ->orWhere('course_reigesters.professorId2', '=', $professorID)
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
public function insertOfficeHour(Request $request, $professorOrTAId)
{
    $officeHours = $request->all();
    // Loop through each office hour and insert it into the database
    foreach ($officeHours as $hour) {
        $officeHourCount = DB::table('_office_hour_')
            ->where('StartTime', '=', $hour['startTime'])
            ->where('EndTime', '=', $hour['endTime'])
            ->where('Day', '=', $hour['Day'])
            ->where('Location', '=', $hour['location'])
            ->where('Department', '=', 'is')
            ->where(function ($query) use ($professorOrTAId) {
                $query->where('ProfessorId', '=', $professorOrTAId)
                      ->orWhere('TAid', '=', $professorOrTAId);
            })
            ->count();

        if ($officeHourCount == 0) {
            if ($hour['type']=='TA') {
                DB::table('_office_hour_')->insert([
                    [
                        'TAid' => $professorOrTAId,
                        'professorOrTAName' => $hour['name'],
                        'Email' => $hour['email'],
                        'Location' => $hour['location'],
                        'StartTime' => $hour['startTime'],
                        'EndTime' => $hour['endTime'],
                        'Day' => $hour['Day'],
                        'Department' => $hour['department']
                    ]
                ]);
            } elseif ($hour['type']=='Professor') {
                DB::table('_office_hour_')->insert([
                    [
                        'ProfessorId' => $professorOrTAId,
                        'professorOrTAName' => $hour['name'],
                        'Email' => $hour['email'],
                        'Location' => $hour['location'],
                        'StartTime' => $hour['startTime'],
                        'EndTime' => $hour['endTime'],
                        'Day' => $hour['Day'],
                        'Department' => $hour['department']
                    ]
                ]);
            }
        }
    }
}

public function returnProfOfficeHours($professorID)
{
    $results = DB::table('professor')
            ->join('_office_hour_', 'professor.professorId', '=', '_office_hour_.professorId')
            ->select('_office_hour_.id','_office_hour_.Day', '_office_hour_.Location', '_office_hour_.StartTime', '_office_hour_.EndTime')
            ->where('professor.professorId', '=', 'ihelal')
            ->get();
    return $results;
}
public function deleteOfficeHours($officeHourID)
{
    DB::table('_office_hour_')->where('id', '=', $officeHourID)->delete();

}
public function updateProfProfile(Request $request, $id)
{
    DB::table('professor')
        ->where('professorId', $id)
        ->update([
            'professorName' => $request->input('EName'),
            'address' => $request->input('Address'),
            'phoneNumber' => $request->input('Phone'),
            'email' => $request->input('Email'),  
        ]);
    
    return response()->json(['success' => true]);
}
public function updateProfOfficeHour(Request $request, $id)
{
    
    DB::table('_office_hour_')
        ->where('id', $id)
        ->update([
            'Day' => $request->input('Day'),
            'Location' => $request->input('Location'),
            'StartTime' => $request->input('StartTime'),
            'EndTime' => $request->input('EndTime'),  
        ]);
    
    return response()->json(['success' => true]);
}
public function returnCourseTAS($courseID)
{
    $results = DB::table('course')
            ->join('ta', 'ta.courseID', '=','course.courseID' )
            ->select('ta.TAName')
            ->where('course.courseID', '=', $courseID)
            ->get();
    return $results;
}
public function returnCourseStat($courseID,$Year)
{
    $results = DB::table('course_reigesters')
    ->select(DB::raw('COUNT(studentId) AS num_students_registered'),
             DB::raw('SUM(CASE WHEN grade != "F" THEN 1 ELSE 0 END) AS num_students_passed'),
             DB::raw('SUM(CASE WHEN grade = "F" THEN 1 ELSE 0 END) AS num_students_failed'))
    ->where('courseid', '=', $courseID)
    ->where('Year', '=', $Year)
    ->get();
    return $results;
}
public function returnCourseStudent($courseID,$Year)
{
    $results = DB::table('course_reigesters')
            
            ->select('course_reigesters.studentId','course_reigesters.Result')
            ->where('course_reigesters.courseid', '=', $courseID)
            ->where('Year', '=', $Year)
            ->get();
    return $results;
}
public function returnGradeAvg($courseID,$Year)
{
   
    $avg_grade = DB::table('course_reigesters')
                    ->select(DB::raw('AVG(Result) as avg_grade'))
                    ->where('courseid', $courseID)
                    ->where('Year', '=', $Year)
                    ->get();
    return $avg_grade;
}
public function searchByStudent(Request $request) {
        $query = $request->get('q');
        
        $users = DB::table('student')
                     ->where('studentName', 'like', '%'.$query.'%')
                     ->orWhere('studentId', $query)
                     ->get();
        
        return response()->json($users);
      }

    public function returnRequestsGP($Type, $professorOrTAId)
{

            if ($Type=='TA') {
                $result = DB::table('gp')
                ->join('ta', 'ta.TAId', '=','gp.TA' )
                ->join('professor', 'professor.professorId', '=','gp.professor' )
                ->where('TA', $professorOrTAId)
                ->where('Ta_status','Pending')
                ->get();

               
            } elseif ($Type=='Professor') {
                $result = DB::table('gp')
                ->join('professor', 'professor.professorId', '=','gp.professor' )
                ->join('ta', 'ta.TAId', '=','gp.TA' )
                ->where('professor', $professorOrTAId)->where('Prof_status','Pending')
                ->get();
                
            }
            return $result;
        
    }
  public function acceptGP_prof($GPID){
    DB::table('gp')
    ->where('id', $GPID)
    ->update(['Prof_status' => 'Accepted']);
     //notification : notify this student that the request accepted
  }
  public function rejectGP_prof($GPID){
    DB::table('gp')
    ->where('id',$GPID)
    ->update(['Prof_status' => 'Rejected']);
    //notification : notify this student that the request rejected
  
  }
   public function acceptGP_TA($GPID){
    DB::table('gp')
    ->where('id', $GPID)
    ->update(['Ta_status' => 'Accepted']);
     //notification : notify this student that the request accepted
  }
  public function rejectGP_TA($GPID){
    DB::table('gp')
    ->where('id',$GPID)
    ->update(['Ta_status' => 'Rejected']);
    //notification : notify this student that the request rejected
  
  }
  public function getStudentData($StudentID){
   $student= DB::table('student')
    ->where('studentId',$StudentID)
    ->get();
    return $student;
  }
  public function returnAllProfessor()
{
   
    $prf = DB::table('professor')
                    ->select('professorName')
                    ->get();
    return $prf;
}
public function returnAllTAs()
{
   
    $prf = DB::table('ta')
                    ->select('TAName')
                    ->get();
    return $prf;
}
}

      


