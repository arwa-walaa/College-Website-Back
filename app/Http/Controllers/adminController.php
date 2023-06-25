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

   public function get_Number_Of_Students_In_Department()
    {
        $data = DB::table('student')
            ->select('departmentCode', DB::raw('count(*) as count'))
            ->groupBy('departmentCode')
            ->get();

        return response()->json($data);
    }

    // public function get_GPA_distribution_In_Department()
    // {
    //     $data = DB::table('student')->select('studentId', 'GPA')->where('departmentCode', 'IS')->get();
    //     return response()->json($data);
    // }

    public function get_GPA_distribution_In_Department()
    {
        $departments = DB::table('department')->select('departmentCode')->get();

        foreach ($departments as $dept) {
            $deptData = DB::table('student')->select('studentId', 'GPA')->where('departmentCode', $dept->departmentCode)->get();
            $data[$dept->departmentCode] = $deptData;
        }
    
       
        return response()->json($data);
    }

    public function calculateGPA()
    {
        $studentsIDs = DB::table('course_reigesters')->distinct()->select('studentId')->get();
    
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
    
        foreach ($studentsIDs as $studentID) {
            $courses = DB::table('course_reigesters')->select('courseid','grade','creditHours')->where('studentId', $studentID->studentId)->get();
    
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
            DB::table('student')->where('studentId', '=', $studentID->studentId)->update(['GPA' => $GPA]);

            // Display the GPA to the user
            echo "Student ID: " . $studentID->studentId . ", GPA: " . number_format($gpa, 2) . "\n";
        }
    
    }
  
}
