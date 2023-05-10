<?php

namespace App\Http\Controllers;

use App\Models\Announcemets;
use Illuminate\Http\Request;

class AnnouncemetsController extends Controller
{
    public function getAllAnnouncment(){
        $ann=Announcemets::all();
        return $ann;
    }
}
