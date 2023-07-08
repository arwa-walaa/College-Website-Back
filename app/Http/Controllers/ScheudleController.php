<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheudleController extends Controller
{
    public  function downloadScheudle($scheudle_Name)
    {
        $ext='.pdf';
        $path= DB::table('scheudles')->select('Link_Value')->where('Scheudle_Name', '=', $scheudle_Name)
        ->value('Link_Value');
        
        return response()->download(public_path($path),$scheudle_Name,[
            'Content-Type'=>"application/pdf",
        ]);
        
    }
}
