<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\student;
use App\Models\professor;
use App\Models\Message;
use Illuminate\Support\Facades\DB;

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
        $TAs = DB::table('_t_a')->get();

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
    $message->save();

    return response()->json($message);
}

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

  
    $TADtails = DB::table('_t_a')->where('TAName', '=', $request->TAName)->get();
   
    return [
       
        
        'TADtails'=>$TADtails
    ];
   }

}


