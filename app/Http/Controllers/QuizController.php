<?php

namespace App\Http\Controllers;

use App\Models\QuizQuestion;
use App\Models\QuizResult;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function submitQuiz(Request $request){
        $quizId = $request->quiz_id;
        $answers = json_decode($request->answers);
        $questionIds = [];
        foreach ($answers as $question_id => $answer) {
            $question = QuizQuestion::find($question_id);
            $userAnswer = UserAnswer::updateOrCreate([
                'quiz_question_id' => $question_id,
                'user_id' => Auth::user()->id
            ], [
                'answer' => $answer,
                'is_correct' => $answer == $question->correct_answer,
            ]);
            $questionIds[] = $question_id;
        }
        $answersCorrect = UserAnswer::where('user_id', Auth::user()->id)->whereIn('quiz_question_id', $questionIds)->where('is_correct', true)->count();
        QuizResult::updateOrCreate(
            [
                'user_id' => Auth::user()->id,
                'quiz_id' => $quizId,
            ],
            [
                'score' => floor(($answersCorrect/10) * 100),
            ]
        );

        return response()->json();
    }
}
