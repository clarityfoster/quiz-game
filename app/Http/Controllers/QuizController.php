<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function choice() {
        return view('quizzes.choice');
    }
    public function getReady() {
        return view('quizzes.get-ready');
    }
    public function play() {
        $quizTitle = 'General Knowledge Quiz';
        $questions = [
            [
                'question' => 'What is the capital of France?',
                'options' => ['Paris', 'London', 'Berlin'],
                'correct' => 0 
            ],
            [
                'question' => 'What is 2 + 2?',
                'options' => ['3', '4', '5'],
                'correct' => 1 
            ],
        ];
        return view('quizzes.play', [
            'quizTitle' => $quizTitle,
            'questions' => $questions
        ]);
    }
    public function submit(Request $request) {
        $questions = [
            [
                'question' => 'What is the capital of France?',
                'options' => ['Paris', 'London', 'Berlin'],
                'correct' => 0 
            ],
            [
                'question' => 'What is 2 + 2?',
                'options' => ['3', '4', '5'],
                'correct' => 1 
            ],
        ];
        $score = 0;
        $userAnswers = $request->input('answers');
        foreach($questions as $index => $question) {
            if($userAnswers[$index] == $question['correct']) {
                $score++;
            }
        }
        return redirect()->back()->with('success', "You scored $score out of " . count($questions));
    }
}

