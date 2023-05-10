<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $fillable=['studentId',
    'studentName','email','password','nationalId','address','gender','GPA','departmentCode','level','loginToken'];
}
