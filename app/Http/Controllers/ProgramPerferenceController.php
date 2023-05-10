<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramPerferenceController extends Controller
{
    public function getAllDepartments(){
        $departments = DB::table('department')->select('departmentCode')->where('departmentName','!=' ,'general')->get();
        return $departments;
    }
    public function registerPerefernces(Request $request)
    {
        $pereferncesDataArray = $request->all();
        
        // foreach ($pereferncesDataArray['array'] as $perefencesData) {
            DB::table('program_perferences')->insert ([
                'preference1' =>$pereferncesDataArray['array'][0],
                'preference2'=>$pereferncesDataArray['array'][1],
                'preference3'=>$pereferncesDataArray['array'][2],
                'preference4'=>$pereferncesDataArray['array'][3],
                'preference5'=>$pereferncesDataArray['array'][4], 
                'studentId'=>$pereferncesDataArray['studentId']
            
            
            ]);
    
            return response()->json(['message' =>  'Done']);
        }
    }
// }
