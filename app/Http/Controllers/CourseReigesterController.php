<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseReigesterController extends Controller
{
   public $groupsData=[];
   public bool $confilect1;
   public bool $confilect2;
   public bool $confilect3;
    public function getCourseGroup($courseID){ 
        $groups = DB::table('group')
        // ->join('course', 'course.courseID', '=', 'group.courseId')
        ->where('group.courseId', '=', $courseID)->where('group.groupCount','>',0)->get();
        return $groups;
    }
    public function getCourseInfo($courseID){ 
        $courses = DB::table('course')
        // ->join('course', 'course.courseID', '=', 'group.courseId')
        ->where('course.courseID', '=', $courseID)->get();
        return $courses;
    }
    
public function registerCourses(Request $request)
{
    $courseDataArray = $request->all();
    foreach ($courseDataArray as $courseData) {
      
   
        $groupsData[]= DB::table('group')->where('courseId', '=', $courseData['courseID'] )->where('groupNumber','=',$courseData['selectedGroup'])->get();

  
    }
    $confilect1 = false;
    //conflict in groups
    for ($i = 0; $i < count($groupsData); $i++) {
       
        for ($j = $i + 1; $j < count($groupsData); $j++) {

            if (($groupsData[$i][0]->slotDay == $groupsData[$j][0]->slotDay)&&
                ($groupsData[$i][0]->startTime == $groupsData[$j][0]->startTime)) 
            {
                $confilect1 = true;
                break;
            }
        }
    
    }
    //conflict course with course
      $confilect2 = false;
      for ($i = 0; $i < count($courseDataArray); $i++) {
       
        for ($j = $i + 1; $j < count($courseDataArray); $j++) {

           
                if($courseDataArray[$i]['slotDayCourse1'] == $courseDataArray[$j]['slotDayCourse1']){
                    if($courseDataArray[$i]['startTimeCourse1'] == $courseDataArray[$j]['startTimeCourse1']){
                        $confilect2=true;
                        break;
                    }
                }
                else if ($courseDataArray[$i]['slotDayCourse2']== $courseDataArray[$j]['slotDayCourse2']) {
                    if($courseDataArray[$i]['startTimeCourse2'] == $courseDataArray[$j]['startTimeCourse2']){
                        $confilect2=true;
                        break;
                    }
                }else if($courseDataArray[$i]['slotDayCourse1'] == $courseDataArray[$j]['slotDayCourse2']){
                    if($courseDataArray[$i]['startTimeCourse1'] == $courseDataArray[$j]['startTimeCourse2']){
                        $confilect2=true;
                        break;
                    }
                }
                else if($courseDataArray[$i]['slotDayCourse2'] == $courseDataArray[$j]['slotDayCourse1']){
                    if($courseDataArray[$i]['startTimeCourse2'] == $courseDataArray[$j]['startTimeCourse1']){
                        $confilect2=true;
                        break;
                    }
                }
                
                 
           
               
        }
    
    }
    //conflict courese with group
     $confilect3 = false;
    foreach ($courseDataArray as $course) {
    // Loop through each object in $array2
    foreach ($groupsData as $grop) {
       
        // Compare the attributes of both objects
        if ($course['slotDayCourse1'] == $grop[0]->slotDay ) {
           if($course['startTimeCourse1']==$grop[0]->startTime){
                 $confilect3 = true;
                 break;
           }
        }
        // return response()->json(['message' =>$courseDataArray[1]['slotDayCourse2'] , $grop[0]->slotDay, $courseDataArray[1]['startTimeCourse2'], $grop[0]->startTime ]);
        if($course['slotDayCourse2'] == $grop[0]->slotDay){
             if($course['startTimeCourse2']==$grop[0]->startTime){
                 $confilect3 = true;
                 break;
           }
        }
    }
}
if(!$confilect1 && !$confilect2 && !$confilect3){
    foreach ($courseDataArray as $courseData) {
          DB::table('course_reigesters')->insert ([
    'groupId' =>$courseData['selectedGroup'],
    'courseid'=>$courseData['courseID'] ,
    'studentId'=>$courseData['studentId'],
    'creditHours'=>$courseData['creditHours'],
    'grade'=> $courseData['grade'], 
    'professorId1'=> $courseData['professor1'], 
    'professorId2'=> $courseData['professor2'], 
    'TAId'=> $courseData['TAId'], 
    'Year'=> $courseData['Year'],


]);
    DB::table('group')
   ->where('courseId', $courseData['courseID'])->where('groupNumber',$courseData['selectedGroup'])
   ->decrement('groupCount', 1);
}

return response()->json(['message' =>  true ]);

}else{
    return response()->json(['message' => false ]);

}
   
   
}


public function returnCourseResult($studentId)
{
    $students = DB::table('course_reigesters')->select('course.Course_Code','course.courseName','course.Level'
    ,'course.Semester',
    'course_reigesters.creditHours','course_reigesters.grade','course_reigesters.TermWork','course_reigesters.ExamWork',
    'course_reigesters.Result','course_reigesters.groupId','course_reigesters.Year')
    ->join('student', 'student.studentId', '=', 'course_reigesters.studentId')
    ->join('course', 'course.courseID', '=', 'course_reigesters.courseid')
    ->where('student.studentId', '=', $studentId)->orderBy(DB::raw("
    CASE course.Level
        WHEN 'First Level' THEN 1
        WHEN 'Second Level' THEN 2
        WHEN 'Third Level' THEN 3
        WHEN 'Fourth Level' THEN 4
        ELSE 5
    END
    "))->orderBy(DB::raw("
    CASE course.Semester
        WHEN 'First' THEN 1
        WHEN 'Second' THEN 2
    
        ELSE 3
    END
    "))->get();
        return $students;
}

public function returnScheudule($studentId)
{
    $schedule =DB::table('course')
    ->join('course_reigesters', 'course.courseID', '=', 'course_reigesters.courseid')
    ->join('group', function($join) {
        $join->on('course_reigesters.groupId', '=', 'group.groupNumber');
        $join->on('course_reigesters.courseid', '=', 'group.courseId');
     })
    ->select(
        'course.courseName',
        'course.startTime1',
        'course.endTime1',
        'course.startTime2',
        'course.endTime2',
        'course.slotday1',
        'course.slotday2',
        'group.startTime',
        'group.endTime',
        'group.slotDay',
        'group.slotPlace',
        'course.slotPlace1',
        'course.slotPlace2',
        'group.groupNumber',
    )
    ->where('course_reigesters.studentId', '=', $studentId)
    ->get();
    
    return $schedule;
}
public function getTAId($groupNumber,$corseId){
    $TAId =DB::table('group')->where('groupNumber', '=', $groupNumber)
    ->where('courseId', '=', $corseId)->get();
    return $TAId;
}
}
