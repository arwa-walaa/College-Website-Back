<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function returnAcceptedRequestsGP()
    {           
                    $result = DB::table('gp')    
                    ->join('ta', 'ta.TAId', '=','gp.TA' ) 
                    ->join('professor', 'professor.professorId', '=','gp.professor' ) 
                    ->where('Ta_status','Accepted')             
                    ->where('Prof_status','Accepted')      
                    ->get();                
                    return $result;           
   }

   public function get_Number_Of_Students_In_Department($year)
    {
        $data = DB::table('student')
        ->join('program_perferences', 'program_perferences.studentId', '=','student.studentId' ) 
         ->select('departmentCode', DB::raw('count(*) as count'))
         ->where('program_perferences.Year','=',$year) 
            ->groupBy('departmentCode')
            ->get();

        return response()->json($data);
    }

    public function get_GPA_distribution_In_Department($year)
    {
        $departments = DB::table('department')->select('departmentCode')->get();

        foreach ($departments as $dept) {
            $deptData = DB::table('student')
            ->join('program_perferences', 'program_perferences.studentId', '=','student.studentId' ) 
            ->select('student.studentId', 'GPA')
            ->where('departmentCode', $dept->departmentCode)
            ->where('program_perferences.Year','=',$year) 
            ->get();
            $data[$dept->departmentCode] = $deptData;
        }
    
       
        return response()->json($data);
    }
    public function getPreferencesYears()
    {
        $deptData = DB::table('program_perferences')->select('program_perferences.Year')->distinct()->get();
        return $deptData;
        
    }

    // public function calculateGPA()
    // {
    //     $studentsIDs = DB::table('course_reigesters')->distinct()->select('studentId')->get();
    
    //     $grade_point_mapping = [
    //         'A+' => 4.0,
    //         'A' => 3.7,
        
    //         'B+' => 3.3,
    //         'B' => 3.0,
         
    //         'C+' => 2.7,
    //         'C' => 2.4,
        
    //         'D+' => 2.2,
    //         'D' => 2.0,

    //         'F' => 0.0,
    //     ];
    
    //     foreach ($studentsIDs as $studentID) {
    //         $courses = DB::table('course_reigesters')->select('courseid','grade','creditHours')->where('studentId', $studentID->studentId)->get();
    
    //         $total_grade_points = 0;
    //         $total_credit_hours = 0;
    
    //         // Calculate the grade points and credit hours for each course
    //         foreach ($courses as $course) {
    //             if($course->grade != null)
    //             {
    //                 $grade_points = $grade_point_mapping[$course->grade] * $course->creditHours;
    //                 $total_grade_points += $grade_points;
    //                 $total_credit_hours += $course->creditHours;
    //             }
              
    //         }
    
    //         // Calculate the GPA
    //         $gpa = $total_grade_points / $total_credit_hours;
              
    //         $GPA = number_format($gpa, 2);
    //         DB::table('student')->where('studentId', '=', $studentID->studentId)->update(['GPA' => $GPA]);

    //         // Display the GPA to the user
    //         echo "Student ID: " . $studentID->studentId . ", GPA: " . number_format($gpa, 2) . "\n";
    //     }
    // }

    public function calculateGPA($studentId)
    {
        $grade_point_mapping = [
            'A+' => 4.0,
            'A' => 3.7,
        
            'B+' => 3.3,
            'B' => 3.0,
         
            'C+' => 2.7,
            'C' => 2.4,
        
            'D+' => 2.2,
            'D' => 2.0,

            'F' => 0.0,
        ];
    
            $courses = DB::table('course_reigesters')->select('courseid','grade','creditHours')->where('studentId', $studentId)->get();
    
            $total_grade_points = 0;
            $total_credit_hours = 0;
    
            // Calculate the grade points and credit hours for each course
            foreach ($courses as $course) {
                if($course->grade != null)
                {
                    $grade_points = $grade_point_mapping[$course->grade] * $course->creditHours;
                    $total_grade_points += $grade_points;
                    $total_credit_hours += $course->creditHours;
                }
              
            }
    
            // Calculate the GPA
            $gpa = $total_grade_points / $total_credit_hours;
              
            $GPA = number_format($gpa, 2);
            DB::table('student')->where('studentId', '=', $studentId)->update(['GPA' => $GPA]);

            // Display the GPA to the user
            echo "Student ID: " . $studentId . ", GPA: " . number_format($gpa, 2) . "\n";
        
    }

    public function getAllCourses()
    {
        $courses = DB::table('course')->select('courseID','courseName')->get();
        return $courses;
    }

    public function getStudentInCourse($courseID)
    {
        $students = DB::table('student')
        ->join('course_reigesters', 'course_reigesters.studentId', '=','student.studentId' ) 
        ->select('student.studentId','studentName')
        ->where('course_reigesters.courseid', $courseID)
        ->get();
        return $students;
    }

    private function mapToLetterGrade($result) {
        if ($result >= 90 && $result <= 100) {
            return 'A+';
        } else if ($result >= 85 && $result < 90) {
            return 'A';
        } else if ($result >= 80 && $result < 85) {
            return 'B+';
        } else if ($result >= 75 && $result < 80) {
            return 'B';
        } else if ($result >= 70 && $result < 75) {
            return 'C+';
        } 
        else if ($result >= 65 && $result < 70) {
            return 'C';
        }
        else if ($result >= 60 && $result < 65) {
            return 'D+';
        } 
        else if ($result >= 50 && $result < 60) {
            return 'D';
        }  
        else {
            return 'F';
        }
    }

    public function addGrade($courseId,$studentId,Request $request)
    {
        $result = $request->termGrade + $request->finalGrade;
        $letterGrade = $this->mapToLetterGrade($result);

        DB::table('student')->where('student.studentId', '=', $studentId)
        ->join('course_reigesters', 'course_reigesters.studentId', '=','student.studentId')
        ->where('course_reigesters.courseid',$courseId)
        ->update(array('TermWork'=> $request->termGrade, 'ExamWork'=>$request->finalGrade ,'Result'=> $result,'grade' => $letterGrade));

        $this->calculateGPA($studentId);
        
        return response()->json(['success' => true]);      
    }

    public function updateRegisterationStatus($status)
    {       
        $currentStatus = DB::table('adminControl')
        ->update(array('registerationStatus'=>$status));

         
        return response()->json([
            'message' => 'Registeration status has been updated successfully',
            'current status' => $status
        ]);  
    }

    
    public function setEvaluationStatus($status)
{
    DB::table('admincontrol')
        
        ->update([
            'evaluationStatus' => $status
              
        ]);
    
    return response()->json(['success' => true]);
}
public function setGPFormStatus($status)
{
    DB::table('admincontrol')
        
        ->update([
            'GpFormStatus' => $status
              
        ]);
    
    return response()->json(['success' => true]);
}
public function getAdminControlStatus()
{
   $status= DB::table('admincontrol')->get(); 
    return $status;
}
public function updateprogramSelectionStatus($status)
{       
    $currentStatus = DB::table('adminControl')
    ->update(array('programSelectionStatus'=>$status));

     
    return response()->json([
        'message' => 'programSelection status has been updated successfully',
        'current status' => $status
    ]);  
}
public function AddGroup(Request $request){
   
    $startTime = strtotime($request->input('start_time'),);
    $endTime = strtotime( $request->input('end_time'),);

    if ($startTime >= $endTime || ($endTime - $startTime) == 0) {
        return response()->json(['error' => 'Invalid time. Start time must be before end time and the duration between them must be greater than zero.'], 400);
    }
    DB::table('group')
    ->insert([
        
        'groupNumber' => $request->input('group_name'),
        'TAId' => $request->input('ta_name'),
        'courseId' => $request->input('CourseId'),
        'slotDay' => $request->input('slot_day'),  
        'startTime' => $request->input('start_time'),
        'slotPlace' => $request->input('slot_place'),
        'groupCount' => 25,
         'endTime' => $request->input('end_time'),
         'Year'=>date('Y')

    ]);
    }
}
