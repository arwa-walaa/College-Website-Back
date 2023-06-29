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

Storage::disk('local')->makeDirectory('gp');
class ChatController extends Controller
{
    public function getHistory(Request $request, $user1, $user2)
    {
        $messages = Message::where(function ($query) use ($user1, $user2) {
            $query->where('from', $user1)->where('to', $user2);
        })->orWhere(function ($query) use ($user1, $user2) {
            $query->where('from', $user2)->where('to', $user1);
        })->orderBy('created_at', 'asc')->get();

        return response()->json($messages);
    }


public function sendMessage(Request $request)
{
    $this->validate($request, [
        'from' => 'required',
        'to' => 'required',
        // 'message' => 'required',
    ]);

    $message = new Message;
    $message->from = $request->input('from');
    $message->to = $request->input('to');
    $message->message = $request->input('message');

   

    if ($request->hasFile('attachment')) {
        $attachment = $request->file('attachment')->getClientOriginalName();
        $path = $request->file('attachment')->storeAs('attachments',$attachment,'fcai');
        //return $path;
        $message->attachment_path = $path;

     }
    

    $message->save();
    return response()->json($message);
}

   public function updateStudentStatus($studentId , $status)
   { 
    DB::table('student')->where('userID', '=',$studentId)->update(array('isBlocked'=>$status));  
    return response('The student status has been updated successfully');
   }

   public function getStudentStatus($studentId)
   { 
    $studentStatus = DB::table('student')->select('isBlocked')->where('userID', '=',$studentId)->get();   
    return $studentStatus;
   }

//    updatessssssssssssssssssssssssssssssss
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
public function getRecentContacts($senderID){
    $recentTAContacts = DB::table('ta')
        ->join('messages', 'ta.userID', '=', 'messages.to')
        ->join('users', 'ta.userID', '=', 'users.id')
        ->select('ta.TAName AS name', 'users.Type', 'messages.to AS userID', DB::raw('DATE_FORMAT(MAX(messages.created_at), "%m/%d/%Y %h:%i %p") AS last_contact_time'))
        ->where('messages.from', $senderID)
        ->groupBy('messages.to', 'ta.TAName', 'users.Type');
        

    $recentstudentContacts = DB::table('student')
        ->join('messages', 'student.userID', '=', 'messages.to')
        ->join('users', 'student.userID', '=', 'users.id')
        ->select('student.studentName AS name', 'users.Type', 'messages.to AS userID', DB::raw('DATE_FORMAT(MAX(messages.created_at), "%m/%d/%Y %h:%i %p") AS last_contact_time'))
        ->where('messages.from', $senderID)
        ->groupBy('messages.to', 'student.studentName', 'users.Type');

    $recentprofessorContacts = DB::table('professor')
        ->join('messages', 'professor.userID', '=', 'messages.to')
        ->join('users', 'professor.userID', '=', 'users.id')
        ->select('professor.professorName AS name', 'users.Type', 'messages.to AS userID', DB::raw('DATE_FORMAT(MAX(messages.created_at), "%m/%d/%Y %h:%i %p") AS last_contact_time'))
        ->where('messages.from', $senderID)
        ->groupBy('messages.to', 'professor.professorName', 'users.Type');

    $recentContacts = $recentTAContacts->union($recentstudentContacts)
                                     ->union($recentprofessorContacts)
                                     ->orderByDesc('last_contact_time')
                                     ->get();

    return $recentContacts;
}
}



