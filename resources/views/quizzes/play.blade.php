@extends('layouts.app')

@section('content')
    <div class="custom-container" style="max-width: 700px; margin: auto; padding: 20px;">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h3 class="text-center mb-4">{{ $quizTitle }}</h3>

        <form method="POST" action="{{ route('earth-submit') }}">
            @csrf
            @foreach ($questions as $index => $question)
                <div class="question-block p-4 mb-4 border rounded-4 shadow-sm" style="background-color: #f9f9f9;">
                    <h5 class="mb-3">Question {{ $index + 1 }}:</h5>
                    <p class="mb-3">{{ $question['question'] }}</p>

                    @foreach ($question['options'] as $optionalIndex => $option)
                        <div class="mb-3">
                            <input type="radio" class="btn-check" name="answers[{{ $index }}]" id="option-{{ $index }}-{{ $optionalIndex }}" value="{{ $optionalIndex }}" autocomplete="off">
                            <label class="btn btn-outline-primary btn-block" for="option-{{ $index }}-{{ $optionalIndex }}" style="width: 100%; padding: 10px;">{{ $option }}</label>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <div class="text-center mt-4">
                <button class="btn btn-success btn-lg" type="submit">Submit Answers</button>
            </div>
        </form>
    </div>
@endsection
