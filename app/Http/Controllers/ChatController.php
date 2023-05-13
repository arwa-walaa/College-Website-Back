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
        
        // $message = new Message;
        // $message->from = $request->input('id');

        // $students = DB::table('student')->where('studentId', '!=', $request->input('studentId'))->get();

        $students = DB::table('student')->get();

        return response()->json($students);
    }

    public function listProfessorsAndTAs()
    {
        $professors = DB::table('professor')->get();
        $TAs = DB::table('ta')->get();

        return response()->json(['Professors' => $professors, 'TAs' => $TAs]);


        // $professorsAndTas = DB::table('professor')->unionAll(DB::table('_t_a'))->get();
          
        

        /*
        $users = DB::table('users')
            ->select('name', 'email')
            ->where('active', true)
            ->unionAll(
                DB::table('admins')
                    ->select('name', 'email')
                    ->where('active', true)
            )
            ->get();
        */
        // $professors = professor::where('professorId', '!=', $request->input('professorId'))->get();

        // return response()->json($professors, $TAs);
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

    // public function sendMessage(Request $request)
    // {
    //     $this->validate($request, [
    //         'from' => 'required',
    //         'to' => 'required',
    //         'message' => 'required',
           
    //     ]);

    //     $message = new Message;
    //     $message->from = $request->user()->id;
    //     $message->to = $request->to;
    //     $message->message = $request->message;
    //     $message->save();

    //     // dd();

    //     // return response()->json($message);

    //     return response()->json([
    //         'message' => $message,
    //         'status' => 'Message sent successfully',
    //     ], 200);
    // }
   

   
//     public function sendMessage(Request $request)
// {
    
//     $this->validate($request, [
//         'from' => 'required',
//         'to' => 'required',
//         'message' => 'required',
//         // 'attachement' => 'required',
//     ]);

//     $message = new Message;
//     $message->from = $request->input('from');
//     $message->to = $request->input('to');
//     $message->message = $request->input('message');
//     // $message->attachement = $request->file('attachement')
//     //$message->path = $message->attachement->store('attachments');
//     // $file = $request->file('attachement');
//     // $path = Storage::disk('local')->putFile('gp', $file);
//     // $message->attachement = new Attachment;
//     // $message->attachement->filename = $file->getClientOriginalName();
//     // $message->attachement->path = $path;

//     //////////////
//     // public function upload(Request $request) {
//     //     $file = $request->file('file');
//     //     $path = Storage::disk('local')->putFile('uploads', $file);
      
//     //     $attachment = new Attachment;
//     //     $attachment->filename = $file->getClientOriginalName();
//     //     $attachment->path = $path;
//     //     $attachment->save();
      
//     //     return response()->json([
//     //       'success' => true,
//     //       'attachment' => $attachment,
//     //     ]);
//     //   }
//     //////////

//     if ($request->hasFile('attachment')) {
//         $attachment = $request->file('attachment');
//         $path = $attachment->store('attachments');
//         $message->attachment_path = $path;
//     }


//     $message->save();

//     return response()->json($message);
// }
//////////////////////
public function sendMessage(Request $request)
{
    $this->validate($request, [
        'from' => 'required',
        'to' => 'required',
        'message' => 'required',
    ]);

    $message = new Message;
    $message->from = $request->input('from');
    $message->to = $request->input('to');
    $message->message = $request->input('message');

    if ($request->hasFile('attachment')) {
        $attachment = $request->file('attachment');
        $path = $attachment->store('attachments');
        
        $message->attachment_path = $path;
        // $message->attachment_url = url('app/'.$path); // add this line
       
        $message->attachment_url = url(" https://preview.redd.it/in87exq7tpw41.jpg?width=1055&format=pjpg&auto=webp&v=enabled&s=5feae5ba352e350e47958d88261d062ae4a616a6"); // add this line
        //$message->attachment_url = url('http://127.0.0.1:8000/storage/app/'.$path); // add this line
    }

    $message->save();
  

    return response()->json($message);
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


