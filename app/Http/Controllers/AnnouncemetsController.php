<?php

namespace App\Http\Controllers;

use App\Models\Announcemets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnnouncemetsController extends Controller
{
    public function getAllAnnouncment(){
        $ann=Announcemets::all();
        return $ann;
    }
    public function addAnnouncment(Request $request){
        $ann=DB::table('announcemets')->insert([
            [
                'created_at'=> $request->input('time'),
                'content' =>  $request->input('content'),
                
                
            ]
        ]);
        return $ann;
    }

}
