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

class AnnouncemetsController extends Controller
{
    public function getAllAnnouncment(){
        $ann = Announcemets::orderBy('created_at', 'desc')->get();
    return $ann;
    }
    public function addAnnouncment(Request $request){
        $annTitle=$request->input('announcmentTitle');
        $ann=DB::table('announcemets')->insert([
            [
                'created_at'=> $request->input('time'),
                'content' =>  $request->input('content'),
                'announcmentTitle'=>$request->input('announcmentTitle'),
                
            ]
        ]);
        $user = User::find(3);

        Mail::to($user->email)->send(new NewAnnouncementNotification($annTitle));
        return response()->json(['message' => 'Email sent successfully.'], 200);
   
    }
    public function updateAnnouncmentStatus($annID){
        DB::table('announcemets')->where('id', '=',$annID)->update(array('isOpened'=>'1'));
        return response()->json(['message' => 'Updated successfully.'], 200);

    }
}
