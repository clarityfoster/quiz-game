<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Questions;
use App\Models\Options;
use App\Models\Category;
use App\Models\UserAnswer;
use App\Models\User;

class QuizController extends Controller
{
    public function index($step, $category_id) {
        $userId = auth()->id();
        $category = Category::find($category_id);
        $quizzes = Quiz::where('category_id', $category_id)->get();
        $totalQuestions = $quizzes->count();
        if($step == 0) {
            UserAnswer::where('category_id', $category_id)->where('user_id', $userId)->delete();
        }
        if($step < $totalQuestions && $step >= 0) {
            $currentQuestion = $quizzes[$step]; 
        } else {
            return back();
        }
        if(auth()->check() && (auth()->user()->ban)) {
            return redirect()->back()->with('ban', 'Your account is suspended');
        } else {
            return view('quizzes.foods', [
                'quizzes' => [$currentQuestion],
                'totalQuestions' => $totalQuestions,
                'step' => $step,
                'category' => $category,
                'category_id' => $category_id
            ]);
        }
    }
    public function submit(Request $request, $step, $category_id) {
        $category = Category::find($category_id);
        $quizzes = Quiz::where('category_id', $category_id)->get();
        $totalQuestions = $quizzes->count();

        $score = 0;
        $selectedAnswer = $request->input('user_answer');
        $currentQuiz = $quizzes[$step];
        if($selectedAnswer == $currentQuiz->correct_answer) {
            $score++;
        }
        $userAnswer = new UserAnswer;
        $userAnswer->score = $score;
        $userAnswer->user_id = auth()->id();
        $userAnswer->category_id = $request->category_id;
        $userAnswer->quiz_id = $request->quiz_id;
        $userAnswer->save();

        if($step + 1 < $totalQuestions) {
            return redirect()->route('index', ['step' => $step + 1, 'category_id' => $category_id]);
        } else {
            return redirect()->route('result', [
                'score' => $score,
                'totalQuestions' => $totalQuestions,
                'category_id' => $category_id 
            ]); 
        }
    }
    public function result($category_id) {
        $userId = auth()->id();
        $category = Category::find($category_id);
        $totalQuestions = Quiz::where('category_id', $category_id)->count();
        $score = UserAnswer::where('user_id', $userId)
                            ->where('category_id', $category_id)
                            ->get();
        $totalScore = $score->sum('score');
        return view('quizzes.result', [
            'score' => $totalScore,
            'totalQuestions' => $totalQuestions,
            'category_id' => $category_id,
            'category' => $category,
        ]);
    }
    public function choices() {
        $userId = auth()->id();
        $category = Category::all();
        $step = 0;
        $playedCategoires = UserAnswer::where('user_id', $userId)
                            ->pluck('category_id')->toArray();
        return view('quizzes.choices', [
            'category' => $category,
            'step' => $step,
            'playedCategory' => $playedCategoires,
        ]);
    }
    public function add() {
        $category = Category::all();
        return view('quizzes.add-questions' ,[
            'categories' => $category
        ]);
    } 
    public function createQuiz() {
        $validator = validator(request()->all(), [
            'question' => 'required|string|max:255',
            'options' => 'required|array|min:2|max:4',
            'options.*' => 'required|string',
            'correct_answer' => 'required|integer|min:0|max:3',
            'category_id' => 'required',
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }
        $quiz = new Quiz;
        $quiz->question = request()->question;
        $quiz->options = json_encode(request()->options);
        $quiz->correct_answer = request()->correct_answer;
        $quiz->category_id = request()->category_id;
        $quiz->save();
        return redirect()->back()->with('success', 'Quiz added successfully!');
    } 
    public function leaderboard() {
        $questions = Quiz::all();
        $categories = Category::all();
        $userAnswer = UserAnswer::with('user')
        ->orderBy('score', 'desc')
        ->get();
        $users = User::all()->map(function($user) {
            $user->total_score = UserAnswer::where('user_id', $user->id)->sum('score');
            return $user;
        });
        $users = $users->sortByDesc('total_score');

        $questionsByCategories = Quiz::selectRaw('category_id, COUNT(*) as questions_count')
                        ->groupBy('category_id')
                        ->pluck('questions_count', 'category_id');

        return view('quizzes.leaderboard' ,[
            'userAnswer' => $userAnswer,
            'users' => $users,
            'categories' => $categories,
            'questions' => $questions,
            'questionsByCategories' => $questionsByCategories
        ]);
    }
    public function dashboard() {
        $users = User::all();
        return view('quizzes.dashboard', [
            'users' => $users
        ]);
    }
    public function changeRole($id) {
        $user = User::findOrFail($id);
        $user->role_id = request()->input('role_id');
        $user->save();
        return redirect()->back()->with('info', 'Role has been changed successfully');
    }
    public function ban($id) {
        $user = User::findOrFail($id);
        $user->ban = true;
        $user->save();
        return redirect()->back()->with('warning', 'User has been banned');
    }
    public function unban($id) {
        $user = User::findOrFail($id);
        $user->ban = false;
        $user->save();
        return redirect()->back()->with('warning', 'User has been unbanned');
    }
}    

