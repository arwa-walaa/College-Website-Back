<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TAEvaluation extends Model
{
    use HasFactory;
    protected $fillable = ['TAengagedStudents',
    'TAconveiedMaterial',
    'TAisClearAgenda',
    'TAteacherEffectiveness',
    'TAcommunicationSkills'];

}
