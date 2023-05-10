<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeHours extends Model
{
    use HasFactory;
    protected $fillable=['professorOrTAName','Email','Department','Location','OfficeHours','Day'];
}
