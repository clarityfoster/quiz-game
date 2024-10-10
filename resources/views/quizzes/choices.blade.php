@extends('layouts.app')

@section('content')
    @php
        $linear = [
            'cherry-blossom-linear',
            'blue-linear',
            'purple-linear',
            'sunny-linear',
            'emerald-linear',
            'berry-linear',
            'peacock-blue-linear',
            'ruby-red-linear',
            'flamingo-pink-linear',
        ];
        $img = [
            asset('img/choice/earth.svg'),
            asset('img/choice/ocean1.svg'),
            asset('img/choice/foods.svg'),
            asset('img/choice/eng1.svg'),
            asset('img/choice/code.svg'),
            asset('img/choice/maths1.svg'),
            asset('img/choice/health.svg'),
            asset('img/choice/cycle1.svg'),
            asset('img/choice/general2.svg'),
        ];
    @endphp
    <div class="container mt-5">
        <div class="row justify-content-center">
            @foreach ($category as $index => $categories)
                <div class="col-12 col-md-4 mb-4">
                    <a href="{{ route('index', ['step' => $step, 'category_id' => $categories->id]) }}"
                        class="col d-flex flex-column flex-md-row justify-content-between align-items-center text-decoration-none rounded-4 {{ $linear[$index % count($linear)] }} p-4 shadow choice-card"
                        style="max-width: 450px; height: auto; overflow: hidden;">
                        <div class="card-body text-center text-md-start text-white">
                            <button class="btn btn-outline-light rounded-3 mb-3">
                                <b>{{ $categories->id }}</b>
                            </button>
                            <p class="m-0 small text-uppercase">Level One</p>
                            <h4 class="fw-bold">{{ $categories->name }}</h4>
                        </div>
                        <img class="img-fluid d-none d-md-block" src="{{ $img[$index % count($img)] }}" alt="Earth Image"
                            style="max-width: 200px;">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
