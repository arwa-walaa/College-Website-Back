<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramPerferenceController extends Controller
{
    public function getAllDepartments()
    {
        $departments = DB::table('department')->select('departmentCode')->where('departmentName', '!=', 'general')->get();
        return $departments;
    }
    public function registerPerefernces(Request $request)
    {
        $currentYear = date('Y');
        $pereferncesDataArray = $request->all();

        // foreach ($pereferncesDataArray['array'] as $perefencesData) {
        DB::table('program_perferences')->insert([
            'preference1' => $pereferncesDataArray['array'][0],
            'preference2' => $pereferncesDataArray['array'][1],
            'preference3' => $pereferncesDataArray['array'][2],
            'preference4' => $pereferncesDataArray['array'][3],
            'preference5' => $pereferncesDataArray['array'][4],
            'studentId' => $pereferncesDataArray['studentId'],

            'Year' => $currentYear


        ]);

        return response()->json(['message' => 'Done']);
    }

    public function setDepatmentToStudent()
    {
     

// Sort students in descending order based on GPA
$students = DB::table('student')
    ->orderByDesc('GPA')
    ->get();

// Initialize department counts
$department_counts = [
    'IS' => 0,
    'IT' => 0,
    'AI' => 0,
    'CS' => 0,
    'DS' => 0,
];

// Assign departments to students based on preferences and availability
foreach ($students as $student) {
    $preferences = DB::table('program_perferences')
        ->where('studentId', $student->studentId)
        ->where('Year', 2023)
        ->first();

    for ($i = 1; $i <= 5; $i++) {
        $department = $preferences->{'preference'.$i};

        if ($department_counts[$department] < 2) {
            DB::table('student')
                ->where('studentId', $student->studentId)
                ->update(['departmentCode' => $department]);

            $department_counts[$department]++;
            break;
        }
    }

    // Mark unassigned students (no department found with less than 2 students assigned)
    if (!isset($student->departmentCode)) {
        DB::table('student')
            ->where('studentId', $student->studentId)
            ->update(['departmentCode' => null]);
    }
}

return 1;
    }

}

// }
