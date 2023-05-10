<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseReigester extends Model
{
    protected $fillable = [
        'groupId',
        'courseid',
        'studentId',
        'grade',
        'creditHours'
     
    ];
    use HasFactory;
}
