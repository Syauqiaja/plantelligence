<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    protected $fillable = [
        'title',
        'order'
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    public function questions(): HasMany
    {
        return $this->hasMany(QuizQuestion::class);
    }

    // Get total questions count
    public function getTotalQuestionsAttribute(): int
    {
        return $this->questions()->count();
    }

    // Scope for ordering quizzes
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}