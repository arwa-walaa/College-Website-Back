<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\NewAnnouncement;

class Announcemets extends Model
{
    use HasFactory;
    protected $fillable = [
        'created_at',
        'content',
        'announcmentTitle'
     
    ];

    // protected $dispatchesEvents = [
    //     'created' => \App\Events\NewAnnouncement::class,
    // ];
    // protected $dispatchesEvents = [
    //     'created' => NewAnnouncement::class,
    // ];
}
