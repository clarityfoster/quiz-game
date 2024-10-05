@extends('layouts.app')
@section('content')
    <div class="custom-container d-flex align-items-center justify-content-center" style="min-height: 80vh">
        <div class="card cherry-blossom-linear shadow rounded-4 p-3 w-30">
            <div class="card-body">
                <h5 class="card-title text-center text-light mb-5">
                    Are you sure you want to play the quiz?
                </h5>
                <!-- Provide the initial step (1) when starting the quiz -->
                <a href="{{ route('play') }}" class="btn btn-light w-100 mb-3">Start Now</a>
                <a href="{{ url()->previous() }}" class="btn btn-secondary w-100">Cancel</a>
            </div>
        </div>
    </div>
@endsection
