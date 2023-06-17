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

}
