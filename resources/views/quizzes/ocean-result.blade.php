@extends('layouts.app')

@section('content')
    <div class="custom-container">
        <h3>Quiz Completed!</h3>
        <p>You scored {{ $score }} out of {{ $totalQuestions }}.</p>
        <a href="{{ route('choice') }}">Back to Quiz Selection</a>
    </div>
@endsection
