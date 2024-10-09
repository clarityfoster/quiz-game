@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column gap-5 align-items-center justify-content-center custom-container" style="min-height: 85vh;">
        <h3 class="card-title mb-4" style="color: #0097FF">
            {{  $quizzes[0]->category->name }}
        </h3>
        @foreach ($quizzes as $quiz)
            @include('share.alerts')
            <div class="card shadow rounded-4 w-50 blue-linear p-4 text-white">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <h4 class="card-subtitle text-light">
                            {{ $step + 1 }}.
                            {{ $quiz->question }}
                        </h4>
                    </div>
                    <form method="POST" action="{{ route('submit', ['step' => $step, 'category_id' => $category_id]) }}">
                        @csrf
                        <div class="row btn-group-toggle" data-toggle="buttons">
                            @foreach (json_decode($quiz->options) as $optionIndex => $option)
                                <div class="col-md-6 mb-3">
                                    <label class="btn btn-light py-2 px-3 w-100 option-btn mb-2" style="transition: background-color 0.3s ease; color: #0097FF;">
                                        <input type="radio" name="user_answer" value="{{ $optionIndex }}" autocomplete="off" class="d-none">
                                        {{ $option }}
                                    </label>
                                    <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                                    <input type="hidden" name="category_id" value="{{ $quiz->category->id }}">
                                </div>
                            @endforeach 
                        </div>
                        <div class="d-flex justify-content-center gap-2 mt-2">
                            <a href="" class="btn btn-secondary">Restart</a>
                            <button type="submit" id="submit-btn" class="btn btn-light" style="color: #0097FF;" disabled>
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const radioButtons = document.querySelectorAll('input[name="user_answer"]'); // Input elements
        const optionButtons = document.querySelectorAll('.option-btn'); // Labels
        const submitBtn = document.getElementById('submit-btn');

        radioButtons.forEach(function(radio) {
            radio.addEventListener('change', function() {
                // Enable the submit button when any radio button is selected
                submitBtn.disabled = false;

                // Disable all option buttons except the selected one
                optionButtons.forEach(function(button) {
                    const input = button.querySelector('input'); // Get the input inside the label
                    if (input !== radio) {
                        button.style.pointerEvents = 'none';
                        button.style.opacity = .5;
                    } else {
                        // Apply styles to the selected button
                        button.style.pointerEvents = 'auto';
                        button.style.backgroundColor = '#3a6073';
                        button.style.color = 'white';
                        button.style.borderColor = '#3a6073';
                    }
                });
            });
        });
    });
</script>
