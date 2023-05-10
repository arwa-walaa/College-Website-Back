<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gp extends Model
{
    use HasFactory;

    protected $fillable = [
        'idea',
        // 'member1Name',
        // 'member2Name',
        // 'member3Name',
        // 'member4Name',
        // 'member5Name',

        'member1',
        'member2',
        'member3',
        'member4',
        'member5',

        // 'member6Name',

        // 'member1ID',
        // 'member2ID',
        // 'member3ID',
        // 'member4ID',
        // 'member5ID',
        // 'member6ID',

        // 'member1Email',
        // 'member2Email',
        // 'member3Email',
        // 'member4Email',
        // 'member5Email',
        // 'member6Email',

        'requirements',

        'professor',
        'TA'
    ];
}
