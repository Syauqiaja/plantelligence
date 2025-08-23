<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentTaskAssignment extends Model
{
    protected $fillable = [
            'user_id',
            'task_field_id',
            'file',
            'point',
            'is_completed',
    ];
}
