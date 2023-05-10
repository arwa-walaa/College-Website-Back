<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courseEvaluation extends Model
{
    use HasFactory;
    protected $fillable = [
        'contentRate',
        'isRepeated',
        'isClear',
        'relevantToObjectives',
        'preparetionForFutureCourses',

    ];
}
