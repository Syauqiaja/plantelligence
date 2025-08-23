<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizQuestion extends Model
{
    
    protected $fillable = [
        'quiz_id',
        'question',
        'answer_a',
        'answer_b',
        'answer_c',
        'answer_d',
        'correct_answer',
    ];

    protected $casts = [
        'quiz_id' => 'integer',
    ];

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }

    // Get all answer options as array
    public function getAnswerOptionsAttribute(): array
    {
        return [
            'A' => $this->answer_a,
            'B' => $this->answer_b,
            'C' => $this->answer_c,
            'D' => $this->answer_d,
        ];
    }

    // Get correct answer text
    public function getCorrectAnswerTextAttribute(): string
    {
        return $this->{'answer_' . strtolower($this->correct_answer)} ?? '';
    }

    // Check if given answer is correct
    public function isCorrectAnswer(string $answer): bool
    {
        return strtoupper($answer) === strtoupper($this->correct_answer);
    }
}
