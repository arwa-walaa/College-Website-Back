<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class professorEvaluation extends Model
{
    use HasFactory;
    protected $fillable = ['engagedStudents',
    'conveiedMaterial',
    'isClearAgenda',
    'teacherEffectiveness',
    'communicationSkills'];

}
