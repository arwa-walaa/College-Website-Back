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
    public function listStudents()
    {
        $students = DB::table('student')->get();

        return response()->json($students);
    }

    public function listProfessorsAndTAs()
    {
        $professors = DB::table('professor')->get();
        $TAs = DB::table('ta')->get();

        return response()->json(['Professors' => $professors, 'TAs' => $TAs]);

    }

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

public function store(Request $request)
{
    if ($request->hasFile('attachment')) {
        $image = $request->file('attachment')->getClientOriginalName();
        $path = $request->file('attachment')->storeAs('attachments',$image,'fcai');
        return $path;
    } else {
        return "No file uploaded";
    }
}


//////////////////////////
public function receive(Request $request)
{
    // Validate the incoming request
    $validatedData = $request->validate([
        'to' => 'required',
    ]);

    // Retrieve messages for the specified recipient
    $messages = DB::table('messages')
        ->where('to', '=', $request->input('to'))
        ->orderBy('created_at', 'desc')
        ->get();

    // Return the response
    return response()->json(['messages' => $messages]);
}
Public function getProfessorDetails(Request $request){

    $professorDtails = DB::table('professor')->where('professorName', '=', $request->professorName)->get();
   
    return [
        'professorDtails' => $professorDtails,
        
       
    ];
   }
   Public function getTADetails(Request $request){

  
    $TADtails = DB::table('ta')->where('TAName', '=', $request->TAName)->get();
   
    return [
       
        
        'TADtails'=>$TADtails
    ];
    
   }

}


