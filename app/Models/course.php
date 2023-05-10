<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    // protected $primaryKey = 'courseID';
    // protected $primaryKey = 'courseID';
    protected $fillable = [
        'courseID',
        'courseName',
        'departmentCode',
    ];
}
