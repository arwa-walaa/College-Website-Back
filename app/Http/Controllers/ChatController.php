<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\student;
use App\Models\professor;
use App\Models\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Attachment;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewAnnouncementNotification;

Storage::disk('local')->makeDirectory('gp');
class ChatController extends Controller
{
    public function getHistory(Request $request, $user1, $user2)
    {
        $messages = Message::where(function ($query) use ($user1, $user2) {
            $query->where('from', $user1)->where('to', $user2);
        })->orWhere(function ($query) use ($user1, $user2) {
            $query->where('from', $user2)->where('to', $user1);
        })->orderBy('messages.created_at', 'asc')->get();

        return response()->json($messages);
    }


    public function sendMessage(Request $request)
    {
        $this->validate($request, [
            'from' => 'required',
            'to' => 'required'
        ]);
    
        $message = new Message;
        $message->from = $request->input('from');
        $message->to = $request->input('to');
        $message->message = $request->input('message');
        $mailMessage = 'new message from ' . $request->input('senderName');
    
        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment')->getClientOriginalName();
            $path = $request->file('attachment')->storeAs('attachments',$attachment,'fcai');
            $message->message = $attachment;
            $message->attachment_path = $path;
        }
        $message->save();
    }

    public function sendNotification($mailMessage)
    {
        $user = User::find(3);
        Mail::to($user->email)->queue(new NewAnnouncementNotification($mailMessage));
        return response()->json(['message'=>$mailMessage, 'Email response'=>'Email queued successfully.'], 200);
    }

public function getAllContacts($senderID,$sendertype){
    $TAs = DB::table('ta')->join('users','ta.userID','=','users.id')
    ->select('ta.userID','ta.TAName AS name','users.Type')
    ->where('userID', '!=',$senderID)
    ->where('Type', '!=',$sendertype)
    ->where('Type', '!=','Admin')->get();
   
    $students = DB::table('student')->join('users','student.userID','=','users.id')
    ->select('student.userID','student.studentName AS name','users.Type')
    ->where('userID', '!=',$senderID)
    ->where('Type', '!=',$sendertype)
    ->where('Type', '!=','Admin')->get();

    $professors = DB::table('professor')->join('users','professor.userID','=','users.id')
    ->select('professor.userID','professor.professorName AS name','users.Type')
    ->where('userID', '!=',$senderID)
    ->where('Type', '!=',$sendertype)
    ->where('Type', '!=','Admin')->get();

    $allContacts = $TAs->concat($students)
    ->concat($professors)
    ->sortBy('name')
    ->values();

    return $allContacts;
}

// public function getRecentContacts($senderID) {
//     $contactList = DB::table('messages')
//     ->select(DB::raw("CASE WHEN `to` = '{$senderID}' THEN `from` ELSE `to` END AS `contact`,
//                       MAX(`created_at`) AS `last_contact_time`,
//                       SUM(CASE WHEN `to` = '{$senderID}' AND `seen` = '0' THEN 1
//                                WHEN `from` = '{$senderID}' AND `seen` = '1' THEN 1
//                                ELSE 0
//                           END) AS `unread_count`"))
//     ->where('to', $senderID)
//     ->orWhere('from', $senderID)
//     ->groupBy('contact')
//     ->orderBy('last_contact_time', 'desc')
//     ->get();
   
                    
//     $TAlist = []; 
//     $Studentlist = [];
//     $Professorlist=[];
//     foreach ($contactList as $contact) {
//         $TAs = DB::table('ta')
//             ->join('users', 'ta.userID', '=', 'users.id')
//             ->select('ta.userID', 'ta.TAName AS name', 'users.Type')
//             ->where('ta.userID', '=', $contact->contact)
//             ->addSelect(DB::raw("'".$contact->last_contact_time."' AS last_contact_time"))
//             ->addSelect(DB::raw("'".$contact->unread_count."' AS numOfUnReadMessages"))
//             ->get();

//         $students = DB::table('student')
//             ->join('users', 'student.userID', '=', 'users.id')
//             ->select('student.userID', 'student.studentName AS name', 'users.Type')
//             ->where('student.userID', '=', $contact->contact)
//             ->addSelect(DB::raw("'".$contact->last_contact_time."' AS last_contact_time"))
//             ->addSelect(DB::raw("'".$contact->unread_count."' AS numOfUnReadMessages"))
//             ->get();

//         $professors = DB::table('professor')
//         ->join('users','professor.userID','=','users.id')
//         ->select('professor.userID','professor.professorName AS name','users.Type')
//         ->where('professor.userID', '=',$contact->contact)
//         ->addSelect(DB::raw("'".$contact->last_contact_time."' AS last_contact_time"))
//         ->addSelect(DB::raw("'".$contact->unread_count."' AS numOfUnReadMessages"))
//         ->get();
    
//         foreach ($TAs as $TA) {
//             $TAlist[] = $TA;
//         }
//         foreach ($students as $student) {
//             $Studentlist[] = $student;
//         }
//         foreach ($professors as $professor) {
//             $Professorlist[] = $professor;
//         }
//         $recentContacts = collect($TAlist)->concat($Studentlist)->concat($Professorlist)
//         ->sortByDesc('last_contact_time')->values();
//     }
    
//     return $recentContacts;
// }
public function getRecentContacts($senderID) {
    $contactList = DB::table('messages')
    ->select(DB::raw("CASE WHEN `to` = '{$senderID}' THEN `from` ELSE `to` END AS `contact`,
                      MAX(`created_at`) AS `last_contact_time`,
                      SUM(CASE WHEN `to` = '{$senderID}' AND `seen` = '0' THEN 1
                               ELSE 0
                          END) AS `unread_count`"))
    ->where('to', $senderID)
    ->orWhere('from', $senderID)
    ->groupBy('contact')
    ->orderBy('last_contact_time', 'desc')
    ->get();
   
                    
    $TAlist = []; 
    $Studentlist = [];
    $Professorlist=[];
    foreach ($contactList as $contact) {
        $TAs = DB::table('ta')
            ->join('users', 'ta.userID', '=', 'users.id')
            ->select('ta.userID', 'ta.TAName AS name', 'users.Type')
            ->where('ta.userID', '=', $contact->contact)
            ->addSelect(DB::raw("'".$contact->last_contact_time."' AS last_contact_time"))
            ->addSelect(DB::raw("'".$contact->unread_count."' AS numOfUnReadMessages"))
            ->get();

        $students = DB::table('student')
            ->join('users', 'student.userID', '=', 'users.id')
            ->select('student.userID', 'student.studentName AS name', 'users.Type')
            ->where('student.userID', '=', $contact->contact)
            ->addSelect(DB::raw("'".$contact->last_contact_time."' AS last_contact_time"))
            ->addSelect(DB::raw("'".$contact->unread_count."' AS numOfUnReadMessages"))
            ->get();

        $professors = DB::table('professor')
        ->join('users','professor.userID','=','users.id')
        ->select('professor.userID','professor.professorName AS name','users.Type')
        ->where('professor.userID', '=',$contact->contact)
        ->addSelect(DB::raw("'".$contact->last_contact_time."' AS last_contact_time"))
        ->addSelect(DB::raw("'".$contact->unread_count."' AS numOfUnReadMessages"))
        ->get();
    
        foreach ($TAs as $TA) {
            $TAlist[] = $TA;
        }
        foreach ($students as $student) {
            $Studentlist[] = $student;
        }
        foreach ($professors as $professor) {
            $Professorlist[] = $professor;
        }
        $recentContacts = collect($TAlist)->concat($Studentlist)->concat($Professorlist)
        ->sortByDesc('last_contact_time')->values();
    }
    
    return $recentContacts;
}

public function updateSeenStatus($from , $to)
{       
    DB::table('messages')
    ->where('from',$from)
    ->where('to',$to)
    ->update(array('seen'=>'1'));
   

     
    return response()->json([
        'message' => 'Seen status has been updated successfully',
    ]);  
}


public function blockUser($user1Id , $user2Id)
{
    DB::table('blockeduserchat')->insert([
        [
        'user1'=>$user1Id, 
        'user2'=>$user2Id
        ]
      ]);  
   
    return response('This user has been blocked');
}

public function unBlockUser($user1Id, $user2Id)
{
    DB::table('blockeduserchat')
        ->where('user1', $user1Id)
        ->where('user2', $user2Id)
        ->orWhere('user1', $user2Id)
        ->orWhere('user2', $user1Id)
        ->delete();

    return response('This user has been unblocked');
}

public function getBlockedUsers($user1Id, $user2Id)
{
    $result = DB::table('blockeduserchat')
    ->where('user1', $user1Id)
    ->where('user2', $user2Id)
    ->get();

    return $result;
}


}



