@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column gap-5 align-items-center justify-content-center custom-container"
        style="min-height: 85vh;">
        <h3 class="card-title mb-4" style="color: #0097FF">1. Earth Question</h3>
        <div class="card shadow rounded-4 w-50 blue-linear p-4 text-white">
            <div class="card-body">
                <div class="text-center mb-5">
                    <h4 class="card-subtitle text-light">{{ $step + 1 }}. {{ $currentQuestion['question'] }}</h4>
                </div>

                <form method="POST" action="{{ route('ocean-submit', $step) }}">
                    @csrf
                    <div class="row btn-group-toggle" data-toggle="buttons">
                        @foreach ($currentQuestion['options'] as $index => $option)
                            <div class="col-md-6 mb-3">
                                <label class="btn btn-light py-2 px-3 w-100 option-btn mb-2"
                                    style="transition: background-color 0.3s ease; color: #0097FF;">
                                    <input type="radio" name="answer" id="option{{ $index }}"
                                        value="{{ $index }}" autocomplete="off" class="d-none">
                                    {{ $option }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center gap-2 mt-4">
                        <a href="" class="btn btn-secondary">Restart</a>
                        <button type="submit" id="submit-btn" class="btn btn-light" style="color: #0097FF;" disabled>
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const radioButtons = document.querySelectorAll('input[name="answer"]');
        const submitBtn = document.getElementById('submit-btn');
        const optionButtons = document.querySelectorAll('.option-btn');

        radioButtons.forEach(function(radio) {
            radio.addEventListener('change', function() {
                submitBtn.disabled = !Array.from(radioButtons).some(r => r.checked);
                optionButtons.forEach(function(button) {
                    button.style.backgroundColor = 'white';
                    button.style.color = '#0097FF';
                })

                const selectedButton = this.parentElement;
                selectedButton.style.backgroundColor = '#3a6073';
                selectedButton.style.color = 'white';
                selectedButton.style.borderColor = '#3a6073';
            })
        })
    </script>
@endsection
