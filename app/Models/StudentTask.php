<?php

namespace App\Models;

use App\Enums\StudentTaskKey;
use Illuminate\Database\Eloquent\Model;

class StudentTask extends Model
{
    protected $fillable = [
        'title', 'key'
    ];

    public function taskField(){
        return $this->hasOne(TaskField::class, 'student_task_id');
    }
    public static function byKey(StudentTaskKey $key): ?self
    {
        return self::where('key', $key->value)->first();
    }

}
