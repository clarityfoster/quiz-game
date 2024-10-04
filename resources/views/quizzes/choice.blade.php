@extends('layouts.app')

@section('content')
    <div class="row justify-content-center gap-5 custom-container mt-5">
        <a href="#" class="col d-flex flex-column flex-md-row justify-content-between align-items-center text-decoration-none rounded-4 cherry-blossom-linear p-4 shadow choice-card" 
           style="max-width: 450px; height: auto; overflow: hidden;">
            <div class="card-body text-center text-md-start text-white">
                <button class="btn btn-outline-light rounded-3 mb-3">
                    <b>1</b>
                </button>
                <p class="m-0 small text-uppercase">Level one</p>
                <h4 class="fw-bold">Earth</h4>
            </div>
            <img class="img-fluid d-none d-md-block" src="{{ asset('img/choice/earth.svg') }}" alt="Earth Image"
                 style="max-width: 200px;">
        </a>
        <a href="#" class="col d-flex flex-column flex-md-row justify-content-between align-items-center text-decoration-none rounded-4 blue-linear p-4 shadow choice-card" 
           style="max-width: 450px; height: auto; overflow: hidden;">
            <div class="card-body text-center text-md-start text-white">
                <button class="btn btn-outline-light rounded-3 mb-3">
                    <b>2</b>
                </button>
                <p class="m-0 small text-uppercase">Level one</p>
                <h4 class="fw-bold">Ocean</h4>
            </div>
            <img class="img-fluid d-none d-md-block" src="{{ asset('img/choice/ocean1.svg') }}" alt="Land Image"
                 style="max-width: 200px;">
        </a>
        <a href="#" class="col d-flex flex-column flex-md-row justify-content-between align-items-center text-decoration-none rounded-4 purple-linear p-4 shadow choice-card" 
           style="max-width: 450px; height: auto; overflow: hidden;">
            <div class="card-body text-center text-md-start text-white">
                <button class="btn btn-outline-light rounded-3 mb-3">
                    <b>3</b>
                </button>
                <p class="m-0 small text-uppercase">Level one</p>
                <h4 class="fw-bold">Foods</h4>
            </div>
            <img class="img-fluid d-none d-md-block" src="{{ asset('img/choice/foods.svg') }}" alt="Land Image"
                 style="max-width: 200px;">
        </a>
    </div>
    <div class="row justify-content-center gap-5 custom-container mt-5">
        <a href="#" class="col d-flex flex-column flex-md-row justify-content-between align-items-center text-decoration-none rounded-4 sunny-linear p-4 shadow choice-card" 
           style="max-width: 450px; height: auto; overflow: hidden;">
            <div class="card-body text-center text-md-start text-white">
                <button class="btn btn-outline-light rounded-3 mb-3">
                    <b>4</b>
                </button>
                <p class="m-0 small text-uppercase">Level one</p>
                <h4 class="fw-bold">English</h4>
            </div>
            <img class="img-fluid d-none d-md-block" src="{{ asset('img/choice/eng1.svg') }}" alt="English Image"
                 style="max-width: 200px;">
        </a>
        <a href="#" class="col d-flex flex-column flex-md-row justify-content-between align-items-center text-decoration-none rounded-4 emerald-linear p-4 shadow choice-card" 
           style="max-width: 450px; height: auto; overflow: hidden;">
            <div class="card-body text-center text-md-start text-white">
                <button class="btn btn-outline-light rounded-3 mb-3">
                    <b>5</b>
                </button>
                <p class="m-0 small text-uppercase">Level one</p>
                <h4 class="fw-bold">Coding</h4>
            </div>
            <img class="img-fluid d-none d-md-block" src="{{ asset('img/choice/code.svg') }}" alt="Coding Image"
                 style="max-width: 200px;">
        </a>
        <a href="#" class="col d-flex flex-column flex-md-row justify-content-between align-items-center text-decoration-none rounded-4 berry-linear p-4 shadow choice-card" 
           style="max-width: 450px; height: auto; overflow: hidden;">
            <div class="card-body text-center text-md-start text-white">
                <button class="btn btn-outline-light rounded-3 mb-3">
                    <b>6</b>
                </button>
                <p class="m-0 small text-uppercase">Level one</p>
                <h4 class="fw-bold">Maths</h4>
            </div>
            <img class="img-fluid d-none d-md-block" src="{{ asset('img/choice/maths1.svg') }}" alt="Maths Image"
                 style="max-width: 200px;">
        </a>
    </div>
    <div class="row justify-content-center gap-5 custom-container mt-5">
        <a href="#" class="col d-flex flex-column flex-md-row justify-content-between align-items-center text-decoration-none rounded-4 peacock-blue-linear p-4 shadow choice-card" 
           style="max-width: 450px; height: auto; overflow: hidden;">
            <div class="card-body text-center text-md-start text-white">
                <button class="btn btn-outline-light rounded-3 mb-3">
                    <b>7</b>
                </button>
                <p class="m-0 small text-uppercase">Level one</p>
                <h4 class="fw-bold">Health</h4>
            </div>
            <img class="img-fluid d-none d-md-block" src="{{ asset('img/choice/health.svg') }}" alt="Health Image"
                 style="max-width: 200px;">
        </a>
        <a href="#" class="col d-flex flex-column flex-md-row justify-content-between align-items-center text-decoration-none rounded-4 ruby-red-linear p-4 shadow choice-card" 
           style="max-width: 450px; height: auto; overflow: hidden;">
            <div class="card-body text-center text-md-start text-white">
                <button class="btn btn-outline-light rounded-3 mb-3">
                    <b>8</b>
                </button>
                <p class="m-0 small text-uppercase">Level one</p>
                <h4 class="fw-bold">Cycle</h4>
            </div>
            <img class="img-fluid d-none d-md-block img" src="{{ asset('img/choice/cycle1.svg') }}" alt="Cycle Image"
                 style="max-width: 200px;">
        </a>
        <a href="#" class="col d-flex flex-column flex-md-row justify-content-between align-items-center text-decoration-none rounded-4 flamingo-pink-linear p-4 shadow choice-card" 
           style="max-width: 450px; height: auto; overflow: hidden;">
            <div class="card-body text-center text-md-start text-white">
                <button class="btn btn-outline-light rounded-3 mb-3">
                    <b>9</b>
                </button>
                <p class="m-0 small text-uppercase">Level one</p>
                <h4 class="fw-bold">General Knowledge</h4>
            </div>
            <img class="img-fluid d-none d-md-block" src="{{ asset('img/choice/general2.svg') }}" alt="General Knowledge Image"
                 style="max-width: 200px;">
        </a>
    </div>
@endsection
