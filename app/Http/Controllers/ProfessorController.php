<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfessorController extends Controller
{
    public function returnProfScheudule($professorID,$Semeter)
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
    ->where('course.Semester', '=', $Semeter)
    ->where('course_reigesters.Year', '=', date('Y'))
    ->where('course.professor1', '=', $professorID)
    ->orWhere('course.professor2', '=', $professorID)->distinct()
    ->get();
    
    return $schedule;
}

public function returnCourseScheudule($courseID,$Semeter)
{
    
    $schedule =DB::table('course')
    ->join('course_reigesters', 'course.courseID', '=', 'course_reigesters.courseid')
    ->join('group', 'group.courseId', '=', 'course.courseID')
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
        'group.slotDay',
        'group.groupNumber',
        'group.slotPlace',
        'group.endTime',
        'group.startTime',
        
        
    )
    ->where('course.Semester', '=', $Semeter)
    ->where('course_reigesters.Year', '=', date('Y'))
    ->where('course.courseID', '=', $courseID)
    ->distinct()
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
public function returnPlaceScheduale($place, $Semeter){

$results = DB::table('course')
    ->select('slotday1', 'startTime1', 'endTime1', 'slotPlace1','courseName')
    ->join('course_reigesters', 'course.courseID', '=', 'course_reigesters.courseid')
                    ->where('course.Semester', '=', $Semeter)
                    ->where('course_reigesters.Year', '=', date('Y'))
    ->where('slotPlace1', $place)
    ->union(DB::table('course')
        ->select('slotday2', 'startTime2', 'endTime2', 'slotPlace2','courseName')
        ->join('course_reigesters', 'course.courseID', '=', 'course_reigesters.courseid')
                    ->where('course.Semester', '=', $Semeter)
                    ->where('course_reigesters.Year', '=', date('Y'))
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
            ->where('professor.professorId', '=', $professorID)
            ->get();
    return $results;
}
public function returnTAOfficeHours($taID)
{
    $results = DB::table('ta')
            ->join('_office_hour_', 'ta.TAId', '=', '_office_hour_.TAid')
            ->select('_office_hour_.id','_office_hour_.Day', '_office_hour_.Location', '_office_hour_.StartTime', '_office_hour_.EndTime')
            ->where('_office_hour_.TAid', '=', $taID)
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
public function updateTAProfile(Request $request, $id)
{
    DB::table('ta')
        ->where('TAId', $id)
        ->update([
            'TAName' => $request->input('EName'),
            'address' => $request->input('Address'),
            'phone' => $request->input('Phone'),
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
public function returnCourseStat($courseID,$Year,$Deparment)
{
    $results = DB::table('course_reigesters')
    ->join('course', 'course.courseID', '=','course_reigesters.courseid' )
    ->select(DB::raw('COUNT(studentId) AS num_students_registered'),
             DB::raw('SUM(CASE WHEN grade != "F" THEN 1 ELSE 0 END) AS num_students_passed'),
             DB::raw('SUM(CASE WHEN grade = "F" THEN 1 ELSE 0 END) AS num_students_failed'))
    ->where('course_reigesters.courseid', '=', $courseID)
    ->where('course_reigesters.Year', '=', $Year)
    ->where('course.departmentCode', '=', $Deparment)
    ->get();
    return $results;
}
public function returnCourseStudent($courseID,$Year,$Deparment)
{
    $results = DB::table('course_reigesters')
    ->join('course', 'course.courseID', '=','course_reigesters.courseid' )
            ->select('course_reigesters.studentId','course_reigesters.Result')
            ->where('course_reigesters.courseid', '=', $courseID)
            ->where('course_reigesters.Year', '=', $Year)
            ->where('course.departmentCode', '=', $Deparment)
            ->get();
    return $results;
}
public function returnGradeAvg($courseID,$Year,$Deparment)
{
   
    $avg_grade = DB::table('course_reigesters')
    ->join('course', 'course.courseID', '=','course_reigesters.courseid' )
                    ->select(DB::raw('AVG(Result) as avg_grade'))
                    ->where('course_reigesters.courseid', '=', $courseID)
    ->where('course_reigesters.Year', '=', $Year)
    ->where('course.departmentCode', '=', $Deparment)
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
                   
                    ->get();
    return $prf;
}
public function returnAllTAs()
{
   
    $prf = DB::table('ta')
                    
                    ->get();
    return $prf;
}
public function AddCourse(Request $request){
    $mailMessage = 'You have been assigned to a new course '.$request->input('courseName');
    DB::table('course')
   
    ->insert([
        
        'courseID' => $request->input('Course_Code'),
        'professor2' => $request->input('professor2'),
        'professor1' => $request->input('professor1'),
        'slotPlace2' => $request->input('slotPlace2'),  
        'slotPlace1' => $request->input('slotPlace1'),
        'endTime2' => $request->input('endTime2'),
        'startTime2' => $request->input('startTime2'),
        'slotday2' => $request->input('slotday2'),
        'creditHours' => $request->input('creditHours'),
        'endTime1' => $request->input('endTime1'),
        'startTime1' => $request->input('startTime1'),
        'slotday1' => $request->input('slotday1'),
        'type' => $request->input('type'),
        'Semester' => $request->input('Semester'),
        'Level' => $request->input('Level'),
        'Course_Code' => $request->input('Course_Code'),
        'departmentCode' => $request->input('departmentCode'),
        'courseName' => $request->input('courseName'),
        'Num_of_groups' => $request->input('Num_of_groups'),
        
    ]);

    $user = User::find(3);

    Mail::to($user->email)->send(new NewAnnouncementNotification($mailMessage));
    return response()->json(['message' => 'Email sent successfully.'], 200);
}
}

      


