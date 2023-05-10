<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programPerference extends Model
{
    use HasFactory;
    protected $fillable = [
    'studentId',
    'preference1',
    'preference2',
    'preference3',
    'preference4',
    'preference5'];
}
