<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prerequisiteCousre extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID_PREREQ_COURSE',
        'ID_COURSE',
     
    ];
    // protected $primaryKey = ['ID_COURSE', 'ID_PREREQ_COURSE'];
}
