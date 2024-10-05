@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>Question {{ $step }} of {{ $totalQuestions }}</h1>
    <form action="{{ route('quiz.submitAnswer', ['step' => $step]) }}" method="POST">
        @csrf
        <h4>{{ $question['question'] }}</h4>

        @foreach($question['options'] as $optionIndex => $option)
            <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="answer" value="{{ $optionIndex }}" required>
                <label class="form-check-label">{{ $option }}</label>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Next</button>
    </form>
</div>
@endsection
