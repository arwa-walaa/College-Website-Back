<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class gpController extends Controller
{
    Public function insert(Request $request)
   {
        DB::table('gp')->insert ([
        'idea' => $request-> idea,
        'requirements'=> $request-> requirements,
        'member1'=> $request-> member1,
        'member2'=> $request-> member2,
        'member3'=> $request-> member3,
        'member4'=> $request-> member4,
        'member5'=> $request-> member5,
        'professor'=> $request->  professor,
        'TA'=> $request-> TA
       ]);

       return response('Data has been inserted successfully');
   }
}
