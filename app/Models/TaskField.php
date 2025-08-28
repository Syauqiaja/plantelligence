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

    public function studentAssignments(){
        return $this->hasMany(StudentTaskAssignment::class, 'task_field_id');
    }
    public function studentTask(){
        return $this->belongsTo(StudentTask::class, 'student_task_id');
    }
}