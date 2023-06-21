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
}
