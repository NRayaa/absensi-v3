<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Present extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_p',
        'attend_p',
        'class_p',
        'meet_p',
        'date_p',
        'subject_p',
        'topic_p',
        'student_p',
        'student_s_p',
        'student_i_p',
        'student_a_p',
        'student_s_k_p',
        'student_i_k_p',
        'student_a_k_p',
    ];
}
