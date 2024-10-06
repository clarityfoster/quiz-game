<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function choice() {

        return view('quizzes.choice');
    }
    public function earthPlay() {
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
    public function earthSubmit(Request $request) {
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
    protected $questions = [
        [
            'question' => 'What is the capital of France?',
            'options' => ['Paris', 'London', 'Berlin', 'Madrid'],
            'correct' => 0
        ],
        [
            'question' => 'What is 2 + 2?',
            'options' => ['3', '4', '5', '6'],
            'correct' => 1
        ],
        [
            'question' => 'Which planet is known as the Red Planet?',
            'options' => ['Earth', 'Mars', 'Jupiter', 'Saturn'],
            'correct' => 1
        ]
    ];
    public function oceanPlay($step) {
        $totalQuestions = count($this->questions);
        if($step < count($this->questions)) {
            $currentQuestion = $this->questions[$step];
        } else {
            return redirect()->route('ocean-result');
        }
        return view('quizzes.ocean', [
            'totalQuestions' => $totalQuestions,
            'currentQuestion' => $currentQuestion,
            'step' => $step,
        ]);
    }
    public function oceanSubmit($step) {
        $userAnswer = request()->input('answer');
        $correctAnswer = $this->questions[$step]['correct'];
        $score = session()->get('score', 0);

        if($userAnswer == $correctAnswer) {
            $score++;
            $score = session()->put('score', $score);
        }
        if($step + 1 < count($this->questions)) {
            return redirect()->route('ocean-play' , $step + 1);
        } else {
            return redirect()->route('ocean-result');
        }
    }
    public function oceanResult() {
        $score = session()->get('score', 0);
        $totalQuestions = count($this->questions);

        session()->forget('score');
        return view('quizzes.ocean-result', [
            'score' => $score,
            'totalQuestions' => $totalQuestions,
        ]);
    }
}    

