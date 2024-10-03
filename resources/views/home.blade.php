@extends('layouts.app')

@section('content')
    <div class="custom-container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="align-items-start"  style="max-width: 700px">
                <h2 class="mb-4 title-line-height">
                    Welcome to the Ultimate <span class="blue">Quiz Challenge!</span>
                </h2>
                <p class="home-para">
                    Ready to put your knowledge to the test? Our quizzes are designed to entertain and challenge players of all ages.Are you up for the challenge? Let the fun begin! 
                </p>
                <a href="#" class="btn btn-warning btn-lg text-white mt-3">Get Started</a>
            </div>
            <img src="{{ asset('img/home/home.png') }}" alt="">
        </div>
    </div>
@endsection
