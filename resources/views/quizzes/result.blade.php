@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 85vh;">
        <div class="card p-4 rounded-4 shadow" style="width: 30rem; background: linear-gradient(to right, #ffd700, #ffcc00);">
            <div class="card-body text-center">
                <h3 class="card-title text-muted fw-bold mb-4">
                    🏆 Congratulations! 🏆
                </h3>
                <div class="text-muted mb-4">
                    <p class="lead">
                        Quiz Type: <span class="">{{ $category->name }}</span>
                    </p>
                    <p class="fs-5">
                        You scored <span class="fw-bold">{{ $score }}</span> out of <span class="fw-bold">{{ $totalQuestions }}</span>.
                    </p>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <a href="{{ route('index', ['step' => 0, 'category_id' => $category_id]) }}" class="btn btn-outline-secondary rounded-pill px-4">
                         Try Again
                    </a>
                    <a href="{{ route('choices') }}" class="btn btn-secondary rounded-pill ms-3 px-4">
                         Back to Quiz 
                    </a>
                </div>
            </div>
        </div>
        <footer class="mt-5 text-muted text-center">
            <p>Thank you for participating!</p>
        </footer>
    </div>
@endsection
