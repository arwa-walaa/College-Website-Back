<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class professor extends Model
{
    use HasFactory;
    // protected $primaryKey = 'professorId';
    protected $fillable = [
        'professorId',
        'professorName',
        'email',
        'address',
        'gender',
        'password',
        'phoneNumber',
        'nationalId',
        'departmentCode',
        'courseID',

    ];
}
