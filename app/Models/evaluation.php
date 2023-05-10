<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluation extends Model
{
    use HasFactory;
    protected $fillable = [
        'contentRate',
        'isRepeated',
        'isClear',
        'relevantToObjectives',
        'preparetionForFutureCourses',
        'engagedStudents',
        'conveiedMaterial',
        'isClearAgenda',
        'teacherEffectiveness',
        'communicationSkills',
        'TAengagedStudents',
        'TAconveiedMaterial',
        'TAisClearAgenda',
        'TAteacherEffectiveness',
        'TAcommunicationSkills'
    ];
}
