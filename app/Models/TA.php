<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TA extends Model
{
    use HasFactory;
    // protected $primaryKey = 'TAId';
    protected $fillable = [
        'TAId',
        'TAName',
        'password',
        'phoneNumber',
        'email',
        'nationalId',
        'address',
        'gender',
        'departmentCode',
        'courseID'
        

    ];
}
