<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskField extends Model
{
    protected $fillable = [
        'title',
        'student_task_id',
        'order',
        'url',
        'file',
    ];
}
