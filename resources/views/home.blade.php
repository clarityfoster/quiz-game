@extends('layouts.app')

@section('content')
    <div class="custom-container">
        <div class="d-flex align-items-center justify-content-between home-content">
            <div class="home-contents"  style="max-width: 700px">
                <h2 class="mb-4 title-line-height home-title">
                    Welcome to the Ultimate <span class="blue">Quiz Challenge!</span>
                </h2>
                <p class="home-para">
                    Ready to put your knowledge to the test? Our quizzes are designed to entertain and challenge players of all ages. Are you up for the challenge? Let the fun begin! 
                </p>
                <a href="{{ route('add') }}" class="btn btn-info btn-lg text-white mt-3 get-started-btn me-3">Add Questions</a>
                <a href="{{ route('choices') }}" class="btn btn-warning btn-lg text-white mt-3 get-started-btn">Get Started</a>
            </div>
            <img class="home-img" src="{{ asset('img/home/home.png') }}" alt="">
        </div>
    </div>
@endsection
