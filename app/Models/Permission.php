<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_pms',
        'date_pms',
        'time_pms',
        'purpose_pms',
        'subject_pms',
        'desc_pms',
    ];
}
