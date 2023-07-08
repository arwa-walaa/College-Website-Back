<?php

namespace App\Http\Controllers;

use App\Models\Announcemets;
use Illuminate\Http\Request;
use App\Mail\NewAnnouncementNotification;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Mail\SendMailreset;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


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
// public function insertOfficeHour(Request $request, $professorOrTAId)
// {
//     $officeHours = $request->all();
//     // Loop through each office hour and insert it into the database
//     foreach ($officeHours as $hour) {
//         $officeHourCount = DB::table('_office_hour_')
//             ->where('StartTime', '=', $hour['startTime'])
//             ->where('EndTime', '=', $hour['endTime'])
//             ->where('Day', '=', $hour['Day'])
//             ->where('Location', '=', $hour['location'])
//             ->where('Department', '=', 'is')
//             ->where(function ($query) use ($professorOrTAId) {
//                 $query->where('ProfessorId', '=', $professorOrTAId)
//                       ->orWhere('TAid', '=', $professorOrTAId);
//             })
//             ->count();

//         if ($officeHourCount == 0) {
//             if ($hour['type']=='TA') {
//                 DB::table('_office_hour_')->insert([
//                     [
//                         'TAid' => $professorOrTAId,
//                         'professorOrTAName' => $hour['name'],
//                         'Email' => $hour['email'],
//                         'Location' => $hour['location'],
//                         'StartTime' => $hour['startTime'],
//                         'EndTime' => $hour['endTime'],
//                         'Day' => $hour['Day'],
//                         'Department' => $hour['department']
//                     ]
//                 ]);
//             } elseif ($hour['type']=='Professor') {
//                 DB::table('_office_hour_')->insert([
//                     [
//                         'ProfessorId' => $professorOrTAId,
//                         'professorOrTAName' => $hour['name'],
//                         'Email' => $hour['email'],
//                         'Location' => $hour['location'],
//                         'StartTime' => $hour['startTime'],
//                         'EndTime' => $hour['endTime'],
//                         'Day' => $hour['Day'],
//                         'Department' => $hour['department']
//                     ]
//                 ]);
//             }
//         }
//     }
// }
public function insertOfficeHour(Request $request, $professorOrTAId)
{
    $officeHours = $request->all();
    // Loop through each office hour and insert it into the database
    foreach ($officeHours as $hour) {
        $startTime = strtotime($hour['startTime']);
        $endTime = strtotime($hour['endTime']);

        if ($startTime >= $endTime || ($endTime - $startTime) == 0) {
            return response()->json(['error' => 'Invalid office hours. Start time must be before end time and the duration between them must be greater than zero.'], 400);
        }

        $officeHourCount = DB::table('_office_hour_')
            ->where('StartTime', '=', $hour['startTime'])
            ->where('EndTime', '=', $hour['endTime'])
            ->where('Day', '=', $hour['Day'])
            ->where('Location', '=', $hour['location'])
            ->where('Department', '=', $hour['department'])
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
    return response()->json(['message' => 'Office hours added successfully.'], 200);
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
    
  }
  public function rejectGP_prof($GPID){
    DB::table('gp')
    ->where('id',$GPID)
    ->update(['Prof_status' => 'Rejected']);
    
  
  }
   public function acceptGP_TA($GPID){
    DB::table('gp')
    ->where('id', $GPID)
    ->update(['Ta_status' => 'Accepted']);
     
  }
  public function rejectGP_TA($GPID){
    DB::table('gp')
    ->where('id',$GPID)
    ->update(['Ta_status' => 'Rejected']);
    
  
  }
  public function getStudentData($StudentID){
   $student= DB::table('student')
    ->where('studentId',$StudentID)
    ->get();
    return $student;
  }
  public function returnAllProfessor()
{
   
    $prf = DB::table('professor') ->get();
    return $prf;
}
public function returnAllTAs()
{
   
    $prf = DB::table('ta') ->get();
    return $prf;
}
public function AddCourse(Request $request){
    $mailMessage = 'You have been assigned to a new course '.$request->input('course_name');
    
    $startTime2 = strtotime($request->input('start_time2'));
    $endTime2 = strtotime($request->input('end_time2'));
    $startTime1 = strtotime($request->input('start_time1'));
    $endTime1 = strtotime($request->input('end_time1'));

    if ($startTime1 >= $endTime1 || ($endTime1 - $startTime1) == 0) {
        return response()->json(['error' => 'Invalid time. Start time1 must be before end time1 and the duration between them must be greater than zero.'], 400);
    }
     if($startTime2 >= $endTime2 || ($endTime2 - $startTime2) == 0 ) {
            return response()->json(['error' => 'Invalid time. Start time2 must be before end time2 and the duration between them must be greater than zero.'], 400);
        }

   
        DB::table('course')    ->insert([
        
        'courseID' => $request->input('course_code'),
        'professor2' => $request->input('professor2'),
        'professor1' => $request->input('professor1'),
        'slotPlace2' => $request->input('slot_place2'),  
        'slotPlace1' => $request->input('slot_place1'),
        'endTime2' => $request->input('end_time2'),
        'startTime2' => $request->input('start_time2'),
        'slotday2' => $request->input('slot_day2'),
        'creditHours' => $request->input('credit_hours'),
        'endTime1' => $request->input('end_time1'),
        'startTime1' => $request->input('start_time1'),
        'slotday1' => $request->input('slot_day1'),
        'type' => $request->input('type'),
        'Semester' => $request->input('semester'),
        'Level' => $request->input('level'),
        'Course_Code' => $request->input('course_code'),
        'departmentCode' => $request->input('department_code'),
        'courseName' => $request->input('course_name'),
        'Num_of_groups' => $request->input('num_of_groups'),
        
    ]);

    $user = User::find(3);

    Mail::to($user->email)->send(new NewAnnouncementNotification($mailMessage));
    return response()->json(['message' => 'Email sent successfully.'], 200);
}
}

      


