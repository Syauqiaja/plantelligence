<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    protected $fillable = [
        'user_id',
        'quiz_question_id',
        'answer',
        'is_correct',
    ];
}
